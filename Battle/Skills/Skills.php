<?php

include './Skill.php';

/**
 * Class Skills
 */
class Skills
{
    /** @var Skill[]  */
    private $skills;

    /**
     * Skills constructor.
     * @param Skill ...$skills
     */
    public function __construct(Skill ...$skills)
    {
        $this->skills = $skills;
    }

    /**
     * @return Skill[]
     */
    public function all()
    {
        return $this->skills;
    }

    /**
     * @param Skill ...$skills
     */
    public function add(Skill ...$skills)
    {
        foreach ($skills as $skill) {
            array_push($this->skills, $skill);
        }
    }
}
