<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Traits\HasSource;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Company Name
 */
class BisCompanyName extends DataTransferObject
{
    use HasSource;

    /**
     * Order
     *
     * Zero for primary company name,
     * other for translations of the primary company name
     * and auxiliary company names
     */
    public int $order;
    /**
     * One for current version and >1 for historical company names
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
     * Company name
     */
    public string $name = "";

    /**
     * Two letter language code
     */
    public ?string $language = null;
}
