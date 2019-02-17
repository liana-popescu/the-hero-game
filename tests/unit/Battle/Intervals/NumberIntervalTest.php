<?php

include __DIR__ . '/../../../../Battle/Intervals/NumericInterval.php';

/**
 * Class NumberIntervalTest
 */
class NumberIntervalTest extends \PHPUnit\Framework\TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(NumericInterval::class, new NumericInterval(2, 5));
    }
}
