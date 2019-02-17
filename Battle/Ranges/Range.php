<?php

/**
 * Class Range
 */
class Range
{
    /** @var int */
    protected $min;

    /** @var int */
    protected $max;

    /**
     * Range constructor.
     * @param int $min
     * @param int $max
     * @param bool $isPercent
     * @throws ValueOutOfRangeException
     */
    public function __construct(int $min, int $max, bool $isPercent)
    {
        if ($isPercent) {
            $this->validatePercentageLimits($min, $max);
        }

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

    /**
     * Validates weather the received values are in or out of the range
     * @param $min
     * @param $max
     * @throws ValueOutOfRangeException
     */
    public function validatePercentageLimits($min, $max): void
    {
        if ($min < 0 || $max > 100 ){
            throw new ValueOutOfRangeException('The values have to be between 0 and 100');
        }
    }
}
