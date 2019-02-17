<?php

include __DIR__ . '/../../../../Battle/Ranges/PercentageRange1.php';

/**
 * Class RangeTest
 */
class RangeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider inRangeValues
     *
     * @param $min
     * @param $max
     */
    public function testConstructorCreatesInstance($min, $max)
    {
        $this->assertInstanceOf(Range1::class, new PercentageRange1($min, $max));
    }

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
        new PercentageRange1($min, $max);
    }

    /**
     * @throws RangeException
     */
    public function testGetRandomValue()
    {
        $range = new PercentageRange1(3, 20);
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
