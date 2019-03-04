<?php namespace AgelxNash\RequestLogger\Helpers;

use AgelxNash\RequestLogger\Contracts\Interpolable;

use Symfony\Component\HttpFoundation;

abstract class BaseInterpolation implements Interpolable
{
    /**
     * @var HttpFoundation\Request
     */
    protected $request;

    /**
     * @var HttpFoundation\Response
     */
    protected $response;

    /**
     * @param HttpFoundation\Request $request
     */
    public function setRequest(HttpFoundation\Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param HttpFoundation\Response $response
     */
    public function setResponse(HttpFoundation\Response $response)
    {
        $this->response = $response;
    }

    /**
     * @param string $raw
     */
    protected function escape($raw)
    {
        return preg_replace('/\s/', "\\s", $raw);
    }
}
