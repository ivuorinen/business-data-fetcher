<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Traits\HasSource;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Company Business ID Change
 */
class BisCompanyBusinessIdChange extends DataTransferObject
{
    use HasSource;

    /**
     * Description of reason
     */
    public string $description = "";

    /**
     * Reason code
     */
    public string $reason = "";

    /**
     * Date of Business ID change
     */
    public ?string $changeDate = null;

    /**
     * Business ID Change
     *
     * 2 = Business ID removal,
     * 3 = Combining of double IDs,
     * 5 = ID changed,
     * 44 = Fusion,
     * 45 = Operator continuing VAT activities,
     * 46 = Relation to predecessor,
     * 47 = Division,
     * 48 = Bankruptcy relationship,
     * 49 = Operations continued by a private trader,
     * 57 = Partial division,
     * DIF = Division,
     * FUU = Fusion
     */
    public int $change;

    /**
     * Old Business ID
     */
    public string $oldBusinessId = "";

    /**
     * New Business ID
     */
    public string $newBusinessId = "";

    /**
     * Two letter language code
     */
    public ?string $language = null;
}
