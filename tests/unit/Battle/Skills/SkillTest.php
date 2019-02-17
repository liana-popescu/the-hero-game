<?php

include __DIR__ . '/../../../../Battle/Skills/Skill.php';
include __DIR__ . './../../../../Battle/Skills/MagicShield.php';
include __DIR__ . './../../../../Battle/Exceptions/ValueOutOfRangeException.php';

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
     * @throws ValueOutOfRangeException
     */
    public function testConstructorCreatesInstanceForInRangeValues($chance, $usage)
    {
        $this->assertInstanceOf(Skill::class, new MagicShield($chance, $usage));
    }

    /**
     * @dataProvider outOfRangeValues
     *
     * @expectedException ValueOutOfRangeException
     * @expectedExceptionMessage The chance parameter should be between 0 and 100
     *
     * @param $chance
     * @param $usage
     * @throws ValueOutOfRangeException
     */
    public function testConstructorReceivesValuesOutOfRangeExpectException($chance, $usage)
    {
        new MagicShield($chance, $usage);
    }

    /**
     * @throws ValueOutOfRangeException
     */
    public function testGetChance()
    {
        $skill = new MagicShield(30, Skill::ATTACK);

        $this->assertEquals(30, $skill->getChance());
    }

    /**
     * @throws ValueOutOfRangeException
     */
    public function testGetUsage()
    {
        $skill = new MagicShield(40, Skill::DEFENCE);

        $this->assertEquals(40, $skill->getChance());
    }

    /**
     * @throws ValueOutOfRangeException
     */
    public function testGetName()
    {
        $skill = new MagicShield(40, Skill::DEFENCE);
        $name = $skill->getName();

        $this->assertIsString($name);
        $this->assertEquals(MagicShield::NAME, $name);
    }

    /**
     * @throws ValueOutOfRangeException
     */
    public function testGetDescription()
    {
        $skill = new MagicShield(40, Skill::DEFENCE);
        $description = $skill->getShortDescription();

        $this->assertIsString($description);
        $this->assertEquals(MagicShield::DESCRIPTION, $description);
    }

    /**
     * @throws ValueOutOfRangeException
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
