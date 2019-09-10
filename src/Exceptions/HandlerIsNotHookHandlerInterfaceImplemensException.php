<?php

declare(strict_types=1);

namespace Marussia\Hook\Exceptions;

class HandlerIsNotHookHandlerInterfaceImplemensException extends \Exception
{
    public function __construct(string $hookClass)
    {
        parent::__construct('Handler ' . $hookClass . ' must be implement of HookHandlerInterface');
    }
}  
