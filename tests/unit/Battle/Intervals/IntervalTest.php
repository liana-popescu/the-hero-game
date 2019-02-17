<?php

require_once __DIR__. '/../../BattleTestCase.php';

/**
 * Class IntervalTest
 */
class IntervalTest extends BattleTestCase
{
    /**
     * @dataProvider inRangeValues
     *
     * @param $min
     * @param $max
     * @throws ValueOutOfTheLimitsException
     */
    public function testConstructorCreatesInstance($min, $max)
    {
        $this->assertInstanceOf(Interval::class, new PercentageInterval($min, $max));
    }

//    /**
//     * @dataProvider outOfRangeValues
//     *
//     * @param $min
//     * @param $max
//     * @throws ValueOutOfTheLimitsException
//     */
//    public function testConstructorWithWrongValuesExpectsException($min, $max)
//    {
//        new PercentageInterval($min, $max);
//
//        $this->expectException(ValueOutOfTheLimitsException::class);
//    }

    /**
     * @throws ValueOutOfTheLimitsException
     */
    public function testGetRandomValue()
    {
        $range = new PercentageInterval(3, 20);
        $value = $range->getRandomValue();

        $this->assertNotNull($value);
        $this->assertIsNumeric($value);
    }

    public function inRangeValues()
    {
        return [
            [2, 5],
            [0, 60],
            [67, 100],
        ];
    }

    public function outOfRangeValues()
    {
        return [
            [-4, 20],
            [3, 120],
            [-2, 300]
        ];
    }
}
