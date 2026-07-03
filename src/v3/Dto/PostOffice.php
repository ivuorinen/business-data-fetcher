<?php

declare(strict_types=1);

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

/** Represents a localized post office name within an address. */
final readonly class PostOffice
{
    public function __construct(
        public string $city,
        public string $languageCode,
        public ?string $municipalityCode = null,
    ) {
    }
}
