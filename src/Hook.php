<?php

declare(strict_types=1);

namespace Marussia\Hook;

use Marussia\DependencyInjection\Container;
use Marussia\Hook\Contracts\HookInterface;

class Hook
{
    private $handlers;
    
    private $hookHandler;

    public function __construct(HookHandler $hookHandler)
    {
        $this->hookHandler = $hookHandler;
    }
    
    public static function setHandlers(array $handlers) : self
    {
        $this->handlers = $handlers;
    }
    
    public function add(HookInterface $hook)
    {
        $this->hookHandler->add($hook);
    }
    
    public function run()
    {
        $this->hookHandler->run($this->handlers);
    }
}
