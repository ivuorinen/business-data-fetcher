<?php

// Load models.txt that contains https://avoindata.prh.fi/ytj_en.html models.
// Just copy and paste the plaintext Response Class contents to the file and
// run this file: php parser.php
$models = file_get_contents(sprintf(
    '%s%2$smodels.txt',
    __DIR__,
    DIRECTORY_SEPARATOR
));

// Capture the names as one group,
// and blocks inside curly braces as another,
// then combine them later.
preg_match_all('/(\w+)\s\{([\w\W]*?)\}/m', $models, $output_array);

[$all, $names, $fields] = $output_array;

$fields = array_map(
    function ($f) {
        $f = explode("\n", $f);
        $f = array_map('trim', $f);
        $f = array_filter($f);

        $f = array_map(function ($field) {
            [$name_and_type, $docs] = explode(':', $field, 2);
            $names_and_types = explode(' ', $name_and_type, 2);

            [$name, $type] = $names_and_types;

            $type = str_replace(['(', ')'], '', $type);

            if (str_contains($type, 'optional')) {
                $type = str_replace(['optional', ','], '', $type);
                $type = '?' . trim($type);
            }

            return [
                $name => [
                    'name' => trim($name),
                    'type' => trim($type),
                    'docs' => trim($docs),
                ],
            ];
        }, $f ?? []);

        $f = array_merge(...$f);

        return $f;
    },
    $fields
);

$classes = array_combine($names, $fields);

print_r($classes);
