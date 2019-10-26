<?php

use Morebec\ValueObjects\Url\Fragment;

/**
 * FragmentTest
 */
class FragmentTest extends \Codeception\Test\Unit
{
    
    public function testBlankQeryStringThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $qs = new Fragment('');
    }

    public function testQeryStringNotStartingWithHashTagThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $qs = new Fragment('anchor');
    }

    public function testValidFragmentDoesNotThrowException($value='')
    {
        $qs = new Fragment('#anchor');
    }

    public function testEqulityWithString()
    {
        $hostname = new Fragment('#anchor');
        $this->assertEquals('#anchor', $hostname);
    }

    public function testInequlityWithString()
    {
        $hostname = new Fragment('#anchor');
        $this->assertNotEquals('?param2=value2', $hostname);
    }

    public function testEqulityWithValueObject()
    {
        $this->assertEquals(new Fragment('#anchor'), new Fragment('#anchor'));
    }

    public function testInequlityWithValueObject()
    {
        $this->assertNotEquals(new Fragment('#anchor'), new Fragment('#anchor2'));
    }    
}    