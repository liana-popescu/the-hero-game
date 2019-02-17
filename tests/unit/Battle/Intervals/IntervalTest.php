<?php

include __DIR__ . '/../../../../Battle/Intervals/Interval.php';
include __DIR__ . '/../../../../Battle/Intervals/PercentageInterval.php';

/**
 * Class IntervalTest
 */
class IntervalTest extends \PHPUnit\Framework\TestCase
{
//    /**
//     * @dataProvider inRangeValues
//     *
//     * @param $min
//     * @param $max
//     */
//    public function testConstructorCreatesInstance($min, $max)
//    {
//        $this->assertInstanceOf(Interval::class, new PercentageInterval($min, $max));
//    }

    /**
     * @dataProvider outOfRangeValues
     *
     * @expectedException RangeException
     *
     * @param $min
     * @param $max
     * @throws RangeException
     */
    public function testConstructorWithWrongValuesExpectsException($min, $max)
    {
        new PercentageInterval($min, $max);
    }

//    /**
//     * @throws RangeException
//     */
//    public function testGetRandomValue()
//    {
//        $range = new PercentageInterval(3, 20);
//        $value = $range->getRandomValue();
//
//        $this->assertNotNull($value);
//        $this->assertIsNumeric($value);
//    }
//
//    public function inRangeValues()
//    {
//        return [
//            [2, 5],
//            [0, 60],
//            [67, 100],
//        ];
//    }

    public function outOfRangeValues()
    {
        return [
            [-4, 20],
            [3, 120],
            [-2, 300]
        ];
    }
}
