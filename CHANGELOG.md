# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- v3 API client (`Ivuorinen\BusinessDataFetcher\v3\Client`) with support for:
  - Company search (`searchCompanies()`)
  - Code list descriptions (`getDescription()`)
  - Postal code lookup (`getPostCodes()`)
  - Full company ZIP download (`getAllCompanies()`)
- v3 DTOs based on the official OpenAPI schema
- Pest test suite with 57 tests covering traits, DTOs, and both API clients
- Shared HTTP infrastructure (`AbstractClient`, `HttpClientFactory`)
- PHP 8.4 added to CI matrix
- CI pipeline now runs linting, static analysis, and tests
- `phpunit.xml` configuration
- `.github/labels.yml` for label sync workflow

### Changed

- **BREAKING:** Replaced `spatie/data-transfer-object` with `cuyz/valinor` for DTO hydration
- **BREAKING:** All v1 DTOs are now `final readonly` classes with constructor promotion
- **BREAKING:** Removed `$sourceText` and `$authorityText` computed properties from traits; use `getSourceText()` and `getAuthorityString()` methods instead
- **BREAKING:** `BusinessDataFetcher` constructor now accepts an optional `?Client` parameter for testability
- Upgraded `squizlabs/php_codesniffer` from v3 to v4
- **BREAKING:** `BusinessDataFetcher` now extends `AbstractClient`
- **BREAKING:** Traits are now method-only (no properties or constructors)
- **BREAKING:** Removed empty `HasVersion` trait (version is a regular constructor property)

### Removed

- `spatie/data-transfer-object` dependency
- `ivuorinen/markdowndocs` dependency (incompatible with Pest's symfony/console requirement)
- `composer docs` script (pending markdowndocs update)
