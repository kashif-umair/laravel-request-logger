<?php

namespace Royalcms\Laravel\RequestLogger;

use Closure;
use Symfony\Component\HttpFoundation;
use Psr\Log\LoggerInterface;

class Middleware
{
    /**
     * @var LoggerInterface
     */
    protected $logManager;

    public function __construct(RequestLogger $requestLogger)
    {
        $this->requestLogger = $requestLogger;
    }

    public function handle(HttpFoundation\Request $request, Closure $next, $guard = null)
    {
        return $next($request);
    }

    public function terminate(HttpFoundation\Request $request, HttpFoundation\Response $response)
    {
        $enabled = config('request-logger.enabled', false);
        if ($enabled === false) {
            return ;
        }

        if ($this->excluded($request) === false) {
            $this->configureRequestLogger();
            $this->requestLogger->handle($request, $response);
        }
    }

    protected function configureRequestLogger() : void
    {
        $this->requestLogger->setFormat(config('request-logger.format'));
        $this->requestLogger->setChannel(config('request-logger.log.channel'));
        $this->requestLogger->setLevel(config('request-logger.log.level'));
        $this->requestLogger->setContext('request');
    }

    protected function excluded(HttpFoundation\Request $request) : bool
    {
        $exclude = config('request-logger.exclude', []);

        if (null === $exclude || empty($exclude)) {
            return false;
        }

        foreach ($exclude as $path) {
            if ($request->is($path)) {
                return true;
            }
        }

        return false;
    }
}
