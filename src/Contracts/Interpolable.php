<?php namespace AgelxNash\RequestLogger\Contracts;

interface Interpolable {

    /**
     * @param string $text
     * @return string
     */
    public function interpolate($text);
}
