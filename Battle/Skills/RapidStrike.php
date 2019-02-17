<?php

include './Skill.php';

class RapidStrike extends Skill
{
    const NAME = "Rapid Strike";
    const DESCRIPTION = 'Strike twice while it’s his turn to attack.';


    /**
     * @param float $initialDamage
     * @param float $finalDamage
     * @return float
     */
    public function run(float $initialDamage, float $finalDamage)
    {
        return $finalDamage + $initialDamage;
    }
}
