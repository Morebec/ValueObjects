<?php 

namespace Morebec\ValueObjects\File;

use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Conetent of a file
 */
class FileContent extends StringBasedValueObject
{
    function __construct(string $content)
    {
        parent::__construct($content);
    }
}