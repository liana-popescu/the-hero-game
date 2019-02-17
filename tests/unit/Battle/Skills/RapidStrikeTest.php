<?php

include __DIR__ . '/../../../../Battle/Skills/Skill.php';
include __DIR__ . '/../../../../Battle/Skills/RapidStrike.php';

/**
 * Class RapidStrikeTest
 */
class RapidStrikeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws ValueOutOfRangeException
     */
    public function testConstructorCreatesInstance()
    {
        $this->assertInstanceOf(RapidStrike::class, new RapidStrike(30, Skill::ATTACK));
    }

    /**
     * @throws ValueOutOfRangeException
     */
    public function testRunReturnsTheDemageValue()
    {
        $rapidStrike = new RapidStrike(30, Skill::ATTACK);

        $this->assertEquals(24, $rapidStrike->run(24));
    }

}