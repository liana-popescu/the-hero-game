<?php

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

            echo "----------------- ROUND $this->currentRoundNumber -----------------\n";

            $this->printInitialRoundInformation();
            $this->attack();

            echo "-------------------------------------------\n\n";

            $this->switchCompetitorsRoles();

        }

        $this->gameOver();
    }

    /**
     *  Prints the initial battle information
     */
    protected function printInitialInformation()
    {
        echo "\n";
        echo "The battle is starting...\n";
        echo "\n";
        echo "  =>  rounds number: $this->maximumRoundsNumber\n";
        echo "  =>  between:       " . $this->hero->getName() . " a.k.a. The Hero\n";
        echo "                     " . $this->beast->getName() . " a.k.a. The Wild Beast\n";
        echo "\n";

        $competitors = [$this->hero, $this->beast];

        /** @var Creature $competitor */
        foreach ($competitors as $competitor) {
            echo "\n";
            echo $competitor->getName() . "\n";
            echo "  =>  health    " . $competitor->getState()->getHealth() . "\n";
            echo "  =>  strength  " . $competitor->getState()->getStrength() . "\n";
            echo "  =>  defence   " . $competitor->getState()->getDefence() . "\n";
            echo "  =>  speed     " . $competitor->getState()->getSpeed() . "\n";
            echo "  =>  luck      " . $competitor->getState()->getLuck() . "\n";
            echo "  =>  skills    \n";

            $skills = $competitor->getSkills()->all();

            if (count($skills) > 0) {

                /** @var Skill $skill */
                foreach ($skills as $skill) {
                    echo "          - " . $skill->getName() . ": " . $skill->getDescription() . "\n";
                }
            } else {
                echo "          No skills :(\n";
            }

            echo "\n";
            echo "\n";
        }


    }

    /**
     *  Prints the initial round information
     */
    protected function printInitialRoundInformation()
    {
        echo $this->hero->getName() . " health: " . $this->hero->getState()->getHealth() . "\n";
        echo $this->beast->getName() . " health: " . $this->beast->getState()->getHealth() . "\n";

        echo "\n";
        echo "Attacker: " . $this->attacker->getName() . "\n";
        echo "Defender: " . $this->defender->getName() . "\n";
        echo "\n";

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
        $this->hero->getState()->getLuck() > $this->beast->getState()->getLuck()
            ? $this->setRoles($this->hero, $this->beast)
            : $this->setRoles($this->beast, $this->hero);
    }

    protected function attack()
    {
        $damage = $this->attacker->getState()->getStrength() - $this->defender->getState()->getDefence();
        $attackerSkills = $this->attacker->getSkillsFilteredByUsage(Skill::ATTACK);
        $defenderSkills = $this->defender->getSkillsFilteredByUsage(Skill::DEFENCE);

        echo "The damage would be " . $damage. "\n";
        echo "\n";

        /** @var Skill $skill */
        foreach ($attackerSkills as $skill) {
            if ($skill->hasChanceToAppear()) {
                $damage += $skill->run($damage);
                echo "The attacker used the skill " . $skill->getName() . "\n";
                echo "The damage would be " . $damage. "\n";
            }
        }

        foreach ($defenderSkills as $skill) {
            if ($skill->hasChanceToAppear()) {
                $damage += $skill->run($damage);
                echo "The defender used the skill " . $skill->getName() . "\n";
                echo "The damage would be " . $damage. "\n";
            }
        }

        if ($this->isDefenderLucky()) {
            $damage = 0;

            echo $this->defender->getName() . " is so lucky today! He escaped this time by the " .
                $this->attacker->getName() . "'s attack\n";
        }

        echo "FINAL DAMAGE: " . $damage . "\n";

        $this->defender->getState()->setHealth($this->defender->getState()->getHealth() - $damage);

        echo "\n";
        echo "FINAL RESULTS:  " . $this->hero->getState()->getHealth() . " health\n " . $this->hero->getName();
        echo "                " . $this->beast->getState()->getHealth() . " health\n " . $this->beast->getName();
        echo "\n";
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
