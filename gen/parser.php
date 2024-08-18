<?php

// Load models.txt that contains https://avoindata.prh.fi/ytj_en.html models.
// Just copy and paste the plaintext Response Class contents to the file and
// run this file: php parser.php
$models = file_get_contents(sprintf('%s%2$smodels.txt', __DIR__, DIRECTORY_SEPARATOR));

// Capture the names as one group, and blocks inside curly braces as another,
// then combine them later.
preg_match_all("/(\w+)\s\{([\w\W]*?)\}/m", $models, $output_array);

[$all, $names, $fields] = $output_array;

$fields = array_map(static function ($f) {
    $d = explode("\n", $f);
    $d = array_map("trim", $d);
    $d = array_filter($d);

    $d = array_map(static function ($field) {
        [$name_and_type, $docs] = explode(":", $field, 2);
        $names_and_types = explode(" ", $name_and_type, 2);

        [$name, $type] = $names_and_types;

        $type = str_replace(["(", ")"], "", $type);

        // Handle optional types.
        if (str_contains($type, "optional")) {
            $type = str_replace(["optional", ","], "", $type);
            $type = "?" . trim($type);
        }

        // Handle integer types.
        if ($type === "integer") {
            $type = "int";
        }

        // Handle array types. Convert Array[Type] to Type[].
        if (str_contains($type, "Array")) {
            $type = str_replace(["Array[", "]"], "", $type);
            $type .= "[]";
        }

        $default = null;
        if (str_contains($type, "?")) {
            $default = "null";
        }

        if (str_contains($type, "[")) {
            $default = "[]";
        }

        if ($type === "string") {
            $default = "''";
        }

        return [
            $name => [
                "name" => trim($name),
                "type" => trim($type),
                "docs" => trim($docs),
                "default" => $default,
            ],
        ];
    }, $d);

    return array_merge(...$d);
}, $fields);

$classes = array_combine($names, $fields);

ksort($classes);

$files = [];

// Output the classes as preformatted for easier copypasta.
// This is not the prettiest way to generate the codes, but it works.
foreach ($classes as $className => $vars) {
    // Get name of the class from filename and split CamelCase to words.
    $classNameString = $className;
    $classNameString = str_replace("Bis", "", $classNameString);
    $classNameString = preg_replace('/(?<!^)[A-Z]/', ' $0', $classNameString);
    $classNameString = ucwords($classNameString);

    $usesHeader = [
        "",
        "use Spatie\DataTransferObject\DataTransferObject;"
    ];

    $hasCasters = [
        "BisCompanyDetails",
    ];

    if (in_array($className, $hasCasters, true)) {
        $usesHeader["CastWith"] = "use Spatie\DataTransferObject\Attributes\CastWith;";
        $usesHeader["Casters"] = "use Spatie\DataTransferObject\Casters;";
    }
    $traits = [];

    if (array_key_exists('authority', $vars)) {
        $traits[] = "    use Traits\HasAuthority;";
    }
    if (array_key_exists('source', $vars)) {
        $traits[] = "    use Traits\HasSource;";
    }
    if (array_key_exists('version', $vars)) {
        $traits[] = "    use Traits\HasVersion;";
    }
    if (array_key_exists('language', $vars)) {
        $traits[] = "    use Traits\HasLanguage;";
    }
    if (array_key_exists('change', $vars)) {
        $traits[] = "    use Traits\HasChange;";
    }
    if (array_key_exists('register', $vars)) {
        $traits[] = "    use Traits\HasRegister;";
    }

    if (!empty($traits)) {
        $usesHeader[] = "use Ivuorinen\BusinessDataFetcher\Traits;";
    }

    $usesString = implode("\n", $usesHeader);

    $used = ['authority', 'source', 'version', 'language', 'change', 'register'];

    $file = "<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;
$usesString

/**
 * $classNameString
 */
class $className extends DataTransferObject
{";
    if (!empty($traits)) {
        $file .= "\n" . implode("\n", $traits) . "\n";
    }


    foreach ($vars as $varKey => $varData) {
        if (in_array($varKey, $used, true)) {
            continue;
        }

        $caster = "";
        if (str_contains($varData["type"], "[")) {
            $classType = str_replace(["[", "]", "?"], "", $varData["type"]);
            $caster = "\n    #[CastWith(Casters\ArrayCaster::class, itemType: $classType::class)]";
        }

        $type = $varData["type"];
        $typeHelper = "";
        if (str_contains($type, "[")) {
            $type = str_contains($type, "?") ? "?array" : "array";
            $typeHelper = "\n     * @var {$varData["type"]} \${$varData["name"]}";
        }

        $default = $varData["default"] !== null ? " = " . $varData["default"] . ";" : ";";
        $file .= "
    /**
     * {$varData["docs"]}{$typeHelper}
     */{$caster}
    public $type \${$varData["name"]}{$default}
";
    }
    $file .= "}\n";

    $files[$className] = $file;
}

if (!empty($files)) {
    echo "Generating files:\n";

    foreach ($files as $className => $file) {
        $filePath = sprintf(
            '%s%s%s%s%s%s%s.php',
            dirname(__FILE__, 2),
            DIRECTORY_SEPARATOR,
            'src',
            DIRECTORY_SEPARATOR,
            'Dto',
            DIRECTORY_SEPARATOR,
            $className
        );
        echo $filePath . "\n";
        file_put_contents($filePath, $file);
    }
}
