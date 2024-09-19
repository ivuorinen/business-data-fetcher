<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Traits;

trait HasVersion
{
    /**
     * One for current version and >1 for historical contact details.
     */
    public int $version = 0;
}
