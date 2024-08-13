<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Traits\HasSource;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Company Name
 */
class BisCompanyName extends DataTransferObject
{
    use HasSource;

    /**
     * Order
     *
     * Zero for primary company name,
     * other for translations of the primary company name
     * and auxiliary company names
     *
     * @var int
     */
    public int $order;
    /**
     * One for current version and >1 for historical company names
     *
     * @var int
     */
    public int $version;
    /**
     * Date of registration
     *
     * @var string
     */
    public string $registrationDate = '';
    /**
     * Ending date of registration
     *
     * @var string|null
     */
    public ?string $endDate = null;
    /**
     * Company name
     *
     * @var string
     */
    public string $name;
    /**
     * Two letter language code
     *
     * @var string|null
     */
    public ?string $language = null;
}