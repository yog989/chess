<?php

use App\HorseType;
use App\ChessBoard;
use PHPUnit\Framework\TestCase;

class HorseTypeTest extends TestCase
{
    private $chessBoardObject;
    private $horseTypeObject;

    protected function setUp()
    {
        $this->chessBoardObject = new ChessBoard();
        $this->horseTypeObject = new HorseType();
    }

    protected function tearDown()
    {
        unset($this->chessBoardObject);
        unset($this->horseTypeObject);
    }

    function testHorseTypePossibleMoves()
    {
        $possibleMoves = $this->horseTypeObject->move($this->chessBoardObject , 'D4');

        $this->assertEquals(count($possibleMoves) , 8);
        $this->assertContains('C6', $possibleMoves);
        $this->assertContains('E6', $possibleMoves);
        $this->assertContains('C2', $possibleMoves);
        $this->assertContains('E2', $possibleMoves);
        $this->assertContains('B5', $possibleMoves);
        $this->assertContains('B3', $possibleMoves);
        $this->assertContains('F5', $possibleMoves);
        $this->assertContains('F3', $possibleMoves);
    }

    function testHorseTypePossibleMovesFromBottomRightPosition()
    {
        $possibleMoves = $this->horseTypeObject->move($this->chessBoardObject , 'H1');

        $this->assertEquals(count($possibleMoves) , 2);
        $this->assertContains('F2', $possibleMoves);
        $this->assertContains('G3', $possibleMoves);
    }

    function testHorseTypePossibleMovesFromBottomLeftPosition()
    {
        $possibleMoves = $this->horseTypeObject->move($this->chessBoardObject , 'A1');

        $this->assertEquals(count($possibleMoves) , 2);
        $this->assertContains('C2', $possibleMoves);
        $this->assertContains('B3', $possibleMoves);
    }

    function testHorseTypePossibleMovesFromTopLeftPosition()
    {
        $possibleMoves = $this->horseTypeObject->move($this->chessBoardObject , 'A8');

        $this->assertEquals(count($possibleMoves) , 2);
        $this->assertContains('C7', $possibleMoves);
        $this->assertContains('B6', $possibleMoves);
    }

    function testHorseTypePossibleMovesFromTopRightPosition()
    {
        $possibleMoves = $this->horseTypeObject->move($this->chessBoardObject , 'H8');

        $this->assertEquals(count($possibleMoves) , 2);
        $this->assertContains('F7', $possibleMoves);
        $this->assertContains('G6', $possibleMoves);
    }
}
