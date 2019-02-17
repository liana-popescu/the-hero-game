<?php

include __DIR__ . '/../../../../Battle/Skills/Skills.php';
include __DIR__ . '/../../../../Battle/Skills/Skill.php';
include __DIR__ . '/../../../../Battle/Skills/MagicShield.php';

class SkillsTest extends \PHPUnit\Framework\TestCase
{
    public function testConstructorCreatesInstance()
    {
        $this->assertInstanceOf(Skills::class, new Skills());
    }

    /**
     * @throws ValueOutOfRangeException
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
     * @throws ValueOutOfRangeException
     */
    public function testAddSkillsToSkillsArray()
    {
        $skills = new Skills();
        $skills->add(new MagicShield(30, Skill::ATTACK));

        $this->assertEquals(1, count($skills->all()));
    }

}