<?php


namespace Royalcms\Laravel\RequestLogger;


use Illuminate\Support\Arr;

class LoggerFormatter
{

    /**
     * @var array
     */
    protected $formats = [
        "default"       => '{remote-addr} HTTP/{http-version} {method} "{full-url}" {status} "{user-agent}" {content-length} {referer} {request-data}',
        "default2"      => '{ip} {remote_user} {date} {method} {url} HTTP/{http_version} {status} {content-length} {referer} {user_agent}',
        "combined"      => '{remote-addr} - {remote-user} [{date}] "{method} {url} HTTP/{http-version}" {status} {content-length} "{referer}" "{user-agent}"',
        "common"        => '{remote-addr} - {remote-user} [{date}] "{method} {url} HTTP/{http-version}" {status} {content-length}',
        "dev"           => '{method} {url} {status} {response-time} ms - {content-length}',
        "short"         => '{remote-addr} {remote-user} {method} {url} HTTP/{http-version} {status} {content-length} - {response-time} ms',
        "tiny"          => '{method} {url} {status} {content-length} - {response-time} ms',
    ];

    /**
     * @var string Formatter type
     */
    protected $type;

    public function __construct($type = null)
    {
        if (is_null($type)) {
            $this->type = $type;
        }
        else {
            $this->type = config('request-logger.format', 'default');
        }
    }

    public function format()
    {
        if (Arr::has($this->formats, $this->type)) {
            $format = Arr::get($this->formats, $this->type);
        }
        else {
            $format = $this->type;
        }

        return $format;
    }

}