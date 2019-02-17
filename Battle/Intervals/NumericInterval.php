<?php

include_once  __DIR__ . '/Interval.php';

/**
 * Class NumericInterval
 */
class NumericInterval extends Interval
{
    /**
     * @param int $min
     * @param int $max
     */
    protected function validateLimits($min, $max)
    {
        // already mandatory by using type hints;
    }
}
