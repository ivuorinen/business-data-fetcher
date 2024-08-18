<?php

namespace Ivuorinen\BusinessDataFetcher\Traits;

trait HasRegister
{
    /**
     * @see getRegisterString()
     * @var int|null $register What register the change is related to.
     */
    public int|null $register;

    /**
     * Get the name of the register.
     */
    public function getRegisterString(): string
    {
        return match ($this->register) {
            1 => 'Trade Register',
            2 => 'Register of Foundations',
            3 => 'Register of Associations',
            4 => 'Tax Administration',
            5 => 'Prepayment Register',
            6 => 'VAT Register',
            7 => 'Employer Register',
            8 => 'Register of bodies liable for tax on insurance premiums',
            default => 'unknown:' . $this->register,
        };
    }
}
