<?php

include __DIR__ . '/../../../../Battle/Ranges/Range.php';
include __DIR__ . '/../../../../Battle/Exceptions/ValueOutOfRangeException.php';

class RangeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider inRangeValues
     *
     * @param $min
     * @param $max
     * @param $isPercent
     * @throws ValueOutOfRangeException
     */
    public function testConstructorCreatesInstance($min, $max, $isPercent)
    {
        $this->assertInstanceOf(Range::class, new Range($min, $max, $isPercent));
    }

    /**
     * @dataProvider outOfRangeValues
     *
     * @expectedException ValueOutOfRangeException
     * @expectedExceptionMessage The values have to be between 0 and 100
     *
     * @param $min
     * @param $max
     * @param $isPercent
     * @throws ValueOutOfRangeException
     */
    public function testConstructorWithWrongValuesExpectsException($min, $max, $isPercent)
    {
        new Range($min, $max, $isPercent);
    }

    /**
     * @throws ValueOutOfRangeException
     */
    public function testGetRandomValuesReturnsInt()
    {
        $range = new Range(0, 100, true);

        $this->assertIsInt($range->getRandomValue());
    }

    public function inRangeValues()
    {
        return [
            [-1, 300, false],
            [50, 60, true],
            [0, 100, true],
        ];
    }

    public function outOfRangeValues()
    {
        return [
            [-4, 20, true],
            [3, 120, true],
            [-2, 300, true]
        ];
    }
}