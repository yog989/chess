<?php
namespace App;

/**
 * Class AbstractType
 * @package App
 */
abstract class AbstractType implements Type
{
    const MIN_COL = 1;
    const MIN_ROW = 1;
    const MAX_COL = 8;
    const MAX_ROW = 8;
    const STEP = 1;

    protected $moves = [];

    /**
     * @param $move
     */
    protected function addMoves($move)
    {
        if (!is_null($move)) {
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
}