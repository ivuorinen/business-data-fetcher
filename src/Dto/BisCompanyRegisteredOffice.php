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
     *
     * @var int
     */
    public int $order;
    /**
     * One for current version and >1 for historical places of registered office
     *
     * @var int
     */
    public int $version;
    /**
     * Date of registration
     *
     * @var string
     */
    public string $registrationDate;
    /**
     * Ending date of registration
     *
     * @var string|null
     */
    public ?string $endDate;
    /**
     * Name of place of registered office
     *
     * @var string
     */
    public string $name;
    /**
     * Two letter language code
     *
     * @var string|null
     */
    public ?string $language;
}
