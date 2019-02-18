<?php

require_once __DIR__ .'/../Intervals/NumericInterval.php';
require_once __DIR__ . '/../Intervals/PercentageInterval.php';
require_once __DIR__ .'/../States/State.php';
require_once __DIR__ . '/../Skills/Skills.php';

/**
 * Class CreatureTest
 */
class Creature
{
    /** @var string  */
    protected $name;

    /** @var NumericInterval*/
    protected $healthRange;

    /** @var NumericInterval */
    protected $strengthRange;

    /** @var NumericInterval */
    protected $defenceRange;

    /** @var NumericInterval */
    protected $speedRange;

    /** @var PercentageInterval  */
    protected $luckRange;

    /** @var State */
    protected $state;

    /** @var Skills  */
    protected $skills;

    /**
     * Creature constructor.
     * @param string $name
     * @param NumericInterval $healthRange
     * @param NumericInterval $strengthRange
     * @param NumericInterval $defenceRange
     * @param NumericInterval $speedRange
     * @param PercentageInterval $luckRange
     * @param Skills $skills
     * @param State $state
     */
    public function __construct(
        string $name,
        NumericInterval $healthRange,
        NumericInterval $strengthRange,
        NumericInterval $defenceRange,
        NumericInterval $speedRange,
        PercentageInterval $luckRange,
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

        /** @var Skill $skill */
        foreach ($this->skills->all() as $skill) {
            if ($skill->getUsage() === $usage) {
                array_push($skills, $skill);
            }
        }

        return $skills;
    }
}
