<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

final readonly class PostOffice
{
    public function __construct(
        public string $city,
        public string $languageCode,
        public ?string $municipalityCode = null,
    ) {
    }
}
