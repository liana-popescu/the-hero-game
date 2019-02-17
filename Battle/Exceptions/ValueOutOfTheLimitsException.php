<?php

/**
 * Class ValueOutOfTheLimitsException
 * @package Battle\Exceptions
 */
class ValueOutOfTheLimitsException extends Exception
{
    /**
     * ValueOutOfTheLimitsException constructor.
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
