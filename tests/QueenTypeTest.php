<?php

use App\QueenType;
use App\ChessBoard;
use PHPUnit\Framework\TestCase;

class QueenTypeTest extends TestCase
{
    private $chessBoardObject;
    private $queenTypeObject;

    protected function setUp()
    {
        $this->chessBoardObject = new ChessBoard();
        $this->queenTypeObject = new QueenType();
    }

    protected function tearDown()
    {
        unset($this->chessBoardObject);
        unset($this->queenTypeObject);
    }

    function testQueenTypePossibleMoves()
    {
        $possibleMoves = $this->queenTypeObject->move($this->chessBoardObject , 'D4');

        $this->assertEquals(count($possibleMoves) , 27);

        $this->assertContains('D5', $possibleMoves);
        $this->assertContains('D6', $possibleMoves);
        $this->assertContains('D7', $possibleMoves);
        $this->assertContains('D8', $possibleMoves);

        $this->assertContains('D3', $possibleMoves);
        $this->assertContains('D2', $possibleMoves);
        $this->assertContains('D1', $possibleMoves);

        $this->assertContains('C4', $possibleMoves);
        $this->assertContains('B4', $possibleMoves);
        $this->assertContains('A4', $possibleMoves);
        $this->assertContains('E4', $possibleMoves);
        $this->assertContains('F4', $possibleMoves);
        $this->assertContains('G4', $possibleMoves);
        $this->assertContains('H4', $possibleMoves);

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

    function testQueenTypePossibleMovesFromBottomRightPosition()
    {
        $possibleMoves = $this->queenTypeObject->move($this->chessBoardObject , 'H1');

        $this->assertEquals(count($possibleMoves) , 21);
        $validMoves = [
            'H2', 'H3', 'H4', 'H5', 'H6', 'H7', 'H8',
            'A1', 'B1', 'C1', 'D1', 'E1', 'F1', 'G1',
            'A8', 'B7', 'C6', 'D5', 'E4', 'F3', 'G2',
        ];
        $randomValidMove = $validMoves[array_rand($validMoves)];
        $this->assertContains($randomValidMove, $possibleMoves);
    }

    function testQueenypePossibleMovesFromBottomLeftPosition()
    {
        $possibleMoves = $this->queenTypeObject->move($this->chessBoardObject , 'A1');

        $this->assertEquals(count($possibleMoves) , 21);
        $validMoves = [
            'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8',
            'B1', 'C1', 'D1', 'E1', 'F1', 'G1', 'H1',
            'B2', 'C3', 'D4', 'E5', 'F6', 'G7', 'H8'
        ];
        $randomValidMove = $validMoves[array_rand($validMoves)];
        $this->assertContains($randomValidMove, $possibleMoves);
    }

    function testQueenTypePossibleMovesFromTopLeftPosition()
    {
        $possibleMoves = $this->queenTypeObject->move($this->chessBoardObject , 'A8');
        $this->assertEquals(count($possibleMoves) , 21);
        $validMoves = [
            'A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7',
            'B7', 'C6', 'D5', 'E4', 'F3', 'G2', 'H1',
            'B8', 'C8', 'D8', 'E8', 'F8', 'G8', 'H8'
        ];
        $randomValidMove = $validMoves[array_rand($validMoves)];
        $this->assertContains($randomValidMove, $possibleMoves);
    }

    function testQueenTypePossibleMovesFromTopRightPosition()
    {
        $possibleMoves = $this->queenTypeObject->move($this->chessBoardObject , 'H8');
        $this->assertEquals(count($possibleMoves) , 21);
        $validMoves = [
            'H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'H7',
            'A8', 'B8', 'C8', 'D8', 'E8', 'F8', 'G8',
            'A1', 'B2', 'C3', 'D4', 'E5', 'F6', 'G7',
        ];
        $randomValidMove = $validMoves[array_rand($validMoves)];
        $this->assertContains($randomValidMove, $possibleMoves);
    }
}

