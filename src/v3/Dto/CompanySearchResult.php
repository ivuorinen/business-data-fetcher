<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

/** Paginated search result containing matched companies from the YTJ v3 API. */
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
