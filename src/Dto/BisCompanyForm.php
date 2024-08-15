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
     */
    public int $version;

    /**
     * Date of registration
     */
    public string $registrationDate = "";

    /**
     * Ending date of registration
     */
    public ?string $endDate = null;

    /**
     * Name of company form
     */
    public string $name = "";

    /**
     * Two letter language code
     */
    public ?string $language = null;

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
