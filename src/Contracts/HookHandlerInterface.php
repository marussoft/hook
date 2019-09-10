<?php

namespace Marussia\Hook\Contracts;

interface HookHandlerInterface
{
    public function handle($hook) : void;
}
