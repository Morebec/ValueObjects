<?php

namespace Morebec\ValueObjects\Url;

use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Hostname
 */
class Hostname implements ValueObjectInterface
{
    /** @var string the url string containing ? */
    private $host;

    function __construct(string $host)
    {
        if(!filter_var($host, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME)) {
            throw new \InvalidArgumentException("Invalid hostname $host");
        }

        $this->host = $host;
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
        return $this->host;
    }
}