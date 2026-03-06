<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

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
