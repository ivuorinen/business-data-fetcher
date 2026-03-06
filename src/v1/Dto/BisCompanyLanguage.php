<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Dto;

use Ivuorinen\BusinessDataFetcher\v1\Traits;

final readonly class BisCompanyLanguage
{
    use Traits\HasSource;
    use Traits\HasLanguage;

    public function __construct(
        public string $registrationDate = '',
        public ?string $endDate = null,
        public string $name = '',
        public ?int $source = null,
        public int $version = 0,
        public ?string $language = null,
    ) {
    }
}
