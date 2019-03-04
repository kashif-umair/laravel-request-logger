<?php namespace AgelxNash\RequestLogger;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation;

class RequestLogger
{
    /** @var Helpers\RequestInterpolation */
    protected $requestInterpolation;

    /** @var Helpers\ResponseInterpolation */
    protected $responseInterpolation;

    /** @var \Illuminate\Log\LogManager */
    protected $logManager;

    protected $context = 'RESPONSE';
    protected $level = 'info';
    protected $channel = 'daily';
    protected $format = '{remote-addr} HTTP/{http-version} {method} "{fullUrl}" {status} "{user-agent}" {contentLength} {REFERER} {requestData}';

    public function __construct(
        Helpers\RequestInterpolation $requestInterpolation,
        Helpers\ResponseInterpolation $responseInterpolation,
        LoggerInterface $logManager
    ) {

        $this->requestInterpolation = $requestInterpolation;
        $this->responseInterpolation = $responseInterpolation;
        $this->logManager = $logManager;
    }

    /**
     * @return string
     */
    public function getContext(): string
    {
        return $this->context;
    }

    /**
     * @param string $context
     */
    public function setContext(string $context): void
    {
        $this->context = $context;
    }

    /**
     * @return string
     */
    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     * @param string $level
     */
    public function setLevel(string $level): void
    {
        $this->level = $level;
    }

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * @param string $channel
     */
    public function setChannel(string $channel): void
    {
        $this->channel = $channel;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat(string $format): void
    {
        $this->format = $format;
    }

    public function setRequest(HttpFoundation\Request $request) : void
    {
        $this->requestInterpolation->setRequest($request);
        $this->responseInterpolation->setRequest($request);
    }

    public function setResponse(HttpFoundation\Response $response) : void
    {
        $this->responseInterpolation->setResponse($response);
    }

    public function handle(HttpFoundation\Request $request, HttpFoundation\Response $response)
    {
        $this->setRequest($request);
        $this->setResponse($response);

        $this->logManager->channel($this->getContext())->log(
            $this->getLevel(),
            $this->requestInterpolation->interpolate(
                $this->responseInterpolation->interpolate(
                    $this->getFormat()
                )
            ),
            [$this->getContext()]
        );
    }
}
