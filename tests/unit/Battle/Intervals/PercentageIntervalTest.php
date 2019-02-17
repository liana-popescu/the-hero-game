<?php

include __DIR__ . '/../../../../Battle/Intervals/PercentageInterval.php';

/**
 * Class PercentageIntervalTest
 */
class PercentageIntervalTest extends \PHPUnit\Framework\TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(PercentageInterval::class, new PercentageInterval(2, 24));
    }

    /**
     * @expectedException RangeException
     */
    public function testConstructorWithOutLimitsValuesExpectsException()
    {
        new PercentageInterval(-2, 3);
    }
}
