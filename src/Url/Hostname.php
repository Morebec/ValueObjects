<?php

namespace Morebec\ValueObjects\Url;

use Morebec\ValueObjects\StringBasedValueObject;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Hostname
 */
class Hostname extends StringBasedValueObject
{
    public function __construct(string $host)
    {
        if (!filter_var($host, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME)) {
            throw new \InvalidArgumentException("Invalid hostname $host");
        }

        parent::__construct($host);
    }
}
