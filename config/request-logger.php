<?php
return [
    'format' => '{remote-addr} HTTP/{http-version} {method} "{fullUrl}" {status} "{user-agent}" {contentLength} {REFERER} {requestData}',
    'log' => [
        'channel' => 'daily', //You can create a custom log channel
        'level' => 'info',
    ],
    'exclude' => [

    ]
];
