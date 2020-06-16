<?php

namespace Morebec\ValueObjects\Url;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;
use function parse_url;

/**
 * Url
 */
class Url extends StringBasedValueObject
{
    public function __construct(string $url)
    {
        Assertion::url($url);

        parent::__construct($url);
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

    public function getHostname(): Hostname
    {
        $host = parse_url($this->value, PHP_URL_HOST);
        
        if (!$host) {
            $host = '';
        }
        
        return new Hostname($host);
    }

    public function getQueryString(): ?QueryString
    {
        $queryString = parse_url($this->value, PHP_URL_QUERY);
        return $queryString ? new QueryString("?$queryString") : null;
    }

    public function getFragment(): ?Fragment
    {
        $fragment  = parse_url($this->value, PHP_URL_FRAGMENT);
        return $fragment ? new Fragment("#$fragment") : null;
    }

    public function getUsername(): string
    {
        $user = parse_url($this->value, PHP_URL_USER);
        return $user ? $user : '';
    }

    public function getPassword(): string
    {
        $password = parse_url($this->value, PHP_URL_PASS);
        return $password ? $password : '';
    }

    public function getPortNumber(): ?PortNumber
    {
        $port = parse_url($this->value, PHP_URL_PORT);

        return $port ? new PortNumber($port) : null;
    }
}
