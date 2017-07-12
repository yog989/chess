<?php

use App\PawnType;
use App\ChessBoard;
use PHPUnit\Framework\TestCase;

class PawnTypeTest extends TestCase
{
    private $chessBoardObject;
    private $pawnTypeObject;

    protected function setUp()
    {
        $this->chessBoardObject = new ChessBoard();
        $this->pawnTypeObject = new PawnType();
    }

    protected function tearDown()
    {
        unset($this->chessBoardObject);
        unset($this->pawnTypeObject);
    }

    function testPawnPossibleMoves()
    {
        $possibleMoves = $this->pawnTypeObject->move($this->chessBoardObject , 'D4');

        $this->assertEquals(count($possibleMoves) , 1);
        $this->assertEquals($possibleMoves , ['D5']);
    }
}
