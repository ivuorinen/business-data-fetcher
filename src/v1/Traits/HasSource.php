<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Traits;

trait HasSource
{
    public function getSourceText(): string
    {
        return match ($this->source) {
            0 => 'common',
            1 => 'Finnish Patent and Registration Office',
            2 => 'Tax Administration',
            3 => 'Business Information System',
            default => '',
        };
    }
}
