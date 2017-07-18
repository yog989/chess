<?php
namespace App;

/**
 * Class KingType
 * @package App
 */
class KingType extends AbstractType
{
    /**
     * @param ChessBoard $chessBoard
     * @param $inputKey
     * @return array
     */
    public function move(ChessBoard $chessBoard, $inputKey)
    {
        /** @var Grid $move */
        $move = $chessBoard->moveHorizontallyRight($inputKey, self::STEP);
        $this->addMoves($move);
        $move = $chessBoard->moveHorizontallyLeft($inputKey, self::STEP);
        $this->addMoves($move);
        $move = $chessBoard->moveVerticallyUp($inputKey, self::STEP);
        $this->addMoves($move);
        $move = $chessBoard->moveVerticallyDown($inputKey, self::STEP);
        $this->addMoves($move);
        $move = $chessBoard->moveDiagonallyVerticalTopRight($inputKey, self::STEP);
        $this->addMoves($move);
        $move = $chessBoard->moveDiagonallyVerticalTopLeft($inputKey, self::STEP);
        $this->addMoves($move);
        $move = $chessBoard->moveDiagonallyVerticalBottomRight($inputKey, self::STEP);
        $this->addMoves($move);
        $move = $chessBoard->moveDiagonallyVerticalBottomLeft($inputKey, self::STEP);
        $this->addMoves($move);
        return $this->getMoves();
    }
}
