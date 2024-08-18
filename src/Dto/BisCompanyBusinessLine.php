<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Spatie\DataTransferObject\DataTransferObject;
use Ivuorinen\BusinessDataFetcher\Traits;

/**
 * Company Business Line
 */
class BisCompanyBusinessLine extends DataTransferObject
{
    use Traits\HasSource;
    use Traits\HasVersion;
    use Traits\HasLanguage;

    /**
     * Zero for main line of business, positive for others
     */
    public int $order;

    /**
     * Date of registration
     */
    public string $registrationDate = '';

    /**
     * Ending date of registration
     */
    public ?string $endDate = null;

    /**
     * Name of line of business
     */
    public string $name = '';
}
