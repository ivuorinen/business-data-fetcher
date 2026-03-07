<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Dto;

/** Top-level DTO for a company record from the BIS v1 API. */
final readonly class BisCompanyDetails
{
    /**
     * @param list<BisCompanyName> $names
     * @param list<BisCompanyName> $auxiliaryNames
     * @param list<BisAddress> $addresses
     * @param list<BisCompanyForm> $companyForms
     * @param list<BisCompanyLiquidation> $liquidations
     * @param list<BisCompanyBusinessLine> $businessLines
     * @param list<BisCompanyLanguage> $languages
     * @param list<BisCompanyRegisteredOffice> $registeredOffices
     * @param list<BisCompanyContactDetail> $contactDetails
     * @param list<BisCompanyRegisteredEntry> $registeredEntries
     * @param list<BisCompanyBusinessIdChange> $businessIdChanges
     */
    public function __construct(
        public string $businessId = '',
        public string $registrationDate = '',
        public ?string $companyForm = null,
        public ?string $detailsUri = null,
        public string $name = '',
        public array $names = [],
        public array $auxiliaryNames = [],
        public array $addresses = [],
        public array $companyForms = [],
        public array $liquidations = [],
        public array $businessLines = [],
        public array $languages = [],
        public array $registeredOffices = [],
        public array $contactDetails = [],
        public array $registeredEntries = [],
        public array $businessIdChanges = [],
    ) {
    }
}
