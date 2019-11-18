<?php

namespace Morebec\ValueObjects\Text;

use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Represents a Title
 */
class Title extends StringBasedValueObject
{
    public function __construct(string $title)
    {
        parent::__construct($title);
    }
}
