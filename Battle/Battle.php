<?php

require_once __DIR__ .'/Creatures/Creature.php';
require_once __DIR__ . '/Skills/Skill.php';

/**
 * Class Battle
 */
class Battle
{
    /** @var Creature */
    protected $hero;

    /** @var Creature */
    protected $beast;

    /** @var Creature */
    protected $attacker;

    /** @var Creature */
    protected $defender;

    /** @var int */
    protected $maximumRoundsNumber;

    /** @var int */
    protected $currentRoundNumber;

    /**
     * Battle constructor.
     * @param Creature $hero
     * @param Creature $beast
     * @param int $maximumRoundsNumber
     */
    public function __construct(Creature $hero, Creature $beast, int $maximumRoundsNumber)
    {
        $this->hero = $hero;
        $this->beast = $beast;

        $this->maximumRoundsNumber = $maximumRoundsNumber;
        $this->currentRoundNumber = 0;
    }

    public function start()
    {
        $this->initializeCompetitorsStates();
        $this->setCompetitorsRoles();

        $this->printInitialInformation();

        while ($this->currentRoundNumber <= $this->maximumRoundsNumber && $this->areCompetitorsStillAlive()) {
            $this->currentRoundNumber++;

            $this->printInitialRoundInformation();

            $this->attack();


            $this->switchCompetitorsRoles();

        }

        $this->gameOver();
    }

    /**
     *  Prints the initial battle information
     */
    protected function printInitialInformation()
    {
        echo "\nThe battle is starting...\n\n";
        echo "  =>  rounds number: $this->maximumRoundsNumber\n";
        echo "  =>  between:       " . $this->hero->getName() . " a.k.a. The Hero\n";
        echo "                     " . $this->beast->getName() . " a.k.a. The Wild Beast\n\n";

        $this->printCompetitorState($this->hero);
        $this->printCompetitorState($this->beast);;
    }

    protected function printCompetitorState(Creature $competitor)
    {
        $skills = $competitor->getSkills()->all();

        echo "\n" . strtoupper($competitor->getName()) . " starts with the following scores\n";
        echo "  =>  health    " . $competitor->getState()->getHealth() . "\n";
        echo "  =>  strength  " . $competitor->getState()->getStrength() . "\n";
        echo "  =>  defence   " . $competitor->getState()->getDefence() . "\n";
        echo "  =>  speed     " . $competitor->getState()->getSpeed() . "\n";
        echo "  =>  luck      " . $competitor->getState()->getLuck() . "\n";
        echo "  =>  skills    " . count($skills) . "\n";

        if (count($skills) > 0) {
            /** @var Skill $skill */
            foreach ($skills as $key => $skill) {
                $key += 1;
                echo "                " . $key . ": " . $skill->getName() . ": " . $skill->getLongDescription() . "\n";
            }
        }

        echo "\n";
    }

    /**
     *  Prints the initial round information
     */
    protected function printInitialRoundInformation()
    {
        echo "----------------- ROUND $this->currentRoundNumber -----------------\n\n";
        echo "Attacker: " . $this->attacker->getName() . "\n";
        echo "Defender: " . $this->defender->getName() . "\n\n";
    }

    /**
     * @return bool
     */
    protected function areCompetitorsStillAlive()
    {
        if ((!isset($this->attacker)) && (!isset($this->defender))) {
            return true;
        }

        if (($this->attacker->getState()->getHealth() > 0) && ($this->defender->getState()->getHealth() > 0)) {
            return true;
        }

        return false;
    }

    /**
     *  Initialized the competitors states
     */
    protected function initializeCompetitorsStates()
    {
        $this->hero->initializeState();
        $this->beast->initializeState();
    }

    /**
     *  Sets the competitors role (attacker or defender)
     */
    protected function setCompetitorsRoles()
    {
        $this->hero->getState()->getSpeed() === $this->beast->getState()->getSpeed()
            ? $this->setRolesBasedOnLuck()
            : $this->setRolesBasedOnSpeed();
    }

    protected function setRolesBasedOnSpeed()
    {
        $this->hero->getState()->getSpeed() > $this->beast->getState()->getSpeed()
            ? $this->setRoles($this->hero, $this->beast)
            : $this->setRoles($this->beast, $this->hero);
    }

    protected function setRolesBasedOnLuck()
    {
        if ($this->hero->getState()->getLuck() > $this->beast->getState()->getLuck()) {
            echo "\nThe competitors are equal in power. This battle will not start\n";
            exit();
        }

        $this->hero->getState()->getLuck() > $this->beast->getState()->getLuck()
            ? $this->setRoles($this->hero, $this->beast)
            : $this->setRoles($this->beast, $this->hero);
    }

    protected function attack()
    {
        $initialDamage = $this->attacker->getState()->getStrength() - $this->defender->getState()->getDefence();
        $finalDamage = $initialDamage;

        echo "The initial strike damage is " . $initialDamage . "\n\n";

        $skillsByType = [
            $this->attacker->getSkillsFilteredByUsage(Skill::ATTACK),
            $this->defender->getSkillsFilteredByUsage(Skill::DEFENCE)
        ];

        foreach ($skillsByType as $skills) {
            foreach ($skills as $skill) {
                $this->runSkill($skill, $initialDamage, $finalDamage);
            }
        }

        if ($this->isDefenderLucky()) {
            $finalDamage = 0;
            $defenderName = $this->defender->getName();
            $attackerName = $this->attacker->getName();

            echo "$defenderName is so lucky today! He escaped this time by the $attackerName 's attack\n";
        }

        echo "FINAL DAMAGE: " . $finalDamage . "\n";

        $this->defender->getState()->setHealth($this->defender->getState()->getHealth() - $finalDamage);

        $this->printCompetitorFinalState();
    }

    protected function printCompetitorFinalState()
    {
        echo "\nFINAL RESULTS:  " . $this->hero->getName() . " health " . $this->hero->getState()->getHealth() . "\n";
        echo "                " . $this->beast->getName() . " health " . $this->beast->getState()->getHealth() . "\n";
        echo "\n-------------------------------------------\n\n";
    }

    protected function runSkill(Skill $skill, float $initialDamage, float $finalDamage)
    {
        $role = $skill->getUsage() === Skill::ATTACK ? 'attacker' : 'defender';

        echo "The " . $role . " will use the skill " . $skill->getName() . "for " . $skill->getShortDescription() . "\n";
        echo "The damage would be " . $finalDamage . "\n";

        return $finalDamage = $skill->run($initialDamage, $finalDamage);
    }


    protected function switchCompetitorsRoles()
    {
        $this->attacker->getName() === $this->hero->getName()
            ? $this->setRoles($this->beast, $this->hero)
            : $this->setRoles($this->hero, $this->beast);
    }

    protected function setRoles(Creature $attacker, Creature $defender)
    {
        $this->attacker = &$attacker;
        $this->defender = &$defender;
    }

    protected function isDefenderLucky()
    {
        return $this->defender->isLucky();
    }

    protected function gameOver()
    {
        if ($this->currentRoundNumber === $this->maximumRoundsNumber) {
            echo "No winner for this battle";
        } else {
            if ($this->getWinner()->getName() === $this->hero->getName()) {
                echo "The winner is " . $this->getWinner()->getName() . "! <3 <3 <3\n";
            } else {
                echo "The winner is " . $this->getWinner()->getName() . "... :(\n";
            }
        }
    }

    protected function getWinner()
    {
        return $this->hero->getState()->getHealth() > $this->beast->getState()->getHealth()
            ? $this->hero
            : $this->beast;
    }
}
