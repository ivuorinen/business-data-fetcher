<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Dto;

use Spatie\DataTransferObject\DataTransferObject;
use Ivuorinen\BusinessDataFetcher\v1\Traits;

/**
 * Company Language
 */
class BisCompanyLanguage extends DataTransferObject
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
     * Name of language
     */
    public string $name = '';
}
