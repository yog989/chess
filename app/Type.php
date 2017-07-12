<?php
namespace App;

/**
 * Interface Type
 * @package App
 */
interface Type
{
    public function move(ChessBoard $chessBoard, $inputKey);
}
