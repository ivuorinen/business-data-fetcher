<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Traits\HasSource;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Company Language
 */
class BisCompanyLanguage extends DataTransferObject
{
    use HasSource;

    /**
     * One for current version and >1 for historical company forms
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
     * Bankruptcy, liquidation or restructuring proceedings
     */
    public string $name = "";

    /**
     * Two letter language code
     */
    public ?string $language = null;

    /**
     * Type of liquidation
     */
    public string $type = "";
}
