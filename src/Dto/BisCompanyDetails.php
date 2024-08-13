<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Company Details
 */
class BisCompanyDetails extends DataTransferObject
{
    /**
     * Business ID
     *
     * @var string
     */
    public string $businessId;
    /**
     * Primary company name
     *
     * @var string
     */
    public string $name;
    /**
     * Date of registration
     *
     * @var string
     */
    public string $registrationDate;
    /**
     * Company form
     *
     * @var string|null
     */
    public ?string $companyForm = null;
    /**
     * A URI for more details, if details aren't already included
     *
     * @var string|null
     */
    public ?string $detailsUri = null;

    /**
     * Primary company name and translations
     *
     * @var BisCompanyName[] $names
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyName::class)]
    public ?array $names = null;

    /**
     * Auxiliary company name and translations
     *
     * @var BisCompanyName[] $auxiliaryNames
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyName::class)]
    public ?array $auxiliaryNames = null;

    /**
     * Company's street and postal addresses
     *
     * @var BisAddress[]|null $addresses
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisAddress::class)]
    public ?array $addresses = null;

    /**
     * Company form and translations
     *
     * @var BisCompanyForm[]|null $companyForms
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyForm::class)]
    public ?array $companyForms = null;

    /**
     * Bankruptcy, liquidation or restructuring proceedings
     *
     * @var BisCompanyLiquidation[]|null $liquidations
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyLiquidation::class)]
    public ?array $liquidations = null;

    /**
     * Company's lines of business and translations
     *
     * @var BisCompanyBusinessLine[]|null $businessLines
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyBusinessLine::class)]
    public ?array $businessLines = null;

    /**
     * Company's language(s)
     *
     * @var BisCompanyLanguage[]|null $languages
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyLanguage::class)]
    public ?array $languages = null;

    /**
     * Company's place of registered office and its translations
     *
     * @var BisCompanyRegisteredOffice[]|null $registeredOffices
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyRegisteredOffice::class)]
    public ?array $registeredOffices = null;

    /**
     * Company's contact details and translations
     *
     * @var BisCompanyContactDetail[]|null $contactDetails
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyContactDetail::class)]
    public ?array $contactDetails = null;

    /**
     * Company's registered entries
     *
     * @var BisCompanyRegisteredEntry[]|null $registeredEntries
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyRegisteredEntry::class)]
    public ?array $registeredEntries = null;

    /**
     * Company's Business ID changes
     *
     * @var BisCompanyBusinessIdChange[]|null $businessIdChanges
     */
    #[CastWith(Casters\ArrayCaster::class, itemType: BisCompanyBusinessIdChange::class)]
    public ?array $businessIdChanges = null;
}
