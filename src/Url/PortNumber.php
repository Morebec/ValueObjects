<?php

namespace Morebec\ValueObjects\Url;

use Assert\Assertion;
use Morebec\ValueObjects\IntBasedValueObject;

/**
 * Port
 */
class PortNumber extends IntBasedValueObject
{
    /** Minimum port number */
    const MIN_PORT_NUMBER = 0;

    /** Maximum port number */
    const MAX_PORT_NUMBER = 65535;

    public function __construct(int $port)
    {
        Assertion::between($port, self::MIN_PORT_NUMBER, self::MAX_PORT_NUMBER);
        parent::__construct($port);
    }
}
