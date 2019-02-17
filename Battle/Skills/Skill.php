<?php

include './../Exceptions/ValueOutOfTheLimitsException.php';

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
     * @throws ValueOutOfTheLimitsException
     */
    public function __construct(int $chance, string $usage)
    {
        if ($chance < 0 || $chance > 100) {
            throw new ValueOutOfTheLimitsException('The chance parameter should be between 0 and 100');
        }

        $this->chance = $chance;
        $this->usage = $usage;
    }

    /**
     * @return int
     */
    public function getChance(): int
    {
        return $this->chance;
    }

    /**
     * @return string
     */
    public function getUsage(): string
    {
        return $this->usage;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return static::NAME;
    }

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return static::DESCRIPTION;
    }

    public function getLongDescription(): string
    {
        return static::DESCRIPTION .
            " There’s a $this->chance% chance he’ll use this skill every time he $this->usage" . "s.";
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
     * @param float $initialDamage
     * @param float $finalDamage
     * @return float
     */
    public abstract function run(float $initialDamage, float $finalDamage): float ;
}
