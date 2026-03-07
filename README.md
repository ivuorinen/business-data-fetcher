# Business Data Fetcher

[![PHP Composer](https://github.com/ivuorinen/business-data-fetcher/actions/workflows/composer.yml/badge.svg)](https://github.com/ivuorinen/business-data-fetcher/actions/workflows/composer.yml)

PHP library for fetching Finnish business data from the PRH (Finnish Patent and Registration Office) open data API.

Supports both **v1** (BIS) and **v3** (YTJ) APIs.

## Installation

```bash
composer require ivuorinen/business-data-fetcher
```

## Usage

### v1 API (BIS)

Fetch company details by Business ID:

```php
use Ivuorinen\BusinessDataFetcher\BusinessDataFetcher;

$client = new BusinessDataFetcher();
$results = $client->getBusinessInformation('1639413-9');

foreach ($results as $company) {
    echo $company->name . "\n";
    echo $company->businessId . "\n";

    foreach ($company->names as $name) {
        echo $name->name . ' (' . $name->getLanguageString() . ")\n";
    }
}
```

### v3 API (YTJ)

Search companies with multiple filters:

```php
use Ivuorinen\BusinessDataFetcher\v3\Client;

$client = new Client();

// Search by name
$result = $client->searchCompanies(name: 'Example');
echo "Found {$result->totalResults} companies\n";

foreach ($result->companies as $company) {
    echo $company->businessId->value . ' - ';
    echo $company->names[0]->name . "\n";
}

// Search by Business ID
$result = $client->searchCompanies(businessId: '1639413-9');

// Search with multiple filters
$result = $client->searchCompanies(
    location: 'Helsinki',
    companyForm: 'OY',
    mainBusinessLine: '62010',
);

// Get code list descriptions
$description = $client->getDescription('REK', 'en');

// Get postal codes
$postCodes = $client->getPostCodes('fi');

// Download all companies as ZIP
$stream = $client->getAllCompanies();
file_put_contents('companies.zip', $stream->getContents());
```

## v1 vs v3 API Comparison

| Feature | v1 (BIS) | v3 (YTJ) |
|---------|----------|----------|
| Base URL | `/bis/v1` | `/opendata-ytj-api/v3` |
| Lookup | By Business ID only | Search by name, location, form, etc. |
| Company form | String code | Structured with descriptions |
| Addresses | Flat structure | Nested with PostOffice objects |
| Code lists | N/A | `/description` endpoint |
| Postal codes | N/A | `/post_codes` endpoint |
| Bulk download | N/A | `/all_companies` ZIP |

## Migration from v1 DTOs

If upgrading from the Spatie DTO version:

- DTOs are now `final readonly` classes (no `->toArray()`)
- `$sourceText` / `$authorityText` properties removed; use `getSourceText()` / `getAuthorityString()` methods
- `HasVersion` trait removed; `$version` is a regular constructor property
- `BusinessDataFetcher` constructor accepts an optional Guzzle `Client` for testing

## Development

```bash
composer lint          # PSR-12 linting
composer lint-fix      # Auto-fix violations
composer phpstan       # Static analysis (level 9)
composer test          # Pest test suite
```

## Data Source

- v1: <https://avoindata.prh.fi/ytj_en.html>
- v3: <https://avoindata.prh.fi/fi/ytj/swagger-ui>

## Notice of Liability

The data provided by the API is subject to change without warning and the author(s)
of this library are providing this without compensation and cannot be held responsible.

## License

[MIT licensed](LICENSE.md)
