<?php

abstract class Skill
{
    protected $chance;
    protected $usage;

    const ATTACK = 'attack';
    const DEFENCE = 'defence';

    const NAME = 'Skill name';
    const DESCRIPTION = 'Skill description';

    public function __construct($chance, $usage)
    {
        $this->chance = $chance;
        $this->usage = $usage;
    }

    /**
     * @return mixed
     */
    public function getChance()
    {
        return $this->chance;
    }

    /**
     * @param mixed $chance
     */
    public function setChance($chance): void
    {
        $this->chance = $chance;
    }

    /**
     * @return mixed
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * @param mixed $usage
     */
    public function setUsage($usage): void
    {
        $this->usage = $usage;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return static::NAME;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return static::DESCRIPTION;
    }

    public function hasChanceToAppear(): bool
    {
        return rand(1, 100) <= $this->chance ? true : false;
    }

    /**
     * @param int $damage
     * @return int
     */
    public abstract function run(int $damage);
}