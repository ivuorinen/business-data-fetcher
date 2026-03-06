<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Traits;

trait HasLanguage
{
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
