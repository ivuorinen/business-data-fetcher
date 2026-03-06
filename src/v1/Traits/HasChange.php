<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Traits;

trait HasChange
{
    public function getChangeString(): string
    {
        return match ($this->change) {
            2 => 'Business ID removal',
            3 => 'Combining of double IDs',
            5 => 'ID changed',
            44, 'FUU' => 'Fusion',
            45 => 'Operator continuing VAT activities',
            46 => 'Relation to predecessor',
            47, 'DIF' => 'Division',
            48 => 'Bankruptcy relationship',
            49 => 'Operations continued by a private trader',
            57 => 'Partial division',
            default => 'unknown:' . $this->change,
        };
    }
}
