<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Traits\HasSource;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Company Business ID Change
 *
 * - description (string): Description of reason
 * - reason (string): Reason code
 * - changeDate (string, optional): Date of Business ID change
 * - change (integer):
 *      2 = Business ID removal,
 *      3 = Combining of double IDs,
 *      5 = ID changed,
 *      44 = Fusion,
 *      45 = Operator continuing VAT activities,
 *      46 = Relation to predecessor,
 *      47 = Division,
 *      48 = Bankruptcy relationship,
 *      49 = Operations continued by a private trader,
 *      57 = Partial division,
 *      DIF = Division,
 *      FUU = Fusion
 * - oldBusinessId (string): Old Business ID
 * - newBusinessId (string): New Business ID
 * - language (string, optional): Two letter language code
 */
class BisCompanyBusinessIdChange extends DataTransferObject
{
    use HasSource;
}
