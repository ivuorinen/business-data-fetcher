<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Traits;

/** Provides a human-readable language name from a language code. */
trait HasLanguage
{
    /** Get the language name (e.g. "finnish", "english", "swedish"). */
    public function getLanguageString(): string
    {
        if ($this->language === null) {
            return 'unknown';
        }

        return match ($this->language) {
            'fi' => 'finnish',
            'en' => 'english',
            'sv' => 'swedish',
            default => 'unknown:' . $this->language,
        };
    }
}
