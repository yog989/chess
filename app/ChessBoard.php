<?php
namespace App;

/**
 * Class ChessBoard
 * @package App
 */
class ChessBoard
{
    const ROWS = 8;
    const COLS = 8;
    protected $chessBoard = [];
    protected static $symbols = ['A', 'B','C','D','E','F','G','H'];
    protected $inputGridPair = [];

    /**
     * ChessBoard constructor.
     */
    public function __construct()
    {
        $this->buildMapper();
    }

    /**
     *
     */
    public function buildMapper()
    {
        for ($i = self::ROWS; $i >=1; $i--) {
            for ($j = 1; $j <= self::COLS; $j++) {
                $inputKey = self::$symbols[$j-1] . $i;
                $this->buildIndexInputMapper($inputKey, $j, $i);
            }
        }
    }

    /**
     * @param $inputKey
     * @param $x
     * @param $y
     */
    public function buildIndexInputMapper($inputKey, $x, $y)
    {
        array_push($this->inputGridPair, new Grid($inputKey, $x, $y));
    }

    /**
     * @param $inputKey
     * @return Grid|null
     */
    public function getGridUsingInputKey($inputKey)
    {
        $grid = null;
        for ($i = 0; $i< count($this->inputGridPair)-1; $i++) {
            /** @var Grid $gridKeyIndexPair */
            $gridKeyIndexPair = $this->inputGridPair[$i];
            if ($gridKeyIndexPair->getKey() === $inputKey) {
                $grid = $gridKeyIndexPair;
                break;
            }
        }
        return $grid;
    }

    /**
     * @param $x
     * @param $y
     * @return Grid|null
     */
    public function getGridUsingCoordinates($x, $y)
    {
        $grid = null;
        for ($i = 0; $i< count($this->inputGridPair)-1; $i++) {
            /** @var Grid $gridKeyIndexPair */
            $gridKeyIndexPair = $this->inputGridPair[$i];
            if ($gridKeyIndexPair->getX() === $x && $gridKeyIndexPair->getY() === $y) {
                $grid = $gridKeyIndexPair;
                break;
            }
        }
        return $grid;
    }

    /**
     * @param $inputKey
     * @param $step
     * @return Grid|null
     */
    public function moveHorizontallyLeft($inputKey, $step)
    {
        /** @var Grid $grid */
        $grid = $this->getGridUsingInputKey($inputKey);
        if (!is_null($grid)) {
            $x = $grid->getX() - $step;
            if ($x < 0 ) {
                return null;
            }
            else {
                $grid = $this->getGridUsingCoordinates($x, $grid->getY());
            }
        }
        return $grid;
    }

    /**
     * @param $inputKey
     * @param $step
     * @return Grid|null
     */
    public function moveHorizontallyRight($inputKey, $step)
    {
        /** @var Grid $grid */
        $grid = $this->getGridUsingInputKey($inputKey);
        if (!is_null($grid)) {
            $x = $grid->getX() + $step;
            if ($x > self::COLS) {
                return  null;
            }
            else {
                $grid = $this->getGridUsingCoordinates($x, $grid->getY());
            }
        }
        return $grid;
    }

    /**
     * @param $inputKey
     * @param $step
     * @return Grid|null
     */
    public function moveVerticallyUp($inputKey, $step)
    {
        /** @var Grid $grid */
        $grid = $this->getGridUsingInputKey($inputKey);
        if (!is_null($grid)) {
            $y = $grid->getY() + $step;
            if ($y > self::ROWS) {
                return  null;
            }
            else {
                $grid = $this->getGridUsingCoordinates($grid->getX(), $y);
            }
        }
        return $grid;
    }

    /**
     * @param $inputKey
     * @param $step
     * @return Grid|null
     */
    public function moveVerticallyDown($inputKey, $step)
    {
        /** @var Grid $grid */
        $grid = $this->getGridUsingInputKey($inputKey);
        if (!is_null($grid)) {
            $y = $grid->getY() - $step;
            if ($y < 0) {
                return  null;
            }
            else {
                $grid = $this->getGridUsingCoordinates($grid->getX(), $y);
            }
        }
        return $grid;
    }


    /**
     * @param $inputKey
     * @param $step
     * @return Grid|null
     */
    public function moveDiagonallyVerticalTopRight($inputKey, $step)
    {
        /** @var Grid $grid */
        $grid = $this->getGridUsingInputKey($inputKey);
        if (!is_null($grid)) {
            $x = $grid->getX() + $step;
            $y = $grid->getY() + $step;
            if ($x > self::ROWS) {
                return  null;
            }
            else {
                $grid = $this->getGridUsingCoordinates($x, $y);
            }
        }
        return $grid;
    }

    /**
     * @param $inputKey
     * @param $step
     * @return Grid|null
     */
    public function moveDiagonallyVerticalTopLeft($inputKey, $step)
    {
        /** @var Grid $grid */
        $grid = $this->getGridUsingInputKey($inputKey);
        if (!is_null($grid)) {
            $x = $grid->getX() - $step;
            $y = $grid->getY() + $step;
            if ($x < 0 || $y > self::COLS) {
                return  null;
            }
            else {
                $grid = $this->getGridUsingCoordinates($x, $y);
            }
        }
        return $grid;
    }

    /**
     * @param $inputKey
     * @param $step
     * @return Grid|null
     */
    public function moveDiagonallyVerticalBottomRight($inputKey, $step)
    {
        /** @var Grid $grid */
        $grid = $this->getGridUsingInputKey($inputKey);
        if (!is_null($grid)) {
            $x = $grid->getX() + $step;
            $y = $grid->getY() - $step;
            if ($x > self::ROWS || $y < 0) {
                return  null;
            }
            else {
                $grid = $this->getGridUsingCoordinates($x, $y);
            }
        }
        return $grid;
    }

    /**
     * @param $inputKey
     * @param $step
     * @return Grid|null
     */
    public function moveDiagonallyVerticalBottomLeft($inputKey, $step)
    {
        /** @var Grid $grid */
        $grid = $this->getGridUsingInputKey($inputKey);
        if (!is_null($grid)) {
            $x = $grid->getX() - $step;
            $y = $grid->getY() - $step;
            if ($x < 0 || $y < 0) {
                return  null;
            }
            else {
                $grid = $this->getGridUsingCoordinates($x, $y);
            }
        }
        return $grid;
    }
}
