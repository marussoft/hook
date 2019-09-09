<?php

declare(strict_types=1);

namespace Marussia\Hook;

use Marussia\DependencyInjection\Container;

class Hook
{
    private $hookHandler;

    public function __construct(HookHandler $hookHandler)
    {
        $this->hookHandler = $hookHandler;
    }
    
    public static function create() : self
    {
        $container = new Container;
        return $container->instance(Hook::class);
    }
    
    public function setHandlers(array $handlers) : void
    {
        $this->hookHandler->setHandlers($handlers);
    }
    
    public function add($hook) : void
    {
        $this->hookHandler->add($hook);
    }
    
    public function run() : void
    {
        $this->hookHandler->run();
    }
}
