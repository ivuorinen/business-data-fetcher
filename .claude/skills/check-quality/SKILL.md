---
name: check-quality
description: Run lint, phpstan, and tests in sequence, fix any issues found
disable-model-invocation: true
---

Run the full quality check pipeline:
1. `composer lint` — fix any PSR-12 violations with `composer lint-fix`
2. `composer phpstan` — fix any static analysis issues
3. `composer test` — fix any failing tests

After each step, if issues are found, fix them before proceeding to the next step.
Do not commit. Report results when done.
