<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Spatie\DataTransferObject\DataTransferObject;
use Ivuorinen\BusinessDataFetcher\Traits;

/**
 * Company Contact Detail
 */
class BisCompanyContactDetail extends DataTransferObject
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
     * Value of contact detail
     */
    public string $value = '';

    /**
     * Type of contact detail
     */
    public string $type = '';
}
