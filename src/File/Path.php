<?php

namespace Morebec\ValueObjects\File;

use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Path
 */
class Path extends StringBasedValueObject
{
    public function __construct(string $path)
    {
        parent::__construct($path);
    }
}
