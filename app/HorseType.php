<?php
namespace App;

/**
 * Class HorseType
 * @package App
 */
class HorseType extends AbstractType
{
    /**
     * @param ChessBoard $chessBoard
     * @param $inputKey
     */
    public function move(ChessBoard $chessBoard, $inputKey)
    {
        // Vertically Up
        $grid = $chessBoard->moveVerticallyUp($inputKey, self::HORSE_STEP);
        if (!is_null($grid)) {
            $move = $chessBoard->moveHorizontallyLeft($grid->getKey(), self::STEP);
            $this->addMoves($move);

            $move = $chessBoard->moveHorizontallyRight($grid->getKey(), self::STEP);
            $this->addMoves($move);
        }

        // Vertically Down
        $grid = $chessBoard->moveVerticallyDown($inputKey, self::HORSE_STEP);
        if (!is_null($grid)) {
            $move = $chessBoard->moveHorizontallyLeft($grid->getKey(), self::STEP);
            $this->addMoves($move);

            $move = $chessBoard->moveHorizontallyRight($grid->getKey(), self::STEP);
            $this->addMoves($move);
        }

        // Horizontally Left
        $grid = $chessBoard->moveHorizontallyLeft($inputKey, self::HORSE_STEP);
        if (!is_null($grid)) {
            $move = $chessBoard->moveVerticallyUp($grid->getKey(), self::STEP);
            $this->addMoves($move);

            $move = $chessBoard->moveVerticallyDown($grid->getKey(), self::STEP);
            $this->addMoves($move);
        }

        // Horizontally Right
        $grid = $chessBoard->moveHorizontallyRight($inputKey, self::HORSE_STEP);
        if (!is_null($grid)) {
            $move = $chessBoard->moveVerticallyUp($grid->getKey(), self::STEP);
            $this->addMoves($move);

            $move = $chessBoard->moveVerticallyDown($grid->getKey(), self::STEP);
            $this->addMoves($move);
        }
        return $this->getMoves();
    }
}
