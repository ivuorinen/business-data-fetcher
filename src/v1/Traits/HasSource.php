<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Traits;

trait HasSource
{
    /**
     * Source of the information.
     *
     * source (integer, optional):
     * - Zero for common,
     * - one for Finnish Patent and Registration Office,
     * - two for Tax Administration or
     * - three for Business Information System
     *
     * Use `getSourceText()` to get the text representation.
     *
     * @see getSourceText()
     *
     * @var int|null
     */
    public ?int $source = null;
    /**
     * @var string|null $sourceText Source of the information.
     */
    public ?string $sourceText = null;

    public function __construct()
    {
        $this->sourceText = $this->source !== null ? $this->getSourceText() : null;
    }

    public function getSourceText(): string
    {
        return match ($this->source) {
            0 => 'common',
            1 => 'Finnish Patent and Registration Office',
            2 => 'Tax Administration',
            3 => 'Business Information System',
            default => '',
        };
    }
}
