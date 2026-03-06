<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

final readonly class Website
{
    public function __construct(
        public string $url,
        public ?string $registrationDate = null,
        public ?string $source = null,
    ) {
    }
}
