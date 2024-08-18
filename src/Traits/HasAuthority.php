<?php

namespace Ivuorinen\BusinessDataFetcher\Traits;

trait HasAuthority
{
    /**
     * @see getChangeString()
     * @var int $authority What authority the change is related to.
     */
    public int $authority;

    /**
     * Get the name of the authority.
     */
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
