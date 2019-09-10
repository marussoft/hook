<?php

declare(strict_types=1);

namespace Marussia\Hook\Exceptions;

class HandlerNotFoundForHookException extends \Exception
{
    public function __construct(string $hookClass)
    {
        parent::__construct('Handler is not found for hook ' . $hookClass);
    }
} 
