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
}
