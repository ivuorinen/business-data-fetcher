<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

final readonly class BusinessId
{
    public function __construct(
        public string $value,
        public ?string $registrationDate = null,
        public ?string $source = null,
    ) {
    }
}
