<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

/** Represents a company's operational situation (e.g. active, dissolved). */
final readonly class CompanySituation
{
    public function __construct(
        public string $type,
        public string $source,
        public ?string $registrationDate = null,
        public ?string $endDate = null,
    ) {
    }
}
