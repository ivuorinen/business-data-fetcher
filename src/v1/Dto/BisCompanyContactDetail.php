<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Dto;

use Ivuorinen\BusinessDataFetcher\v1\Traits;

/** Represents a company contact detail (phone, email, website, etc.). */
final readonly class BisCompanyContactDetail
{
    use Traits\HasSource;
    use Traits\HasLanguage;

    public function __construct(
        public string $registrationDate = '',
        public ?string $endDate = null,
        public string $value = '',
        public string $type = '',
        public ?int $source = null,
        public int $version = 0,
        public ?string $language = null,
    ) {
    }
}
