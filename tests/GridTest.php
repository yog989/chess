<?php

use App\Grid;
use PHPUnit\Framework\TestCase;

class GridTest extends TestCase
{
    private $gridObject;

    protected function setUp()
    {
        $this->gridObject = new Grid('D5' , 1, 1);
    }

    protected function tearDown()
    {
        unset($this->gridObject);
    }

    function testForKey()
    {
        $this->gridObject->setKey('D5');
        $this->assertEquals($this->gridObject->getKey() , 'D5');
    }

    function testForPositionX()
    {
        $this->gridObject->setX(5);
        $this->assertEquals($this->gridObject->getX() , 5);
    }

    function testForPositionY()
    {
        $this->gridObject->setY(8);
        $this->assertEquals($this->gridObject->getY() , 8);
    }
}
