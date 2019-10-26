<?php

namespace Morebec\ValueObjects\Url;

use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Fragment
 */
class Fragment implements ValueObjectInterface
{
    /** @var string the fragment string containing ? */
    private $fragment;

    function __construct(string $fragmentString)
    {
        Assertion::startsWith($fragmentString, '#');

        if (\preg_match('/^#[?%!$&\'()*+,;=a-zA-Z0-9-._~:@\/]*$/', $fragmentString) === 0) {
            throw new \InvalidArgumentException("Invalid fragment string: $fragmentString");
        }

        $this->fragment = $fragmentString;
    }

    /**
     * Indicates if this value object is equal to abother value object
     * @param  ValueObjectInterface $valueObject othervalue object to compare to
     * @return boolean                           true if equal otherwise false
     */
    public function isEqualTo(ValueObjectInterface $valueObject): bool
    {
        return (string)$this === (string)$valueObject;
    }

    /**
     * Returns a string representation of the value object
     *
     * @return string
     */
    public function __toString()
    {
        return $this->fragment;
    }
}