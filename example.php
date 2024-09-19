<?php

require_once "vendor/autoload.php";

$client = new Ivuorinen\BusinessDataFetcher\BusinessDataFetcher();
try {
    $results = $client->getBusinessInformation("1639413-9");
    // Convert to JSON
    echo json_encode($results, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
} catch (Exception $e) {
    var_dump($e);
}
