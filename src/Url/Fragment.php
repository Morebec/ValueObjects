<?php

namespace Morebec\ValueObjects\Url;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Fragment
 */
class Fragment extends StringBasedValueObject
{
    function __construct(string $fragmentString)
    {
        Assertion::startsWith($fragmentString, '#');

        if (\preg_match('/^#[?%!$&\'()*+,;=a-zA-Z0-9-._~:@\/]*$/', $fragmentString) === 0) {
            throw new \InvalidArgumentException("Invalid fragment string: $fragmentString");
        }

        parent::__construct($fragmentString);
    }
}