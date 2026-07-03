# Nitpicker Findings
Generated: 2026-07-03
Last validated: 2026-07-03

## Summary
- Total: 4 | Open: 2 | Fixed: 2 | Invalid: 0

## Open Findings

### Critical

_None._

### High

_None._

### Medium

_None._

### Low

_None._

### Advisory

#### [NIT-3] pestphp/pest held at 3.x by PHP 8.2 support
Category: conventions
Area: composer.json
Problem: pest 4.7.4 is available but requires phpunit/phpunit ^12.5.30, which requires PHP >= 8.3, conflicting with the library's `php: ^8.2` requirement and the 8.2 CI matrix job.
Evidence: `composer why-not pestphp/pest 4.7.4` — conflict chain via phpunit/phpunit ^12.5.30.
Impact: None today; pest 3.8.6 is maintained. Blocks pest 4 features until PHP 8.2 support is dropped.
Fix: When PHP 8.2 support is dropped (bump `php` to `^8.3`, update CI matrix and `config.platform.php`), bump pest to `^4.0` in the same change.

#### [NIT-4] Test files lack `declare(strict_types=1)`
Category: tests
Area: tests/
Problem: All 38 src files now declare strict_types, but 11 test files do not. Rector only covers `src/` (`rector.php` paths), so the inconsistency will persist.
Evidence: `grep -rL "declare(strict_types=1)" tests/ --include="*.php" | wc -l` → 11.
Impact: Tests run in weak-typing mode, so a coercion bug masked by weak mode in test helper calls could pass. Low practical risk for this suite.
Fix: Add `__DIR__ . '/tests'` to `withPaths()` in rector.php, or add the declare manually to the 11 files.

## Fixed

### Pass 1 — 2026-07-03

#### [NIT-1] composer.lock resolved for PHP 8.5, breaking PHP 8.2/8.3 CI
Fixed: 2026-07-03
Notes: The update run on local PHP 8.5.7 pulled symfony/console, filesystem, finder, process, string v8.1.x (all require php >= 8.4.1) into packages-dev, which would fail `composer install` on the PHP 8.2 and 8.3 CI matrix jobs. Added `config.platform.php: 8.2.29` to composer.json and re-ran `composer update`; symfony packages downgraded to latest 7.4.x and symfony/polyfill-php85 was removed. Verified no remaining lock package requires PHP > 8.2.

#### [NIT-2] Entry-point clients missing `declare(strict_types=1)`
Fixed: 2026-07-03
Notes: The branch added strict_types to 36 src files but skipped src/BusinessDataFetcher.php and src/v3/Client.php. Added the declare to both; phpcs, Rector, PHPStan level 9, and the 58-test Pest suite all pass.

## Invalid

_None._
