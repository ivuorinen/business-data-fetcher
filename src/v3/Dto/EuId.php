<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

/** Represents a company's EU VAT identification number. */
final readonly class EuId
{
    public function __construct(
        public string $value = '',
        public ?string $source = null,
    ) {
    }
}
