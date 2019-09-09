<?php

declare(strict_types=1);

namespace Marussia\ApplicationKernel\Exceptions;

class HookMustBeObjectException extends \Exception
{
    public function __construct(string $type)
    {
        parent::__construct('Hook must be object type.' . ' Type of ' . $type . ' given.');
    }
} 
 
