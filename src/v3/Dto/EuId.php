<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

final readonly class EuId
{
    public function __construct(
        public string $value = '',
        public ?string $source = null,
    ) {
    }
}
