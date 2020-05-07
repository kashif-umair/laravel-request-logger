<?php


namespace Royalcms\Laravel\RequestLogger;


use Closure;

class LoogerVariableHandler
{

    protected $handlers = [];

    public function __construct()
    {

    }

    public function addHandler($key, Closure $handler)
    {
        $this->handlers[$key] = $handler;
    }

    public function getHandlers()
    {
        return $this->handlers;
    }


}