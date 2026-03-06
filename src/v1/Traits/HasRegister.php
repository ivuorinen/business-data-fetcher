<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Traits;

trait HasRegister
{
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
