<?php

include './Skill.php';

class Skills
{
    private $skills;

    const RAPID_STRIKE = 'Rapid Strike';
    const MAGIC_SHIELD = 'Magic Shield';

    public function __construct(Skill ...$skills)
    {
        $this->skills = $skills;
    }

    public function all()
    {
        return $this->skills;
    }

    public function add(Skill $skill)
    {
        array_push($this->skills, $skill);
    }
}
