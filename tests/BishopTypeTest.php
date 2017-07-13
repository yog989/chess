<?php

use App\BishopType;
use App\ChessBoard;
use PHPUnit\Framework\TestCase;

class BishopTypeTest extends TestCase
{
    private $chessBoardObject;
    private $bishopTypeObject;

    protected function setUp()
    {
        $this->chessBoardObject = new ChessBoard();
        $this->bishopTypeObject = new BishopType();
    }

    protected function tearDown()
    {
        unset($this->chessBoardObject);
        unset($this->bishopTypeObject);
    }

    function testBishopTypePossibleMoves()
    {
        $possibleMoves = $this->bishopTypeObject->move($this->chessBoardObject , 'D4');

        $this->assertEquals(count($possibleMoves) , 13);
        $this->assertContains('E5', $possibleMoves);
        $this->assertContains('F6', $possibleMoves);
        $this->assertContains('G7', $possibleMoves);
        $this->assertContains('H8', $possibleMoves);

        $this->assertContains('C5', $possibleMoves);
        $this->assertContains('B6', $possibleMoves);
        $this->assertContains('A7', $possibleMoves);

        $this->assertContains('E3', $possibleMoves);
        $this->assertContains('F2', $possibleMoves);
        $this->assertContains('G1', $possibleMoves);

        $this->assertContains('C3', $possibleMoves);
        $this->assertContains('B2', $possibleMoves);
        $this->assertContains('A1', $possibleMoves);
    }

    function testBishopTypePossibleMovesFromBottomRightPosition()
    {
        $possibleMoves = $this->bishopTypeObject->move($this->chessBoardObject , 'H1');

        $this->assertEquals(count($possibleMoves) , 7);
        $this->assertContains('G2', $possibleMoves);
        $this->assertContains('F3', $possibleMoves);
        $this->assertContains('E4', $possibleMoves);
        $this->assertContains('D5', $possibleMoves);
        $this->assertContains('C6', $possibleMoves);
        $this->assertContains('B7', $possibleMoves);
        $this->assertContains('A8', $possibleMoves);

    }

    function testBishopTypePossibleMovesFromBottomLeftPosition()
    {
        $possibleMoves = $this->bishopTypeObject->move($this->chessBoardObject , 'A1');

        $this->assertEquals(count($possibleMoves) , 7);
        $this->assertContains('H8', $possibleMoves);
        $this->assertContains('G7', $possibleMoves);
        $this->assertContains('F6', $possibleMoves);
        $this->assertContains('E5', $possibleMoves);
        $this->assertContains('D4', $possibleMoves);
        $this->assertContains('C3', $possibleMoves);
        $this->assertContains('B2', $possibleMoves);
    }

    function testBishopTypePossibleMovesFromTopLeftPosition()
    {
        $possibleMoves = $this->bishopTypeObject->move($this->chessBoardObject , 'A8');

        $this->assertEquals(count($possibleMoves) , 7);
        $this->assertContains('H1', $possibleMoves);
        $this->assertContains('G2', $possibleMoves);
        $this->assertContains('F3', $possibleMoves);
        $this->assertContains('E4', $possibleMoves);
        $this->assertContains('D5', $possibleMoves);
        $this->assertContains('C6', $possibleMoves);
        $this->assertContains('B7', $possibleMoves);
    }

    function testBishopTypePossibleMovesFromTopRightPosition()
    {
        $possibleMoves = $this->bishopTypeObject->move($this->chessBoardObject , 'H8');

        $this->assertEquals(count($possibleMoves) , 7);
        $this->assertContains('G7', $possibleMoves);
        $this->assertContains('F6', $possibleMoves);
        $this->assertContains('E5', $possibleMoves);
        $this->assertContains('D4', $possibleMoves);
        $this->assertContains('C3', $possibleMoves);
        $this->assertContains('B2', $possibleMoves);
        $this->assertContains('A1', $possibleMoves);
    }
}
