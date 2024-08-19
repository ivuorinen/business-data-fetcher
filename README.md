# Business Data Fetcher

This is an API client to Finnish Patent and Registration
Office's (PRH) Business Information System (BIS) v1.

Use it to get company data from the Business Information System by Business ID.

## Installation

```bash
composer install ivuorinen/business-data-fetcher
```

## Usage example

```php
<?php
require_once 'vendor/autoload.php';

$client  = new Ivuorinen\BusinessDataFetcher\BusinessDataFetcher();
try {
    $results = $client->getBusinessInformation('1639413-9');
    print_r($results);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    var_dump($e);
}
```

## Data source

All models are transcribed from PRH Open Data portal. You can find the examples
and models descriptions, among other details and live API query tool following
this link: https://avoindata.prh.fi/ytj_en.html

## Notice of Liability

The data provided by the API is subject to change without warning and the author(s)
of this library are providing this without compensation and cannot be held responsible.

## License

[MIT licensed](LICENSE.md)

