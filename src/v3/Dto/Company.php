<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

/** Top-level DTO for a company record from the YTJ v3 API. */
final readonly class Company
{
    /**
     * @param list<RegisterName> $names
     * @param list<CompanyForm> $companyForms
     * @param list<CompanySituation> $companySituations
     * @param list<RegisteredEntry> $registeredEntries
     * @param list<Address> $addresses
     */
    public function __construct(
        public BusinessId $businessId,
        public string $tradeRegisterStatus = '',
        public string $lastModified = '',
        public ?EuId $euId = null,
        public array $names = [],
        public ?BusinessLine $mainBusinessLine = null,
        public ?Website $website = null,
        public array $companyForms = [],
        public array $companySituations = [],
        public array $registeredEntries = [],
        public array $addresses = [],
        public ?string $status = null,
        public ?string $registrationDate = null,
        public ?string $endDate = null,
    ) {
    }
}
