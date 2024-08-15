<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Traits\HasSource;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Company Registered Office
 */
class BisCompanyRegisteredOffice extends DataTransferObject
{
    use HasSource;

    /**
     * Zero for primary place of registered office, positive for others
     */
    public int $order;

    /**
     * One for current version and >1 for historical places of registered office
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
     * Name of place of registered office
     */
    public string $name = "";

    /**
     * Two letter language code
     */
    public ?string $language = null;
}
