<?php

declare(strict_types=1);

namespace Marussia\ApplicationKernel\Exceptions;

class HandlerMustBeImplementOfHookHandlerInterfaceException extends \Exception
{
    public function __construct(string $hookClass)
    {
        parent::__construct('Handler ' . $hookClass . ' must be implement of HookHandlerInterface');
    }
}  
