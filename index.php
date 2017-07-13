<?php
require('vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;

$validPieces = ['KING' , 'ROOK', 'BISHOP', 'QUEEN', 'HORSE', 'PAWN'];
$validPositions = "/^[A-H|a-h][1-8]$$/";

if (defined('STDIN')) {
    if ($argc < 3) {
        die("Usage : index.php <type> <position>");
    }
    $type = $argv[1];
    $position = $argv[2];
} else {
    $request = Request::createFromGlobals();
    $type = $request->query->get('type', '');
    $position = $request->query->get('pos', '');
}

if (!preg_match($validPositions, $position)) {
    die("Invalid Position");
}

if (!in_array(strtoupper($type), $validPieces, true)) {
    die("Invalid Piece");
}

$selectedPiece = \App\TypeFactory::getType(strtoupper($type));
$possibleMoves = $selectedPiece->move(new \App\ChessBoard(), strtoupper($position));
echo implode(", ", $possibleMoves);
