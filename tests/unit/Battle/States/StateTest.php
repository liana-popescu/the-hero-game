<?php

include __DIR__ . '/../../../../Battle/States/State.php';

class StateTest extends \PHPUnit\Framework\TestCase
{
    public function testConstructorCreatesInstance()
    {
        $this->assertInstanceOf(State::class, new State());
    }

    public function testGetHealth()
    {
        $state = new State();

        $this->assertEquals(0, $state->getHealth());
    }

    public function testSetHealth()
    {
        $state = new State();
        $state->setHealth(80);

        $this->assertEquals(80, $state->getHealth());
    }

    public function testGetStrength()
    {
        $state = new State();

        $this->assertEquals(0, $state->getStrength());
    }

    public function testSetStrength()
    {
        $state = new State();
        $state->setStrength(80);

        $this->assertEquals(80, $state->getStrength());
    }

    public function testGetDefence()
    {
        $state = new State();

        $this->assertEquals(0, $state->getDefence());
    }

    public function testSetDefence()
    {
        $state = new State();
        $state->setDefence(30);

        $this->assertEquals(30, $state->getDefence());
    }

    public function testGetSpeed()
    {
        $state = new State();

        $this->assertEquals(0, $state->getSpeed());
    }

    public function testSetSpeed()
    {
        $state = new State();
        $state->setSpeed(40);

        $this->assertEquals(40, $state->getSpeed());
    }

    public function testGetLuck()
    {
        $state = new State();

        $this->assertEquals(0, $state->getLuck());
    }

    public function testSetLuck()
    {
        $state = new State();
        $state->setLuck(40);

        $this->assertEquals(40, $state->getLuck());
    }
}