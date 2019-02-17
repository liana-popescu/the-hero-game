<?php

include_once __DIR__ . '/Interval.php';

/**
 * Class PercentageInterval
 */
class PercentageInterval extends Interval
{

    public function validateLimits()
    {
        if ($this->min < 0 || $this->max > 100) {
            throw new Exception('Out of the bounds');
        }
    }
}