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
     * @return array
     */
    public function move(ChessBoard $chessBoard, $inputKey)
    {
        // Vertically Up
        $this->addVerticallyUpMoves($chessBoard, $inputKey);

        // Vertically Down
        $this->addVerticallyDownMoves($chessBoard, $inputKey);

        // Horizontally Left
        $this->addHorizontallyLeftMoves($chessBoard, $inputKey);

        // Horizontally Right
        $this->addHorizontallyRightMoves($chessBoard, $inputKey);

        // Diagonally Vertical Top Right
        $this->addDiagonallyVerticalTopRightMoves($chessBoard, $inputKey);

        // Diagonally Vertical Top Left
        $this->addDiagonallyVerticalTopLeftMoves($chessBoard, $inputKey);

        // Diagonally Vertical Bottom Right
        $this->addDiagonallyVerticalBottomRightMoves($chessBoard, $inputKey);

        // Diagonally Vertical Bottom Left
        $this->addDiagonallyVerticalBottomLeftMoves($chessBoard, $inputKey);

        return $this->getMoves();
    }

    /**
     * @param ChessBoard $chessBoard
     * @param $inputKey
     */
    private function addVerticallyUpMoves(ChessBoard $chessBoard, $inputKey)
    {
        $grid = $chessBoard->getGridUsingInputKey($inputKey);
        $posY = $grid->getY();

        while ($posY < self::MAX_LIMIT) {
            $move = $chessBoard->moveVerticallyUp($grid->getKey(), self::STEP);
            $this->addMoves($move);
            $grid = $chessBoard->getGridUsingCoordinates($grid->getX(), $posY + 1);
            $posY++;
        }
    }

    /**
     * @param ChessBoard $chessBoard
     * @param $inputKey
     */
    private function addVerticallyDownMoves(ChessBoard $chessBoard, $inputKey)
    {
        $grid = $chessBoard->getGridUsingInputKey($inputKey);
        $posY = $grid->getY();

        while ($posY > self::MIN_LIMIT) {
            $move = $chessBoard->moveVerticallyDown($grid->getKey(), self::STEP);
            $this->addMoves($move);
            $grid = $chessBoard->getGridUsingCoordinates($grid->getX(), $posY - 1);
            $posY--;
        }
    }

    /**
     * @param ChessBoard $chessBoard
     * @param $inputKey
     */
    private function addHorizontallyLeftMoves(ChessBoard $chessBoard, $inputKey)
    {
        $grid = $chessBoard->getGridUsingInputKey($inputKey);
        $posX = $grid->getX();

        while ($posX > self::MIN_LIMIT) {
            $move = $chessBoard->moveHorizontallyLeft($grid->getKey(), self::STEP);
            $this->addMoves($move);
            $grid = $chessBoard->getGridUsingCoordinates($posX - 1, $grid->getY());
            $posX--;
        }
    }

    /**
     * @param ChessBoard $chessBoard
     * @param $inputKey
     */
    private function addHorizontallyRightMoves(ChessBoard $chessBoard, $inputKey)
    {
        $grid = $chessBoard->getGridUsingInputKey($inputKey);
        $posX = $grid->getX();

        while ($posX < self::MAX_LIMIT) {
            $move = $chessBoard->moveHorizontallyRight($grid->getKey(), self::STEP);
            $this->addMoves($move);
            $grid = $chessBoard->getGridUsingCoordinates($posX + 1, $grid->getY());
            $posX++;
        }
    }

    /**
     * @param ChessBoard $chessBoard
     * @param $inputKey
     */
    private function addDiagonallyVerticalTopRightMoves(ChessBoard $chessBoard, $inputKey)
    {
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
    }

    /**
     * @param ChessBoard $chessBoard
     * @param $inputKey
     */
    private function addDiagonallyVerticalTopLeftMoves(ChessBoard $chessBoard, $inputKey)
    {
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
    }

    /**
     * @param ChessBoard $chessBoard
     * @param $inputKey
     */
    private function addDiagonallyVerticalBottomRightMoves(ChessBoard $chessBoard, $inputKey)
    {
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
    }

    /**
     * @param ChessBoard $chessBoard
     * @param $inputKey
     */
    private function addDiagonallyVerticalBottomLeftMoves(ChessBoard $chessBoard, $inputKey)
    {
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
    }
}
