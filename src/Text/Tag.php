<?php

namespace Morebec\ValueObjects\Text;

use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Represents a tag
 */
class Tag extends StringBasedValueObject
{
    public function __construct(string $tag)
    {
        parent::__construct($tag);
    }
}