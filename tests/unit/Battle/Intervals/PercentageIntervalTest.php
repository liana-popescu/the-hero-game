<?php

include_once __DIR__ . '/../../BattleTestCase.php';

/**
 * Class PercentageIntervalTest
 */
class PercentageIntervalTest extends BattleTestCase
{
    /**
     * @throws ValueOutOfTheLimitsException
     */
    public function testConstructor()
    {
        $this->assertInstanceOf(PercentageInterval::class, new PercentageInterval(2, 24));
    }

//    /**
//     * @throws ValueOutOfTheLimitsException
//     */
//    public function testConstructorWithOutLimitsValuesExpectsException()
//    {
//        new PercentageInterval(-2, 3);
//        $this->expectException(ValueOutOfTheLimitsException::class);
//    }
}
