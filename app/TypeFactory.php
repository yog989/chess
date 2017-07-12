<?php
namespace App;

/**
 * Class TypeFactory
 * @package App
 */
class TypeFactory
{
    /**
     * @param $type
     * @return KingType|PawnType|RookType
     */
    public static function getType($type)
    {
        switch ($type) {
            case 'KING':
                return new KingType();
                break;
            case 'PAWN':
                return new PawnType();
                break;
            case 'ROOK':
                return new RookType();
                break;
            default:
                return new PawnType();
        }
    }
}
