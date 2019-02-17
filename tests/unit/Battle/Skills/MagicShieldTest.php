<?php

include __DIR__ . '/../../../../Battle/Skills/Skill.php';
include __DIR__ . '/../../../../Battle/Skills/MagicShield.php';

/**
 * Class MagicShieldTest
 */
class MagicShieldTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws ValueOutOfRangeException
     */
    public function testConstructorCreatesInstance()
    {
        $this->assertInstanceOf(MagicShield::class, new MagicShield(30, Skill::ATTACK));
    }

    /**
     * @throws ValueOutOfRangeException
     */
    public function testRunReturnsHalfOfTheDamage()
    {
        $magicShield = new MagicShield(30, Skill::ATTACK);

        $this->assertEquals(-12, $magicShield->run(24));
    }
}