<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Dto;

use Spatie\DataTransferObject\DataTransferObject;
use Ivuorinen\BusinessDataFetcher\v1\Traits;

/**
 * Company Business Id Change
 */
class BisCompanyBusinessIdChange extends DataTransferObject
{
    use Traits\HasSource;
    use Traits\HasLanguage;
    use Traits\HasChange;

    /**
     * Description of reason
     */
    public string $description = '';

    /**
     * Reason code
     */
    public string $reason = '';

    /**
     * Date of Business ID change
     */
    public ?string $changeDate = null;

    /**
     * Old Business ID
     */
    public string $oldBusinessId = '';

    /**
     * New Business ID
     */
    public string $newBusinessId = '';
}
