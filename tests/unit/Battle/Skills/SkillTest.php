<?php

include __DIR__ . '/../../../../Battle/Skills/Skill.php';
include __DIR__ . './../../../../Battle/Skills/MagicShield.php';
include __DIR__ . './../../../../Battle/Exceptions/ValueOutOfTheLimitsException.php';

/**
 * Class SkillTest
 */
class SkillTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider inRangeValues
     *
     * @param $chance
     * @param $usage
     * @throws ValueOutOfTheLimitsException
     */
    public function testConstructorCreatesInstanceForInRangeValues($chance, $usage)
    {
        $this->assertInstanceOf(Skill::class, new MagicShield($chance, $usage));
    }

    /**
     * @dataProvider outOfRangeValues
     *
     * @expectedException ValueOutOfTheLimitsException
     *
     * @param $chance
     * @param $usage
     * @throws ValueOutOfTheLimitsException
     */
    public function testConstructorReceivesValuesOutOfRangeExpectException($chance, $usage)
    {
        new MagicShield($chance, $usage);
    }

    /**
     * @throws ValueOutOfTheLimitsException
     */
    public function testGetChance()
    {
        $skill = new MagicShield(30, Skill::ATTACK);

        $this->assertEquals(30, $skill->getChance());
    }

    /**
     * @throws ValueOutOfTheLimitsException
     */
    public function testGetUsage()
    {
        $skill = new MagicShield(40, Skill::DEFENCE);

        $this->assertEquals(40, $skill->getChance());
    }

    /**
     * @throws ValueOutOfTheLimitsException
     */
    public function testGetName()
    {
        $skill = new MagicShield(40, Skill::DEFENCE);
        $name = $skill->getName();

        $this->assertIsString($name);
        $this->assertEquals(MagicShield::NAME, $name);
    }

    /**
     * @throws ValueOutOfTheLimitsException
     */
    public function testGetShortDescription()
    {
        $skill = new MagicShield(40, Skill::DEFENCE);
        $description = $skill->getShortDescription();

        $this->assertIsString($description);
        $this->assertEquals(MagicShield::DESCRIPTION, $description);
    }

    public function testGetLongDescription()
    {
        $skill = new MagicShield(40, Skill::DEFENCE);
        $description = $skill->getLongDescription();

        $this->assertIsString($description);
    }

    /**
     * @throws ValueOutOfTheLimitsException
     */
    public function testHasChanceToAppearReturnsBool()
    {
        $skill = new MagicShield(20, Skill::DEFENCE);

        $this->assertIsBool($skill->hasChanceToAppear());
    }

    public function outOfRangeValues()
    {
        return [
            [-4, Skill::ATTACK],
            [101, Skill::ATTACK]
        ];
    }

    public function inRangeValues()
    {
        return [
            [0, Skill::ATTACK],
            [50, Skill::ATTACK],
            [100, Skill::ATTACK]
        ];
    }
}
