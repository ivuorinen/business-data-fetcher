<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

final readonly class CompanyForm
{
    /**
     * @param list<DescriptionEntry> $descriptions
     */
    public function __construct(
        public string $type = '',
        public string $source = '',
        public int $version = 0,
        public array $descriptions = [],
        public ?string $registrationDate = null,
        public ?string $endDate = null,
    ) {
    }
}
