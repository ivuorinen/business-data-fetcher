# Contributing

## Requirements

- PHP 8.2+
- Composer

## Setup

```bash
git clone https://github.com/ivuorinen/business-data-fetcher.git
cd business-data-fetcher
composer install
```

## Development Workflow

### Running checks

```bash
composer lint          # PSR-12 linting
composer lint-fix      # Auto-fix PSR-12 violations
composer phpstan       # Static analysis (level 9)
composer test          # Pest test suite
```

### Branch Strategy

- `main` — stable release branch
- `feat/*` — feature branches
- `fix/*` — bugfix branches

### Pull Request Process

1. Create a feature or fix branch from `main`
2. Make your changes
3. Ensure all checks pass: `composer lint && composer phpstan && composer test`
4. Open a PR against `main`
5. PRs require passing CI before merge

## Code Conventions

- PSR-12 coding standard
- PHPStan level 9 strict analysis
- All DTOs are `final readonly` classes with constructor promotion
- Use Valinor for hydration (not manual array mapping)
- Write Pest tests for new functionality
