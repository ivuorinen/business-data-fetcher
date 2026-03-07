<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Traits;

/** Provides a human-readable authority name from the authority code. */
trait HasAuthority
{
    /** Get the authority name (e.g. "Tax Administration"). */
    public function getAuthorityString(): string
    {
        return match ($this->authority) {
            1 => 'Tax Administration',
            2 => 'Finnish Patent and Registration Office',
            3 => 'Population Register',
            default => 'unknown:' . $this->authority,
        };
    }
}
