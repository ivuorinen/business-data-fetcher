<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Dto;

use Spatie\DataTransferObject\DataTransferObject;
use Ivuorinen\BusinessDataFetcher\v1\Traits;

/**
 * Company Registered Office
 */
class BisCompanyRegisteredOffice extends DataTransferObject
{
    use Traits\HasSource;
    use Traits\HasVersion;
    use Traits\HasLanguage;

    /**
     * Zero for primary place of registered office, positive for others
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
     * Name of place of registered office
     */
    public string $name = '';
}
