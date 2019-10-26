<?php

use Morebec\ValueObjects\Url\QueryString;

/**
 * QueryString Test
 */
class QueryStringTest extends \Codeception\Test\Unit 
{
    public function testBlankQeryStringThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $qs = new QueryString('');
    }

    public function testQeryStringNotStartingWithQuestionMarkThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $qs = new QueryString('param=value');
    }

    public function testValidQueryStringDoesNotThrowException($value='')
    {
        $qs = new QueryString('?param=value');
    }

    public function testEqulityWithString()
    {
        $hostname = new QueryString('?param=value');
        $this->assertEquals('?param=value', $hostname);
    }

    public function testInequlityWithString()
    {
        $hostname = new QueryString('?param=value');
        $this->assertNotEquals('?param2=value2', $hostname);
    }

    public function testEqulityWithValueObject()
    {
        $this->assertEquals(new QueryString('?param=value'), new QueryString('?param=value'));
    }

    public function testInequlityWithValueObject()
    {
        $this->assertNotEquals(new QueryString('?param=value'), new QueryString('?param2=value2'));
    }
}
