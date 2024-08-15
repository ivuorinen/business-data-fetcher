<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Traits\HasSource;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Company Contact Detail
 */
class BisCompanyContactDetail extends DataTransferObject
{
    use HasSource;

    /**
     * One for current version and >1 for historical contact details
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
     * Two letter language code
     */
    public ?string $language = null;

    /**
     * Value of contact detail
     */
    public string $value = "";

    /**
     * Type of contact detail
     */
    public string $type = "";
}
