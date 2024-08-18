<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Spatie\DataTransferObject\DataTransferObject;
use Ivuorinen\BusinessDataFetcher\Traits;

/**
 * Address
 */
class BisAddress extends DataTransferObject
{
    use Traits\HasSource;
    use Traits\HasVersion;
    use Traits\HasLanguage;

    /**
     * Date of registration
     */
    public string $registrationDate = '';

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
     * Type of address, 1 for street address, 2 for postal address
     */
    public int $type;

    /**
     * Two letter country code
     */
    public ?string $country = null;
}
