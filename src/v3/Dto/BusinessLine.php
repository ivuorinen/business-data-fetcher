<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

/** Represents a company's line of business (industry classification) from the YTJ v3 API. */
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
