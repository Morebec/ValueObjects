<?php

namespace Morebec\ValueObjects\Url;

use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Port
 */
class PortNumber implements ValueObjectInterface
{
    /** Minimum port number */
    const MIN_PORT_NUMBER = 0;

    /** Maximum port number */
    const MAX_PORT_NUMBER = 65535;
    /** @var string the url string containing ? */
    private $port;

    function __construct(int $port)
    {
        Assertion::between($port, self::MIN_PORT_NUMBER, self::MAX_PORT_NUMBER);

        $this->port = $port;
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
     * Returns the port number as an integer
     * @return int
     */
    public function toInteger(): int
    {
        return $this->port;
    }

    /**
     * Returns a string representation of the value object
     *
     * @return string
     */
    public function __toString()
    {
        return strval($this->port);
    }
}