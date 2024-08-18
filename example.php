<?php

require_once "vendor/autoload.php";

$client = new Ivuorinen\BusinessDataFetcher\BusinessDataFetcher();
try {
    $results = $client->getBusinessInformation("1639413-9");
    print_r($results);
} catch (Exception $e) {
    var_dump($e);
}
