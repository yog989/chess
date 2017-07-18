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
     * @return array
     */
    public function move(ChessBoard $chessBoard, $inputKey)
    {
        // Vertically Up
        $grid = $chessBoard->moveVerticallyUp($inputKey, self::HORSE_STEP);
        if ($grid !== null) {
            $this->addLeftAndRightPositions($chessBoard, $grid);
        }

        // Vertically Down
        $grid = $chessBoard->moveVerticallyDown($inputKey, self::HORSE_STEP);
        if ($grid !== null) {
            $this->addLeftAndRightPositions($chessBoard, $grid);
        }

        // Horizontally Left
        $grid = $chessBoard->moveHorizontallyLeft($inputKey, self::HORSE_STEP);
        if ($grid !== null) {
              $this->addUpAndDownPositions($chessBoard, $grid);
        }

        // Horizontally Right
        $grid = $chessBoard->moveHorizontallyRight($inputKey, self::HORSE_STEP);
        if ($grid !== null) {
              $this->addUpAndDownPositions($chessBoard, $grid);
        }
        return $this->getMoves();
    }

    private function addLeftAndRightPositions(ChessBoard $chessBoard, $grid)
    {
        /** @var Grid $grid */
        $move = $chessBoard->moveHorizontallyLeft($grid->getKey(), self::STEP);
        $this->addMoves($move);

        $move = $chessBoard->moveHorizontallyRight($grid->getKey(), self::STEP);
        $this->addMoves($move);
    }

    private function addUpAndDownPositions(ChessBoard $chessBoard, $grid)
    {
        /** @var Grid $grid */
        $move = $chessBoard->moveVerticallyUp($grid->getKey(), self::STEP);
        $this->addMoves($move);

        $move = $chessBoard->moveVerticallyDown($grid->getKey(), self::STEP);
        $this->addMoves($move);
    }
}
