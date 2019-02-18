<?php

include_once __DIR__ . '/../../BattleTestCase.php';

/**
 * Class NumberIntervalTest
 */
class NumberIntervalTest extends BattleTestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(NumericInterval::class, new NumericInterval(2, 5));
    }
}
