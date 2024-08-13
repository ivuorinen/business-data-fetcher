<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Traits\HasSource;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Company Liquidation
 *
 * - version (integer): One for current version and >1 for historical company forms
 * - registrationDate (string): Date of registration
 * - endDate (string, optional): Ending date of registration
 * - name (string): Bankruptcy, liquidation or restructuring proceedings
 * - language (string, optional): Two letter language code
 * - type (string): Type of liquidation
 */
class BisCompanyLiquidation extends DataTransferObject
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
     * Bankruptcy, liquidation or restructuring proceedings
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

    public string $type;
}
