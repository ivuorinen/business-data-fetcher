<?php

namespace Ivuorinen\BusinessDataFetcher\Dto;

use Ivuorinen\BusinessDataFetcher\Traits\HasSource;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Company Form
 */
class BisCompanyForm extends DataTransferObject
{
    use HasSource;

    /**
     * One for current version and >1 for historical company forms
     *
     * @var int
     */
    public int $version;
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
     * Name of company form
     *
     * @var string
     */
    public string $name;
    /**
     * Two letter language code
     *
     * @var string|null
     */
    public ?string $language;
    /**
     * Type of company form.
     *
     * Note: According to spec, this shouldn't be nullable,
     * but payloads show otherwise.
     *
     * @var string|null
     */
    public ?string $type;
}
