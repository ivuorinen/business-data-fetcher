<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

/** Represents a Finnish business ID (Y-tunnus) with registration metadata. */
final readonly class BusinessId
{
    public function __construct(
        public string $value,
        public ?string $registrationDate = null,
        public ?string $source = null,
    ) {
    }
}
