<?php

namespace Royalcms\Laravel\RequestLogger\Contracts;

interface Interpolable
{

    /**
     * @param string $text
     * @return string
     */
    public function interpolate($text);
}
