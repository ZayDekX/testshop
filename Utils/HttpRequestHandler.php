<?php

const HTTP_POST = 'POST';
const HTTP_GET = 'GET';

#[Attribute(Attribute::TARGET_METHOD)]
class HttpRequestHandler
{
    private string $Method;

    function __construct(string $method)
    {
        $this->Method = $method;
    }

    public function GetHttpMethod():string{
        return $this->Method;
    }
}