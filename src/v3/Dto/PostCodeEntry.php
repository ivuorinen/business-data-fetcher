<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

/** Represents a Finnish postal code with associated city and municipality. */
final readonly class PostCodeEntry
{
    public function __construct(
        public string $postCode = '',
        public string $city = '',
        public bool $active = true,
        public string $languageCode = '',
        public ?string $municipalityCode = null,
    ) {
    }
}
