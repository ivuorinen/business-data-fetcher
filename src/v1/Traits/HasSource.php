<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Traits;

/** Provides a human-readable data source name from the source code. */
trait HasSource
{
    /** Get the data source name (e.g. "Tax Administration", "PRH"). */
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
