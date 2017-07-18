<?php

use App\Grid;
use PHPUnit\Framework\TestCase;

class GridTest extends TestCase
{
    private $gridObject;

    protected function setUp()
    {
        $this->gridObject = new Grid('D5' , 5, 8);
    }

    protected function tearDown()
    {
        unset($this->gridObject);
    }

    function testForKey()
    {
        $this->assertEquals($this->gridObject->getKey() , 'D5');
    }

    function testForPositionX()
    {
        $this->assertEquals($this->gridObject->getX() , 5);
    }

    function testForPositionY()
    {
        $this->assertEquals($this->gridObject->getY() , 8);
    }
}
