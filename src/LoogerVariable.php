<?php


namespace Royalcms\Laravel\RequestLogger;


use Royalcms\Laravel\RequestLogger\Helpers\BaseInterpolation;

class LoogerVariable extends BaseInterpolation
{
    protected $variables = [
        'method',
        'root',
        'url',
        'full-url',
        'path',
        'decoded-path',
        'remote-addr',
        'format',
        'scheme',
        'port',
        'query-string',
        'remote-user',
        'referer',
        'user-agent',
        'date',
        'content',
        'content-length',
        'response-time',
        'status',
        'http-version',
        'server',
        'req',
        'res',
        'request-data',
    ];

    protected $handler;

    public function __construct()
    {
        $this->handler = new LoogerVariableHandler();
    }


    public function resolveVariable($raw)
    {

        $this->handler->addHandler('method', function () {

        });

        $this->handler->addHandler('root', function () {

        });

        $this->handler->addHandler('url', function () {

        });

        $this->handler->addHandler('full-url', function () {

        });

        $this->handler->addHandler('path', function () {

        });

        $this->handler->addHandler('decoded-path', function () {

        });

        $this->handler->addHandler('remote-addr', function () {
            return $this->request->ip();
        });

        $this->handler->addHandler('format', function () {

        });

        $this->handler->addHandler('scheme', function () {
            return $this->request->getScheme();
        });

        $this->handler->addHandler('port', function () {
            return $this->request->getPort();
        });

        $this->handler->addHandler('query-string', function () {
            return $this->request->getQueryString();
        });

        $this->handler->addHandler('remote-user', function () {
            return $this->request->getUser();
        });

        $this->handler->addHandler('referer', function () {
            return $this->request->referer();
        });

        $this->handler->addHandler('body', function () {
            return $this->request->getContent();
        });

        $this->handler->addHandler('user-agent', function () {

        });

        $this->handler->addHandler('date', function () {

        });

        $this->handler->addHandler('content', function () {
            return $this->request->getContent();
        });


        $this->handler->addHandler('content-length', function () {

        });


        $this->handler->addHandler('response-time', function () {

        });


        $this->handler->addHandler('status', function () {

        });

        $this->handler->addHandler('http-version', function () {

        });

        $this->handler->addHandler('server', function () {

        });

        $this->handler->addHandler('req', function () {

        });

        $this->handler->addHandler('res', function () {

        });

        $this->handler->addHandler('request-data', function () {

        });


    }

    /**
     * @param string $text
     * @return string
     */
    public function interpolate($text)
    {

    }

}