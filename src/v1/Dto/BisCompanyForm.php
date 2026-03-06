<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Dto;

use Ivuorinen\BusinessDataFetcher\v1\Traits;

final readonly class BisCompanyForm
{
    use Traits\HasSource;
    use Traits\HasLanguage;

    public function __construct(
        public string $registrationDate = '',
        public ?string $endDate = null,
        public string $name = '',
        public ?string $type = null,
        public ?int $source = null,
        public int $version = 0,
        public ?string $language = null,
    ) {
    }
}
