<?php

include './../States/Range.php';
include './../States/State.php';
include './../Skills/Skills.php';
include './../Skills/Skill.php';

/**
 * Class Creature
 */
class Creature
{
    /** @var string  */
    protected $name;

    /** @var Range  */
    protected $healthRange;

    /** @var Range */
    protected $strengthRange;

    /** @var Range */
    protected $defenceRange;

    /** @var Range */
    protected $speedRange;

    /** @var Range  */
    protected $luckRange;

    /** @var State */
    protected $state;

    protected $skills;

    /**
     * Creature constructor.
     * @param string $name
     * @param Range $healthRange
     * @param Range $strengthRange
     * @param Range $defenceRange
     * @param Range $speedRange
     * @param Range $luckRange
     * @param Skills $skills
     * @param State $state
     */
    public function __construct(
        string $name,
        Range $healthRange,
        Range $strengthRange,
        Range $defenceRange,
        Range $speedRange,
        Range $luckRange,
        Skills $skills,
        State $state
    ) {
        $this->name = $name;
        $this->healthRange = $healthRange;
        $this->strengthRange = $strengthRange;
        $this->defenceRange = $defenceRange;
        $this->speedRange = $speedRange;
        $this->luckRange = $luckRange;
        $this->state = $state;
        $this->skills = $skills;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return State
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return Skills
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param $healthRange
     */
    public function setHealthRange($healthRange)
    {
        $this->healthRange = $healthRange;
    }

    /**
     * @param $strengthRange
     */
    public function setStrengthRange($strengthRange)
    {
        $this->strengthRange = $strengthRange;
    }

    /**
     * @param $defenceRange
     */
    public function setDefenceRange($defenceRange)
    {
        $this->defenceRange = $defenceRange;
    }

    /**
     * @param $speedRange
     */
    public function setSpeedRange($speedRange)
    {
        $this->speedRange = $speedRange;
    }

    /**
     * @param $luckRange
     */
    public function setLuckRange($luckRange)
    {
        $this->luckRange = $luckRange;
    }

    /**
     * Initializes the state
     */
    public function initializeState()
    {
        $this->state->setHealth($this->healthRange->getRandomValue());
        $this->state->setStrength($this->strengthRange->getRandomValue());
        $this->state->setDefence($this->defenceRange->getRandomValue());
        $this->state->setSpeed($this->speedRange->getRandomValue());
        $this->state->setLuck($this->luckRange->getRandomValue());
    }

    /**
     * @return bool
     */
    public function isLucky()
    {
        return rand(1, 100) <= $this->state->getLuck() ? true : false;
    }

    /**
     * Gets the skills filter by usage
     * @param string $usage
     * @return array
     */
    public function getSkillsFilteredByUsage(string $usage): array
    {
        $skills = array();

        foreach ($this->skills->all() as $skill) {
            if ($skill->getUsage() === $usage) {
                array_push($skills, $skill);
            }
        }

        return $skills;
    }
}
