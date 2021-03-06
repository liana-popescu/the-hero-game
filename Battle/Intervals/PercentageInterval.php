<?php

require_once __DIR__ . '/Interval.php';
require_once __DIR__ . '/../Exceptions/ValueOutOfTheLimitsException.php';

/**
 * Class PercentageInterval
 */
class PercentageInterval extends Interval
{
    /**
     * @param int $min
     * @param int $max
     * @throws ValueOutOfTheLimitsException
     */
    protected function validateLimits($min, $max)
    {
        if ($min < 0 || $max > 100) {
            throw new ValueOutOfTheLimitsException('Out of the bounds');
        }
    }
}
