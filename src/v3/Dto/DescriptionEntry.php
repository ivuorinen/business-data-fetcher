<?php

declare(strict_types=1);

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

/** Represents a localized description with a language code. */
final readonly class DescriptionEntry
{
    public function __construct(
        public string $languageCode = '',
        public string $description = '',
    ) {
    }
}
