<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Traits\HasSource;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Company Business Line
 *
 * - order (integer): Zero for main line of business, positive for others
 * - version (integer):
 *      One for current version and
 *      >1 for historical lines of business
 * - registrationDate (string): Date of registration
 * - endDate (string, optional): Ending date of registration
 * - name (string): Name of line of business
 * - language (string, optional): Two letter language code
 */
class BisCompanyBusinessLine extends DataTransferObject
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
     * Name of line of business
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
