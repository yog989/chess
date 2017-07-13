<?php

use App\RookType;
use App\ChessBoard;
use PHPUnit\Framework\TestCase;

class RookTypeTest extends TestCase
{
    private $chessBoardObject;
    private $rookTypeObject;

    protected function setUp()
    {
        $this->chessBoardObject = new ChessBoard();
        $this->rookTypeObject = new RookType();
    }

    protected function tearDown()
    {
        unset($this->chessBoardObject);
        unset($this->rookTypeObject);
    }

    function testRookTypePossibleMoves()
    {
        $possibleMoves = $this->rookTypeObject->move($this->chessBoardObject , 'D4');

        $this->assertEquals(count($possibleMoves) , 14);
        $this->assertContains('D3', $possibleMoves);
        $this->assertContains('D2', $possibleMoves);
        $this->assertContains('D1', $possibleMoves);
        $this->assertContains('D5', $possibleMoves);
        $this->assertContains('D6', $possibleMoves);
        $this->assertContains('D7', $possibleMoves);
        $this->assertContains('D8', $possibleMoves);
        $this->assertContains('A4', $possibleMoves);
        $this->assertContains('B4', $possibleMoves);
        $this->assertContains('C4', $possibleMoves);
        $this->assertContains('E4', $possibleMoves);
        $this->assertContains('F4', $possibleMoves);
        $this->assertContains('G4', $possibleMoves);
        $this->assertContains('H4', $possibleMoves);
    }

    function testRookTypePossibleMovesFromH1Position()
    {
        $possibleMoves = $this->rookTypeObject->move($this->chessBoardObject , 'H1');

        $this->assertEquals(count($possibleMoves) , 14);
        $this->assertContains('H8', $possibleMoves);
        $this->assertContains('H7', $possibleMoves);
        $this->assertContains('H6', $possibleMoves);
        $this->assertContains('H5', $possibleMoves);
        $this->assertContains('H4', $possibleMoves);
        $this->assertContains('H3', $possibleMoves);
        $this->assertContains('H2', $possibleMoves);
        $this->assertContains('A1', $possibleMoves);
        $this->assertContains('B1', $possibleMoves);
        $this->assertContains('C1', $possibleMoves);
        $this->assertContains('E1', $possibleMoves);
        $this->assertContains('F1', $possibleMoves);
        $this->assertContains('G1', $possibleMoves);
    }
}
