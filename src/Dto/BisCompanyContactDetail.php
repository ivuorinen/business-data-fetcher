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
     * Two letter language code
     *
     * @var string
     */
    public string $language;
    /**
     * Value of contact detail
     *
     * @var string
     */
    public string $value;
    /**
     * Type of contact detail
     *
     * @var string
     */
    public string $type;
}
