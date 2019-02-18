<?php

require_once __DIR__. '/../../BattleTestCase.php';

/**
 * Class RapidStrikeTest
 */
class RapidStrikeTest extends BattleTestCase
{
    /**
     * @throws ValueOutOfTheLimitsException
     */
    public function testConstructorCreatesInstance()
    {
        $this->assertInstanceOf(RapidStrike::class, new RapidStrike(30, Skill::ATTACK));
    }

    /**
     * @throws ValueOutOfTheLimitsException
     */
    public function testRunReturnsTheDamageValue()
    {
        $rapidStrike = new RapidStrike(30, Skill::ATTACK);

        $this->assertEquals(48, $rapidStrike->run(24, 24));
    }
}
