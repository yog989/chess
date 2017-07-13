<?php
namespace App;

/**
 * Class RookType
 * @package App
 */
class RookType extends AbstractType
{
    /**
     * @param ChessBoard $chessBoard
     * @param $inputKey
     */
    public function move(ChessBoard $chessBoard, $inputKey)
    {
        // Vertically Up
        $grid = $chessBoard->getGridUsingInputKey($inputKey);
        $posY = $grid->getY();

        while ($posY < self::MAX_LIMIT) {
            $move = $chessBoard->moveVerticallyUp($grid->getKey(), self::STEP);
            $this->addMoves($move);
            $grid = $chessBoard->getGridUsingCoordinates($grid->getX(), $posY + 1);
            $posY++;
        }

        // Vertically Down
        $grid = $chessBoard->getGridUsingInputKey($inputKey);
        $posY = $grid->getY();

        while ($posY > self::MIN_LIMIT) {
            $move = $chessBoard->moveVerticallyDown($grid->getKey(), self::STEP);
            $this->addMoves($move);
            $grid = $chessBoard->getGridUsingCoordinates($grid->getX(), $posY - 1);
            $posY--;
        }

        // Horizontally Left
        $grid = $chessBoard->getGridUsingInputKey($inputKey);
        $posX = $grid->getX();

        while ($posX > self::MIN_LIMIT) {
            $move = $chessBoard->moveHorizontallyLeft($grid->getKey(), self::STEP);
            $this->addMoves($move);
            $grid = $chessBoard->getGridUsingCoordinates($posX - 1, $grid->getY());
            $posX--;
        }

        // Horizontally Right
        $grid = $chessBoard->getGridUsingInputKey($inputKey);
        $posX = $grid->getX();

        while ($posX < self::MAX_LIMIT) {
            $move = $chessBoard->moveHorizontallyRight($grid->getKey(), self::STEP);
            $this->addMoves($move);
            $grid = $chessBoard->getGridUsingCoordinates($posX + 1, $grid->getY());
            $posX++;
        }

        return $this->getMoves();
    }

}
