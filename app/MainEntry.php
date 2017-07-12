<?php
namespace App;

/**
 * Class MainEntry
 * @package app
 */
class MainEntry
{
    /**
     * MainEntry constructor.
     */
    public function __construct($inputKey, $type)
    {
        $chessBoard = new ChessBoard();
        /** @var Type $type */
        $type = TypeFactory::getType($type);
        $allMoves = $type->move($chessBoard, $inputKey);
        print_r($allMoves);
    }
}
