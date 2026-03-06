<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

final readonly class BusinessLine
{
    /**
     * @param list<DescriptionEntry> $descriptions
     */
    public function __construct(
        public string $code = '',
        public array $descriptions = [],
        public ?string $typeCodeSet = null,
        public ?string $registrationDate = null,
        public ?string $source = null,
    ) {
    }
}
