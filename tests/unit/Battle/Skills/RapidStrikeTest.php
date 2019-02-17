<?php

include __DIR__ . '/../../../../Battle/Skills/Skill.php';
include __DIR__ . '/../../../../Battle/Skills/RapidStrike.php';

/**
 * Class RapidStrikeTest
 */
class RapidStrikeTest extends \PHPUnit\Framework\TestCase
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
