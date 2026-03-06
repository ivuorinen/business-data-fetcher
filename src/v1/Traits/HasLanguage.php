<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Traits;

trait HasLanguage
{
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
