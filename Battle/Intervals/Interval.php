<?php

require_once __DIR__ . '/../Exceptions/ValueOutOfTheLimitsException.php';

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
     * @throws ValueOutOfTheLimitsException
     */
    public function __construct(int $min, int $max)
    {
        $this->validateLimits($min, $max);

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


    /**
     * @param int $min
     * @param int $max
     * @throws ValueOutOfTheLimitsException
     */
    protected function validateLimits(int $min, int $max)
    {
        if ((! is_int($min)) || (! is_int($max))) {
            throw new ValueOutOfTheLimitsException('Out of the bounds');
        }
    }
}
