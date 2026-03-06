<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

final readonly class DescriptionEntry
{
    public function __construct(
        public string $languageCode = '',
        public string $description = '',
    ) {
    }
}
