<?php

use App\ChessBoard;
use PHPUnit\Framework\TestCase;

class ChessBoardTest extends TestCase
{
    private $chessBoardObject;

    protected function setUp()
    {
        $this->chessBoardObject = new ChessBoard();
    }

    protected function tearDown()
    {
        unset($this->chessBoardObject);
    }

    function testGridUsingInputKeyForKey()
    {
        $grid = $this->chessBoardObject->getGridUsingInputKey('D5');
        $this->assertEquals($grid->getX() , '4');
        $this->assertEquals($grid->getY() , '5');
    }

    function testGridUsingCoordinates()
    {
        $grid = $this->chessBoardObject->getGridUsingCoordinates(4, 5);
        $this->assertEquals($grid->getKey() , 'D5');
    }

    function testMoveHorizontallyLeft()
    {
        $grid = $this->chessBoardObject->moveHorizontallyLeft('D4', 1);
        $this->assertEquals($grid->getKey() , 'C4');
    }

    function testMoveHorizontallyRight()
    {
        $grid = $this->chessBoardObject->moveHorizontallyRight('D4', 1);
        $this->assertEquals($grid->getKey() , 'E4');
    }

    function testMoveVerticallyUp()
    {
        $grid = $this->chessBoardObject->moveVerticallyUp('D4', 1);
        $this->assertEquals($grid->getKey() , 'D5');
    }

    function testMoveVerticallyDown()
    {
        $grid = $this->chessBoardObject->moveVerticallyDown('D4', 1);
        $this->assertEquals($grid->getKey() , 'D3');
    }

    function testMoveDiagonallyVerticalTopRight()
    {
        $grid = $this->chessBoardObject->moveDiagonallyVerticalTopRight('D4', 1);
        $this->assertEquals($grid->getKey() , 'E5');
    }

    function testMoveDiagonallyVerticalTopLeft()
    {
        $grid = $this->chessBoardObject->moveDiagonallyVerticalTopLeft('D4', 1);
        $this->assertEquals($grid->getKey() , 'C5');
    }

    function testMoveDiagonallyVerticalBottomRight()
    {
        $grid = $this->chessBoardObject->moveDiagonallyVerticalBottomRight('D4', 1);
        $this->assertEquals($grid->getKey() , 'E3');
    }

    function testMoveDiagonallyVerticalBottomLeft()
    {
        $grid = $this->chessBoardObject->moveDiagonallyVerticalBottomLeft('D4', 1);
        $this->assertEquals($grid->getKey() , 'C3');
    }
}
