<?php
namespace App;

/**
 * Class AbstractType
 * @package App
 */
abstract class AbstractType
{
    const MIN_LIMIT = 1;
    const MAX_LIMIT = 8;
    const STEP = 1;
    const HORSE_STEP = 2;

    protected $moves = [];

    /**
     * @param $move
     */
    protected function addMoves($move)
    {
        if ($move !== null) {
            /** @var Grid $move */
            array_push($this->moves, $move->getKey());
        }
    }

    /**
     * @return array
     */
    public function getMoves()
    {
        return $this->moves;
    }

    /**
     * @param ChessBoard $chessBoard
     * @param $inputKey
     * @return mixed
     */
    abstract public function move(ChessBoard $chessBoard, $inputKey);
}
