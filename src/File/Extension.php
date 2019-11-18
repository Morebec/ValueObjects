<?php

namespace Morebec\ValueObjects\File;

use Morebec\ValueObjects\StringBasedValueObject;

/**
 * File Extension
 */
class Extension extends StringBasedValueObject
{
    public function __construct(string $extension)
    {
        parent::__construct($extension);
    }
}
