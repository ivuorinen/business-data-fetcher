<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Traits\HasSource;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Company Business Line
 */
class BisCompanyBusinessLine extends DataTransferObject
{
    use HasSource;

    /**
     * Zero for main line of business, positive for others
     */
    public int $order;

    /**
     * One for current version and >1 for historical lines of business
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
     * Name of line of business
     */
    public string $name = "";

    /**
     * Two letter language code
     */
    public ?string $language = null;
}
