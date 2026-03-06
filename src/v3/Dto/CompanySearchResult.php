<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

final readonly class CompanySearchResult
{
    /**
     * @param list<Company> $companies
     */
    public function __construct(
        public int $totalResults = 0,
        public array $companies = [],
    ) {
    }
}
