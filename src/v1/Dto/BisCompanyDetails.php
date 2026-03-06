<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Dto;

final readonly class BisCompanyDetails
{
    /**
     * @param list<BisCompanyName> $names
     * @param list<BisCompanyName>|null $auxiliaryNames
     * @param list<BisAddress>|null $addresses
     * @param list<BisCompanyForm>|null $companyForms
     * @param list<BisCompanyLiquidation>|null $liquidations
     * @param list<BisCompanyBusinessLine>|null $businessLines
     * @param list<BisCompanyLanguage>|null $languages
     * @param list<BisCompanyRegisteredOffice>|null $registeredOffices
     * @param list<BisCompanyContactDetail>|null $contactDetails
     * @param list<BisCompanyRegisteredEntry>|null $registeredEntries
     * @param list<BisCompanyBusinessIdChange>|null $businessIdChanges
     */
    public function __construct(
        public string $businessId = '',
        public string $registrationDate = '',
        public ?string $companyForm = null,
        public ?string $detailsUri = null,
        public string $name = '',
        public array $names = [],
        public ?array $auxiliaryNames = [],
        public ?array $addresses = [],
        public ?array $companyForms = [],
        public ?array $liquidations = [],
        public ?array $businessLines = [],
        public ?array $languages = [],
        public ?array $registeredOffices = [],
        public ?array $contactDetails = [],
        public ?array $registeredEntries = [],
        public ?array $businessIdChanges = [],
    ) {
    }
}
