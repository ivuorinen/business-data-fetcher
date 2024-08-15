<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Traits\HasSource;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Business Address
 */
class BisAddress extends DataTransferObject
{
    use HasSource;

    /**
     * One for current version and >1 for historical addresses
     */
    public int $version;

    /**
     * Date of registration
     */
    public string $registrationDate = "";

    /**
     * Ending date of registration
     */
    public ?string $endDate = null;

    /**
     * Care of address
     */
    public ?string $careOf = null;

    /**
     * Street address
     */
    public ?string $street = null;

    /**
     * ZIP code
     */
    public ?string $postCode = null;

    /**
     * City of address
     */
    public ?string $city = null;

    /**
     * Two letter language code
     */
    public ?string $language = null;

    /**
     * Type of address, 1 for street address, 2 for postal address
     */
    public int $type;

    /**
     * Two letter country code
     */
    public ?string $country = null;
}
