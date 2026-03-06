<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

final readonly class RegisteredEntry
{
    /**
     * @param list<DescriptionEntry> $descriptions
     */
    public function __construct(
        public string $type = '',
        public string $register = '',
        public string $authority = '',
        public array $descriptions = [],
        public ?string $registrationDate = null,
        public ?string $endDate = null,
    ) {
    }
}
