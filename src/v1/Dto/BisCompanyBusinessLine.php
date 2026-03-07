<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Dto;

use Ivuorinen\BusinessDataFetcher\v1\Traits;

/** Represents a company's line of business (industry classification). */
final readonly class BisCompanyBusinessLine
{
    use Traits\HasSource;
    use Traits\HasLanguage;

    public function __construct(
        public int $order = 0,
        public string $registrationDate = '',
        public ?string $endDate = null,
        public string $name = '',
        public ?int $source = null,
        public int $version = 0,
        public ?string $language = null,
    ) {
    }
}
