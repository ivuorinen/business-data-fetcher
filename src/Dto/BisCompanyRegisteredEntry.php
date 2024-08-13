<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Exceptions\UnexpectedValueException;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Company Registered Entry
 */
class BisCompanyRegisteredEntry extends DataTransferObject
{
    /**
     * Description of entry
     *
     * @var string
     */
    public string $description;
    /**
     * Zero for common entries, one for ‘Unregistered’ and two for ‘Registered’
     *
     * @see getStatusText()
     *
     * @var int
     */
    public int $status;
    /**
     * Date of registration
     *
     * @var string
     */
    public string $registrationDate;
    /**
     * Ending date of registration
     *
     * @var string|null
     */
    public ?string $endDate;
    /**
     * register (integer):
     * - One for Trade Register,
     * - two for Register of Foundations,
     * - three for Register of Associations,
     * - four for Tax Administration,
     * - five for Prepayment Register,
     * - six for VAT Register,
     * - seven for Employer Register and
     * - eight for register of bodies liable for tax on insurance premiums
     *
     * @see getRegisterText()
     *
     * @var int
     */
    public int $register;
    /**
     * Two letter language code
     *
     * @var string|null
     */
    public ?string $language;
    /**
     * authority (integer):
     * - One for Tax Administration,
     * - two for Finnish Patent and Registration Office and
     * - three for Population Register
     *
     * @see getAuthorityText()
     *
     * @var int
     */
    public int $authority;

    public function getStatusText(): string
    {
        //  Zero for common entries, one for ‘Unregistered’ and two for ‘Registered’
        return match ($this->status) {
            0 => 'Common',
            1 => 'Unregistered',
            2 => 'Registered',
            default => throw new UnexpectedValueException('Unexpected value: ' . $this->status)
        };
    }

    public function getRegisterText(): string
    {
        return match ($this->register) {
            1 => 'Trade Register',
            2 => 'Register of Foundations',
            3 => 'Register of Associations',
            4 => 'Tax Administration',
            5 => 'Prepayment Register',
            6 => 'VAT Register',
            7 => 'Employer Register',
            8 => 'register of bodies liable for tax on insurance premiums',
            default => throw new UnexpectedValueException('Unexpected value: ' . $this->register),
        };
    }

    public function getAuthorityText(): string
    {
        return match ($this->authority) {
            1 => 'Tax Administration',
            2 => 'Finnish Patent and Registration Office',
            3 => 'Population Register',
            default => throw new UnexpectedValueException('Unexpected value: ' . $this->authority),
        };
    }
}
