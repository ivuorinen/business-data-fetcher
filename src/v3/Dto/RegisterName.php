<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

/** Represents a company name registered in a specific register. */
final readonly class RegisterName
{
    public function __construct(
        public string $name = '',
        public string $type = '',
        public string $source = '',
        public int $version = 0,
        public ?string $registrationDate = null,
        public ?string $endDate = null,
    ) {
    }
}
