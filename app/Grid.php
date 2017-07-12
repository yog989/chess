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
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }
}
