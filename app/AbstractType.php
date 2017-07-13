<?php
namespace App;

/**
 * Class AbstractType
 * @package App
 */
abstract class AbstractType implements Type
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