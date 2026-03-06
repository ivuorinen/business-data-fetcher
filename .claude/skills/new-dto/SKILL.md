---
name: new-dto
description: Create a new final readonly DTO class with Valinor-compatible constructor
disable-model-invocation: true
---

Create a new DTO class following project conventions:
- `final readonly class` with constructor promotion
- Place in `src/v1/Dto/` or `src/v3/Dto/` based on API version
- All properties as constructor-promoted readonly parameters
- Use appropriate PHP types (string, int, ?string for nullable)
- Apply relevant traits (HasSource, HasLanguage, etc.) if applicable
- Namespace: `Ivuorinen\BusinessDataFetcher\{v1|v3}\Dto`
- Generate a corresponding Pest test in tests/Unit/
- Read existing DTOs first to match style
