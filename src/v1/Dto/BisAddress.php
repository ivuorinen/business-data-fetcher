<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Dto;

use Ivuorinen\BusinessDataFetcher\v1\Traits;

/** Represents a postal or visiting address from the BIS v1 API. */
final readonly class BisAddress
{
    use Traits\HasSource;
    use Traits\HasLanguage;

    public function __construct(
        public int $type = 0,
        public string $registrationDate = '',
        public ?string $endDate = null,
        public ?string $careOf = null,
        public ?string $street = null,
        public ?string $postCode = null,
        public ?string $city = null,
        public ?string $country = null,
        public ?int $source = null,
        public int $version = 0,
        public ?string $language = null,
    ) {
    }
}
