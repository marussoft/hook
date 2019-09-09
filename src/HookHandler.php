<?php

declare(strict_types=1);

namespace Marussia\EventBus;

use Marussia\DependencyInjection\Container;
use Marussia\Hook\Contracts\HookHandlerInterface;
use Marussia\Hook\Exceptions\HookMustBeObjectException;
use Marussia\Hook\Exceptions\HandlerMustBeImplementOfHookHandlerInterfaceException;
use Marussia\Hook\Exceptions\HandlerNotFoundForHookException;

class HookHandler extends Container
{
    private $queue;
    
    private $handlers;

    public function __construct()
    {
        $this->queue = new \SplQueue;
        $this->queue->setIteratorMode(\SplQueue::IT_MODE_DELETE);
    }

    public function setHandlers(array $handlers) : void
    {
        $this->handlers = $handlers;
    }
    
    public function add($hook) : void
    {
        $this->queue->enqueue($hook);
    }
    
    public function run() : void
    {
        foreach ($this->iterate() as $hook) {

            if (!is_object($hook)) {
                throw new HookMustBeObjectException(gettype($hook));
            }
        
            $hookClass = get_class($hook);
            
            if (!array_key_exists($hookClass, $this->handlers)) {
                throw new HandlerNotFoundForHookException($hookClass);
            }
            
            $handler = $this->instance($hookClass);
            
            if (!($handler instanceof HookHandlerInterface)) {
                throw new HandlerIsNotHookHandlerInterfaceImplemensException(get_class($handler));
            }
            $handler->handle($hook);
        }
    }
    
    private function iterate() : \Traversable
    {
        while(!$this->queue->isEmpty()) {
            yield $this->queue->pop();
        }
    }
}
