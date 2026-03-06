<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Traits;

trait HasAuthority
{
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
