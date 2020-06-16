<?php

namespace Morebec\ValueObjects\Url;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * Fragment
 */
class Fragment extends StringBasedValueObject
{
    public function __construct(string $fragmentString)
    {
        Assertion::startsWith($fragmentString, '#');

        if (\preg_match('/^#[?%!$&\'()*+,;=a-zA-Z0-9-._~:@\/]*$/', $fragmentString) === 0) {
            throw new \InvalidArgumentException("Invalid fragment string: $fragmentString");
        }

        parent::__construct($fragmentString);
    }

    /**
     * Constructs an instance of this value object from a string value
     * @param string $value
     * @return static
     */
    public static function fromString(string $value): self
    {
        return new static($value);
    }
}
