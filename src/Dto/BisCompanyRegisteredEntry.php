<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Spatie\DataTransferObject\DataTransferObject;
use Ivuorinen\BusinessDataFetcher\Traits;

/**
 * Company Registered Entry
 */
class BisCompanyRegisteredEntry extends DataTransferObject
{
    use Traits\HasAuthority;
    use Traits\HasLanguage;
    use Traits\HasRegister;

    /**
     * Description of entry
     */
    public string $description = '';

    /**
     * Zero for common entries, one for ‘Unregistered’ and two for ‘Registered’
     */
    public int $status;

    /**
     * Date of registration
     */
    public string $registrationDate = '';

    /**
     * Ending date of registration
     */
    public ?string $endDate = null;
}
