<?php

require_once __DIR__. '/../../BattleTestCase.php';

/**
 * Class SkillsTest
 */
class SkillsTest extends BattleTestCase
{
    public function testConstructorCreatesInstance()
    {
        $this->assertInstanceOf(Skills::class, new Skills());
    }

    /**
     * @throws ValueOutOfTheLimitsException
     */
    public function testAllReturnsTheSkills()
    {
        $skills = new Skills();

        $this->assertIsArray($skills->all());
        $this->assertEquals(0, count($skills->all()));

        $skills = new Skills(new MagicShield(30, Skill::ATTACK));

        $this->assertIsArray($skills->all());
        $this->assertEquals(1, count($skills->all()));
    }

    /**
     * @throws ValueOutOfTheLimitsException
     */
    public function testAddSkillsToSkillsArray()
    {
        $skills = new Skills();
        $skills->add(new MagicShield(30, Skill::ATTACK));

        $this->assertEquals(1, count($skills->all()));
    }

}
