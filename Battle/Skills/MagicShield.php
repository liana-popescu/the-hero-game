<?php

include './Skill.php';

class MagicShield extends Skill
{
    const NAME = 'Magic Shield';
    const DESCRIPTION = 'Takes only half of the usual damage when an enemy attacks; there’s a 20%
                        change he’ll use this skill every time he defends';

    public function __construct(int $chance, string $usage)
    {
        parent::__construct($chance, $usage);
    }

    public function run(int $damage)
    {
        return -($damage / 2);
    }
}
