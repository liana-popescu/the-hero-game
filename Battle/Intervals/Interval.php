<?php

/**
 * Class Interval
 */
abstract class Interval
{
    /** @var int  */
    protected $min;

    /** @var int  */
    protected $max;

    /**
     * Interval constructor.
     * @param int $min
     * @param int $max
     */
    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @return int
     */
    public function getRandomValue()
    {
        return rand($this->min, $this->max);
    }

    public abstract function validateLimits();

}