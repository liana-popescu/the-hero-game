<?php

include __DIR__ . '/../../../../Battle/Intervals/NumericInterval.php';
include __DIR__ . '/../../../../Battle/Intervals/PercentageInterval.php';
include __DIR__ . '/../../../../Battle/Skills/Skills.php';
include __DIR__ . '/../../../../Battle/Skills/Skill.php';
include __DIR__ . '/../../../../Battle/States/State.php';
include __DIR__ . '/../../../../Battle/Creatures/Creature.php';

class CreatureTest extends \PHPUnit\Framework\TestCase
{

    public function testConstructorCreatesInstance()
    {
        $numericIntervalMock = $this->createMock(NumericInterval::class);
        $percentageIntervalMock = $this->createMock(PercentageInterval::class);
        $skillsMock = $this->createMock(Skills::class);
        $stateMock = $this->createMock(State::class);

        $creature = new Creature(
            'name',
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $percentageIntervalMock,
            $skillsMock,
            $stateMock
        );

        $this->assertInstanceOf(Creature::class, $creature);
    }

    public function testGetName()
    {
        $numericIntervalMock = $this->createMock(NumericInterval::class);
        $percentageIntervalMock = $this->createMock(PercentageInterval::class);
        $skillsMock = $this->createMock(Skills::class);
        $stateMock = $this->createMock(State::class);

        $creature = new Creature(
            'name',
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $percentageIntervalMock,
            $skillsMock,
            $stateMock
        );

        $this->assertEquals('name', $creature->getName());
    }

    public function testGetState()
    {
        $numericIntervalMock = $this->createMock(NumericInterval::class);
        $percentageIntervalMock = $this->createMock(PercentageInterval::class);
        $skillsMock = $this->createMock(Skills::class);
        $stateMock = $this->createMock(State::class);

        $creature = new Creature(
            'name',
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $percentageIntervalMock,
            $skillsMock,
            $stateMock
        );

        $this->assertInstanceOf(State::class, $creature->getState());
    }

    public function testGetSkills()
    {
        $numericIntervalMock = $this->createMock(NumericInterval::class);
        $percentageIntervalMock = $this->createMock(PercentageInterval::class);
        $skillsMock = $this->createMock(Skills::class);
        $stateMock = $this->createMock(State::class);

        $creature = new Creature(
            'name',
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $percentageIntervalMock,
            $skillsMock,
            $stateMock
        );

        $this->assertInstanceOf(Skills::class, $creature->getSkills());
    }

    /**
     * @throws ReflectionException
     */
    public function testInitializeState()
    {
        $numericIntervalMock = $this->getMockBuilder(NumericInterval::class)
            ->disableOriginalConstructor()
            ->setMethods(['getRandomValue'])
            ->getMock();

        $numericIntervalMock->expects($this->any())
            ->method('getRandomValue')
            ->willReturn(3);


        $percentageIntervalMock = $this->getMockBuilder(PercentageInterval::class)
            ->disableOriginalConstructor()
            ->setMethods(['getRandomValue'])
            ->getMock();

        $percentageIntervalMock->expects($this->once())
            ->method('getRandomValue')
            ->willReturn(3);


        $skillsMock = $this->createMock(Skills::class);


        $stateMock = $this->getMockBuilder(State::class)
            ->disableOriginalConstructor()
            ->setMethods(['setHealth', 'setStrength', 'setDefence', 'setSpeed', 'setLuck'])
            ->getMock();

        $stateMock->expects($this->once())
            ->method('setHealth');

        $stateMock->expects($this->once())
            ->method('setStrength');

        $stateMock->expects($this->once())
            ->method('setDefence');

        $stateMock->expects($this->once())
            ->method('setSpeed');

        $stateMock->expects($this->once())
            ->method('setLuck');

        $creature = new Creature(
            'name',
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $percentageIntervalMock,
            $skillsMock,
            $stateMock
        );

        $creature->initializeState();
    }

    public function testIsLucky()
    {
        $numericIntervalMock = $this->getMockBuilder(NumericInterval::class)
            ->disableOriginalConstructor()
            ->setMethods(['getRandomValue'])
            ->getMock();

        $numericIntervalMock->expects($this->any())
            ->method('getRandomValue')
            ->willReturn(3);


        $percentageIntervalMock = $this->getMockBuilder(PercentageInterval::class)
            ->disableOriginalConstructor()
            ->setMethods(['getRandomValue'])
            ->getMock();

        $percentageIntervalMock->expects($this->once())
            ->method('getRandomValue')
            ->willReturn(3);


        $skillsMock = $this->createMock(Skills::class);


        $stateMock = $this->getMockBuilder(State::class)
            ->disableOriginalConstructor()
            ->setMethods(['setHealth', 'setStrength', 'setDefence', 'setSpeed', 'setLuck', 'getLuck'])
            ->getMock();

        $stateMock->expects($this->once())
            ->method('setHealth');

        $stateMock->expects($this->once())
            ->method('setStrength');

        $stateMock->expects($this->once())
            ->method('setDefence');

        $stateMock->expects($this->once())
            ->method('setSpeed');

        $stateMock->expects($this->once())
            ->method('setLuck');

        $stateMock->expects($this->once())
            ->method('getLuck')
            ->willReturn(2);

        $creature = new Creature(
            'name',
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $percentageIntervalMock,
            $skillsMock,
            $stateMock
        );

        $creature->initializeState();

        $this->assertIsBool($creature->isLucky());
    }

    public function testGetSkillsFilteredByUsage()
    {
        $numericIntervalMock = $this->createMock(NumericInterval::class);
        $percentageIntervalMock = $this->createMock(PercentageInterval::class);

        $skillMock = $this->getMockBuilder(Skill::class)
            ->disableOriginalConstructor()
            ->setMethods(['getUsage'])
            ->getMock();
        $skillMock->expects($this->once())
            ->method('getUsage')
            ->willReturn(Skill::ATTACK);

        $skillsMock = $this->getMockBuilder(Skills::class)
            ->disableOriginalConstructor()
            ->setMethods(['all'])
            ->getMock();
        $skillsMock->expects($this->once())
            ->method('all')
            ->willReturn($skillMock);

        $stateMock = $this->createMock(State::class);

        $creature = new Creature(
            'name',
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $numericIntervalMock,
            $percentageIntervalMock,
            $skillsMock,
            $stateMock
        );

        $attackSkills = $creature->getSkillsFilteredByUsage(Skill::ATTACK);

        $this->assertIsArray($attackSkills);
        $this->assertEquals(1, count($attackSkills));

        $defenceSkills= $creature->getSkillsFilteredByUsage(Skill::DEFENCE);

        $this->assertIsArray($defenceSkills);
        $this->assertEquals(0, count($defenceSkills));
    }
}