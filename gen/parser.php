<?php

// Load models.txt that contains https://avoindata.prh.fi/ytj_en.html models.
// Just copy and paste the plaintext Response Class contents to the file and
// run this file: php parser.php
$models = file_get_contents(sprintf('%s%2$smodels.txt', __DIR__, DIRECTORY_SEPARATOR));

// Capture the names as one group,
// and blocks inside curly braces as another,
// then combine them later.
preg_match_all("/(\w+)\s\{([\w\W]*?)\}/m", $models, $output_array);

[$all, $names, $fields] = $output_array;

$fields = array_map(function ($f) {
    $f = explode("\n", $f);
    $f = array_map("trim", $f);
    $f = array_filter($f);

    $f = array_map(function ($field) {
        [$name_and_type, $docs] = explode(":", $field, 2);
        $names_and_types = explode(" ", $name_and_type, 2);

        [$name, $type] = $names_and_types;

        $type = str_replace(["(", ")"], "", $type);

        if (str_contains($type, "optional")) {
            $type = str_replace(["optional", ","], "", $type);
            $type = "?" . trim($type);
        }

        if ($type === "integer") {
            $type = "int";
        }

        if (str_contains($type, "Array")) {
            $type = str_replace(["Array[", "]"], "", $type);
            $type = $type . "[]";
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
    }, $f ?? []);

    $f = array_merge(...$f);

    return $f;
}, $fields);

$classes = array_combine($names, $fields);

ksort($classes);

// print_r($classes);

// Files that have already been processed.
// Uncomment to display the results again.
$added = [
    // "BisCompanyRegisteredOffice",
    // "BisCompanyRegisteredEntry",
    // "BisCompanyName",
    // "BisCompanyLiquidation",
    // "BisCompanyLanguage",
    // "BisCompanyForm",
    // "BisCompanyDetails",
    // "BisCompanyContactDetail",
    // "BisCompanyBusinessLine",
    // "BisCompanyBusinessIdChange",
    // "BisAddress",
];

// Output the classes as preformatted for easier copypasta.
// This is not the prettiest way to generate the codes, but it works.
foreach ($classes as $className => $vars) {
    if (in_array($className, $added)) {
        continue;
    }

    echo "
/**
 * $className
 */
class $className extends DataTransferObject
{
";
    if (array_key_exists("source", $vars)) {
        echo "    use HasSource;\n";
    }

    foreach ($vars as $varKey => $varData) {
        if ($varKey === "source") {
            continue;
        }

        $caster = "";
        if (str_contains($varData["type"], "[")) {
            $classType = str_replace(["[", "]", "?"], "", $varData["type"]);
            $caster = "\n    #[CastWith(Casters\ArrayCaster::class, itemType: {$classType}::class)]";
        }

        $type = $varData["type"];
        $typeHelper = "";
        if (str_contains($type, "[")) {
            $type = str_contains($type, "?") ? "?array" : "array";
            $typeHelper = "\n     * @var {$varData["type"]} \${$varData["name"]}";
        }

        $default = $varData["default"] !== null ? " = " . $varData["default"] . ";" : ";";
        echo "
    /**
     * {$varData["docs"]}{$typeHelper}
     */{$caster}
    public {$type} \${$varData["name"]}{$default}
";
    }
    echo "\n}";
}
