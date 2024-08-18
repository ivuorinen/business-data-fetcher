<?php

namespace Ivuorinen\BusinessDataFetcher\Traits;

trait HasChange
{
    /**
     * @see getChangeString()
     * @var string|int|null $change Change as a string or integer.
     *                              Models claim this is an integer, but it can also be a string.
     */
    public string|int|null $change;

    /**
     * Get the description string of the change.
     */
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
