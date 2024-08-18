<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters;

/**
 * Company Details
 */
class BisCompanyDetails extends DataTransferObject
{
    /**
     * Primary company name and translations
     * @var BisCompanyName[] $names
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyName::class)]
    public array $names = [];

    /**
     * Auxiliary company name and translations
     * @var ?BisCompanyName[] $auxiliaryNames
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyName::class)]
    public ?array $auxiliaryNames = [];

    /**
     * Company's street and postal addresses
     * @var ?BisAddress[] $addresses
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisAddress::class)]
    public ?array $addresses = [];

    /**
     * Company form and translations
     * @var ?BisCompanyForm[] $companyForms
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyForm::class)]
    public ?array $companyForms = [];

    /**
     * Bankruptcy, liquidation or restructuring proceedings
     * @var ?BisCompanyLiquidation[] $liquidations
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyLiquidation::class)]
    public ?array $liquidations = [];

    /**
     * Company's lines of business and translations
     * @var ?BisCompanyBusinessLine[] $businessLines
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyBusinessLine::class)]
    public ?array $businessLines = [];

    /**
     * Company's language(s)
     * @var ?BisCompanyLanguage[] $languages
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyLanguage::class)]
    public ?array $languages = [];

    /**
     * Company's place of registered office and its translations
     * @var ?BisCompanyRegisteredOffice[] $registeredOffices
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyRegisteredOffice::class)]
    public ?array $registeredOffices = [];

    /**
     * Company's contact details and translations
     * @var ?BisCompanyContactDetail[] $contactDetails
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyContactDetail::class)]
    public ?array $contactDetails = [];

    /**
     * Company's registered entries
     * @var ?BisCompanyRegisteredEntry[] $registeredEntries
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyRegisteredEntry::class)]
    public ?array $registeredEntries = [];

    /**
     * Company's Business ID changes
     * @var ?BisCompanyBusinessIdChange[] $businessIdChanges
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyBusinessIdChange::class)]
    public ?array $businessIdChanges = [];

    /**
     * Business ID
     */
    public string $businessId = '';

    /**
     * Date of registration
     */
    public string $registrationDate = '';

    /**
     * Company form
     */
    public ?string $companyForm = null;

    /**
     * A URI for more details, if details aren't already included
     */
    public ?string $detailsUri = null;

    /**
     * Primary company name
     */
    public string $name = '';
}
