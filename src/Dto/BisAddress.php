<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Traits\HasSource;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Business Address
 *
 * - careOf (string, optional): Care of address
 * - street (string, optional): Street address
 * - postCode (string, optional): ZIP code
 * - city (string, optional): City of address
 * - language (string, optional): Two letter language code
 * - type (integer): Type of address, 1 for street address, 2 for postal address
 * - country (string, optional): Two letter country code
 */
class BisAddress extends DataTransferObject
{
    use HasSource;

    /**
     * One for current version and >1 for historical company names
     *
     * @var int
     */
    public int $version;
    /**
     * Date of registration
     *
     * @var string
     */
    public string $registrationDate = '';
    /**
     * Ending date of registration
     *
     * @var string|null
     */
    public ?string $endDate = null;
    /**
     * Care of address (c/o)
     *
     * @var string|null
     */
    public ?string $careOf;
    /**
     * Street address
     *
     * @var string|null
     */
    public ?string $street;
    /**
     * ZIP code
     *
     * @var string|null
     */
    public ?string $postCode;
    /**
     * City of address
     *
     * @var string|null
     */
    public ?string $city;
    /**
     * Two letter language code
     *
     * @var string|null
     */
    public ?string $language;
    /**
     * Type of address, 1 for street address, 2 for postal address
     *
     * @var int
     */
    public int $type;
    /**
     * Two-letter country code
     *
     * @var string|null
     */
    public ?string $country;
}
