<?php

class ValueOutOfTheLimitsException extends RangeException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
