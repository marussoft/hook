<?php

declare(strict_types=1);

namespace Marussia\EventBus;

use Marussia\EventBus\Entities\Hook;
use Marussia\DependencyInjection\Container;

class HookHandler extends Container
{
    private $queue;

    public function __construct(\SplQueue $queue)
    {
        $this->queue = $queue;
        $this->queue->setIteratorMode(\SplQueue::IT_MODE_DELETE);
    }

    public function add(Hook $hook)
    {
        $this->queue->enqueue($hook);
    }
    
    public function run(array $handlers)
    {
        while (!$this->queue->isEmpty) {
            $hook = $this->queue->dequeue();
            $hookClass = get_class($hook);
            
            if (!array_key_exists($handlers)) {
                throw new HandlerNotFoundForHookException($hookClass);
            }
            $this->instance($hookClass)->handle($hook);
        }
    }
}
