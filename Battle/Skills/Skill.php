<?php

include './../Exceptions/ValueOutOfRangeException.php';

/**
 * Class Skill
 */
abstract class Skill
{
    /** @var int */
    protected $chance;

    /** @var string */
    protected $usage;

    const ATTACK = 'attack';
    const DEFENCE = 'defence';
    const NAME = 'Skill name';
    const DESCRIPTION = 'Skill description';

    /**
     * Skill constructor.
     * @param int $chance
     * @param string $usage
     * @throws ValueOutOfRangeException
     */
    public function __construct(int $chance, string $usage)
    {
        if ($chance < 0 || $chance > 100) {
            throw new ValueOutOfRangeException('The chance parameter should be between 0 and 100');
        }

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
     * @return mixed
     */
    public function getUsage()
    {
        return $this->usage;
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

    /**
     * Calculates weather the skill has chance to appear
     * @return bool
     */
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