<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

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
