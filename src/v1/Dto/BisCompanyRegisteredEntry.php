<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Dto;

use Ivuorinen\BusinessDataFetcher\v1\Traits;

final readonly class BisCompanyRegisteredEntry
{
    use Traits\HasAuthority;
    use Traits\HasLanguage;
    use Traits\HasRegister;

    public function __construct(
        public string $description = '',
        public int $status = 0,
        public string $registrationDate = '',
        public ?string $endDate = null,
        public int $authority = 0,
        public ?string $language = null,
        public int|null $register = null,
    ) {
    }
}
