<?php

include './Skill.php';

/**
 * Class MagicShield
 */
class MagicShield extends Skill
{
    const NAME = 'Magic Shield';
    const DESCRIPTION = 'Takes only half of the usual damage when an enemy attacks.';

    /**
     * @param float $initialDamage
     * @param float $finalDamage
     * @return float
     */
    public function run(float $initialDamage, float $finalDamage): float
    {
        return $finalDamage - ($initialDamage / 2);
    }
}
