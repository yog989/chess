<?php
namespace App;

/**
 * Class PawnType
 * @package App
 */
class PawnType extends AbstractType
{
    /**
     * @param ChessBoard $chessBoard
     * @param $inputKey
     * @return array
     */
    public function move(ChessBoard $chessBoard, $inputKey)
    {
        /** @var Grid $move */
        $move = $chessBoard->moveVerticallyUp($inputKey, self::STEP);
        $this->addMoves($move);
        return $this->getMoves();
    }
}
