<?php

/**
 * Class Range
 */
class Range
{
    /**
     * @var int
     */
    protected $min;
    protected $max;

    /**
     * Range constructor.
     * @param int $min
     * @param int $max
     */
    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * Returns a random value from the range
     * @return int
     */
    public function getRandomValue(): int
    {
        return rand($this->min, $this->max);
    }
}
