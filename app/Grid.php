<?php

namespace App;

/**
 * Class Grid
 * @package App
 */
class Grid
{
    protected $key;
    protected $x;
    protected $y;

    /**
     * Grid constructor.
     * @param $key
     * @param $x
     * @param $y
     */
    public function __construct($key, $x, $y)
    {
        $this->key = $key;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }
}
