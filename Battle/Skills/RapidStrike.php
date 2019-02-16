<?php

include './Skill.php';

class RapidStrike extends Skill
{
    const NAME = "Rapid Strike";
    const DESCRIPTION = 'Strike twice while it’s his turn to attack; there’s a 10% chance he’ll use this skill
                        every time he attacks';

    public function run(int $damage)
    {
        return $damage;
    }
}
