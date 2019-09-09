<?php

declare(strict_types=1);

namespace Marussia\EventBus;

use Marussia\EventBus\Entities\Hook;
use Marussia\DependencyInjection\Container;

class HookHandler extends Container
{
    private $config;
    
    public function __construct(ConfigProvider $config)
    {
        $this->config = $config;
    }

    public function handle(Hook $hook)
    {
    
    }
}
