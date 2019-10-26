<?php

namespace Morebec\ValueObjects\Url;

use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * QueryString
 */
class QueryString implements ValueObjectInterface
{
    /** @var string the query string containing ? */
    private $query;

    function __construct(string $queryString)
    {
        Assertion::startsWith($queryString, '?');

        if (\preg_match('/^\?([\w\.\-[\]~&%+]+(=([\w\.\-~&%+]+)?)?)*$/', $queryString) === 0) {
            throw new \InvalidArgumentException("Invalid query string: $queryString");
        }

        $this->query = $queryString;
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
        return $this->query;
    }

    public function toArray(): array
    {
        throw new \Exception("Unimplemented method");
    }
}