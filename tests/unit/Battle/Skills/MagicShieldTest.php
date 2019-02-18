<?php

require_once __DIR__. '/../../BattleTestCase.php';

/**
 * Class MagicShieldTest
 */
class MagicShieldTest extends BattleTestCase
{
    /**
     * @throws ValueOutOfTheLimitsException
     */
    public function testConstructorCreatesInstance()
    {
        $this->assertInstanceOf(MagicShield::class, new MagicShield(30, Skill::ATTACK));
    }

    /**
     * @throws ValueOutOfTheLimitsException
     */
    public function testRunReturnsHalfOfTheDamage()
    {
        $magicShield = new MagicShield(30, Skill::ATTACK);

        $this->assertEquals(12, $magicShield->run(24, 24));
    }
}
