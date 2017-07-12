<?php

use App\KingType;
use App\ChessBoard;
use PHPUnit\Framework\TestCase;

class KingTypeTest extends TestCase
{
    private $chessBoardObject;
    private $kingTypeObject;

    protected function setUp()
    {
        $this->chessBoardObject = new ChessBoard();
        $this->kingTypeObject = new KingType();
    }

    protected function tearDown()
    {
        unset($this->chessBoardObject);
        unset($this->kingTypeObject);
    }

    function testKingTypePossibleMoves()
    {
        $possibleMoves = $this->kingTypeObject->move($this->chessBoardObject , 'D4');

        $this->assertEquals(count($possibleMoves) , 8);
        $this->assertContains('C3', $possibleMoves);
        $this->assertContains('D3', $possibleMoves);
        $this->assertContains('E3', $possibleMoves);
        $this->assertContains('C4', $possibleMoves);
        $this->assertContains('E4', $possibleMoves);
        $this->assertContains('C5', $possibleMoves);
        $this->assertContains('D5', $possibleMoves);
        $this->assertContains('E5', $possibleMoves);
    }
}
