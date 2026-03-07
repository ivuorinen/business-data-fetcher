---
name: gen-test
description: Generate a Pest test for a PHP class following project conventions
disable-model-invocation: true
---

Generate a Pest test file for the specified class.

Rules:
- Place tests in `tests/Unit/` mirroring the src/ structure
- Use Pest syntax (test(), expect(), describe())
- For DTOs: test construction with valid data, verify all readonly properties
- For traits: test each method the trait provides
- For clients: mock Guzzle responses, test Valinor hydration
- Follow existing test patterns in tests/Unit/
- Read existing tests first to match style
