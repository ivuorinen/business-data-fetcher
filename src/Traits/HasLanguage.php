<?php

namespace Ivuorinen\BusinessDataFetcher\Traits;

trait HasLanguage
{
    /**
     * @see getLanguageString()
     * @var string|null $language Two letter language code
     *                            (e.g. 'fi', 'sv', 'en')
     */
    public ?string $language;

    /**
     * Get the language code as a string.
     */
    public function getLanguageString(): string
    {
        return match ($this->language) {
            'fi' => 'finnish',
            'en' => 'english',
            'sv' => 'swedish',
            default => 'unknown:' . $this->language,
        };
    }
}
