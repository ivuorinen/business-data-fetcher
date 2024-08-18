<?php

namespace Ivuorinen\BusinessDataFetcher\Traits;

trait HasVersion
{
    /**
     * One for current version and >1 for historical contact details.
     */
    public int $version = 0;
}
