# CLAUDE.md

## Project Overview

PHP library for fetching Finnish business data from the PRH (Finnish Patent and Registration Office) open data API. Supports both v1 (BIS) and v3 (YTJ) APIs.

## Commands

```bash
composer lint          # PSR-12 linting (phpcs v4) + Rector dry-run
composer lint-fix      # Auto-fix PSR-12 violations (phpcbf) + Rector apply
composer rector        # Run Rector standalone
composer phpstan       # Static analysis (level 9)
composer test          # Pest test suite
```

## Architecture

- **v1 Entry point**: `src/BusinessDataFetcher.php` — extends `AbstractClient`, fetches from `/bis/v1`
- **v3 Entry point**: `src/v3/Client.php` — extends `AbstractClient`, fetches from `/opendata-ytj-api/v3`
- **Shared HTTP**: `src/Http/AbstractClient.php` — base class with Guzzle + Valinor mapper
- **v1 DTOs**: `src/v1/Dto/` — `final readonly` classes with Valinor-compatible constructors
- **v3 DTOs**: `src/v3/Dto/` — `final readonly` classes matching the v3 OpenAPI schema
- **Traits**: `src/v1/Traits/` — method-only helpers (`HasSource`, `HasLanguage`, `HasRegister`, `HasAuthority`, `HasChange`)
- **Exceptions**: `src/v1/Exceptions/`, `src/v3/Exceptions/`
- **Tests**: `tests/Unit/` — Pest tests for traits, DTOs, and both clients

## Conventions

- PHP 8.2+
- PSR-12 coding standard (squizlabs/php_codesniffer v4)
- Rector (`rector.php`): `deadCode`, `codeQuality`, `typeDeclarations` sets — no `codingStyle` (phpcs handles that)
- PHPStan level 9
- Valinor v1 for DTO hydration with `allowSuperfluousKeys()`
- All DTOs are `final readonly` with constructor promotion
- Traits are method-only (no properties)
- Namespace: `Ivuorinen\BusinessDataFetcher`

## CI/CD

- GitHub Actions workflows in `.github/workflows/`
- Reusable composite actions from `ivuorinen/actions` (not `ivuorinen/.github`)
- Renovate config: `.github/renovate.json` extends `github>ivuorinen/renovate-config`
- `pinact run -u -v --fix` — pin all action refs to commit SHAs after editing workflows
- PHP matrix: 8.2, 8.3, 8.4
