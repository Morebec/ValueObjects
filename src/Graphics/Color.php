<?php

namespace Morebec\ValueObjects\Graphics;

use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Color object of the form RGBA
 */
class Color implements ValueObjectInterface
{
    /** @var int red channel */
    private $r;

    /** @var int green channel */
    private $g;

    /** @var int blue channel */
    private $b;

    /** @var int alpha chanel */
    private $a;

    /**
     * Creates a new color instance from a hex string of the form #RRGGBB
     * @param  string $hex hex string
     * @return Color      corresponding color object
     */
    public static function fromHex(string $hex): Color
    {
        Assertion::startsWith($hex, '#', "Invalid hex color code '$hex': Must start with '#' character.");
        $hex = str_replace('#', '', $hex);

        // Make sure it is either #RRGGBB or #RRGGBBAA
        $codeLenth = strlen($hex);
        if ($codeLenth === 6) {
            $hex = $hex . 'FF';
        }

        Assertion::length(
            $hex,
            8,
            "Invalid hex color code '#$hex': Must be of the form #RRGGBB or #RRGGBBAA."
        );

        list($r, $g, $b, $a) = array_map('hexdec', str_split($hex, 2));

        return new Color($r, $g, $b, $a);
    }

    public function __construct(int $r = 0, int $g = 0, int $b = 0, int $a = 255)
    {
        Assertion::between($r, 0, 255, 'The "red" channel must be between 0-255');
        Assertion::between($g, 0, 255, 'The "green" channel must be between 0-255');
        Assertion::between($b, 0, 255, 'The "blue" channel must be between 0-255');
        Assertion::between($a, 0, 255, 'The "alpha" channel must be between 0-255');

        $this->r = $r;
        $this->g = $g;
        $this->b = $b;
        $this->a = $a;
    }

    /**
     * Returns a hex string of the form #RRGGBB
     * @return string
     */
    public function toHex(): string
    {
        return strtoupper(sprintf(
            '#%s%s%s%s',
            dechex($this->r),
            dechex($this->g),
            dechex($this->b),
            dechex($this->a)
        ));
    }

    /**
     * @return int
     */
    public function getR(): int
    {
        return $this->red;
    }

    /**
     * @return int
     */
    public function getG(): int
    {
        return $this->green;
    }

    /**
     * @return int
     */
    public function getB(): int
    {
        return $this->blue;
    }

    /**
     * @return int
     */
    public function getA(): int
    {
        return $this->a;
    }

    public function __toString()
    {
        return $this->toHex();
    }

    /**
     * Indicates if this value object is equal to abother value object
     * @param  ValueObjectInterface $valueObject othervalue object to compare to
     * @return boolean                           true if equal otherwise false
     */
    public function isEqualTo(ValueObjectInterface $valueObject): bool
    {
        return ((string)$this) == ((string)$valueObject);
    }
}
