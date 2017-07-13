<?php
namespace App;

/**
 * Class QueenType
 * @package App
 */
class QueenType extends AbstractType
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

        // Diagonally Vertical Top Right
        $grid = $chessBoard->getGridUsingInputKey($inputKey);
        $posX = $grid->getX();
        $posY = $grid->getY();

        while ($posX < self::MAX_LIMIT && $posY < self::MAX_LIMIT) {
            $move = $chessBoard->moveDiagonallyVerticalTopRight($grid->getKey(), self::STEP);
            $this->addMoves($move);
            $grid = $chessBoard->getGridUsingCoordinates($posX + 1, $posY + 1);
            $posY++;
            $posX++;
        }

        // Diagonally Vertical Top Left
        $grid = $chessBoard->getGridUsingInputKey($inputKey);
        $posX = $grid->getX();
        $posY = $grid->getY();

        while ($posX > self::MIN_LIMIT && $posY < self::MAX_LIMIT) {
            $move = $chessBoard->moveDiagonallyVerticalTopLeft($grid->getKey(), self::STEP);
            $this->addMoves($move);
            $grid = $chessBoard->getGridUsingCoordinates($posX - 1, $posY + 1);
            $posX--;
            $posY++;
        }


        // Diagonally Vertical Bottom Right
        $grid = $chessBoard->getGridUsingInputKey($inputKey);
        $posX = $grid->getX();
        $posY = $grid->getY();

        while ($posX < self::MAX_LIMIT && $posY > self::MIN_LIMIT) {
            $move = $chessBoard->moveDiagonallyVerticalBottomRight($grid->getKey(), self::STEP);
            $this->addMoves($move);
            $grid = $chessBoard->getGridUsingCoordinates($posX + 1, $posY - 1);
            $posX++;
            $posY--;
        }

        // Diagonally Vertical Bottom Left
        $grid = $chessBoard->getGridUsingInputKey($inputKey);
        $posX = $grid->getX();
        $posY = $grid->getY();

        while ($posX > self::MIN_LIMIT && $posY > self::MIN_LIMIT) {
            $move = $chessBoard->moveDiagonallyVerticalBottomLeft($grid->getKey(), self::STEP);
            $this->addMoves($move);
            $grid = $chessBoard->getGridUsingCoordinates($posX - 1, $posY - 1);
            $posX--;
            $posY--;
        }

        return $this->getMoves();
    }

}
