<?php 

namespace Morebec\ValueObjects\File;

use Morebec\ValueObjects\StringBasedValueObject;

/**
 * File Extension
 */
class Extension extends StringBasedValueObject
{
    function __construct(string $extension)
    {
        parent::__construct($extension);
    }
}