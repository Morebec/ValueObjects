<?php 

namespace Morebec\ValueObjects\File;

use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Path
 */
class Path extends StringBasedValueObject
{
    function __construct(string $path)
    {
        parent::__construct($path);
    }
}