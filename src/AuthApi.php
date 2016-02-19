<?php

namespace LinkORB\Vultr;

class AuthApi extends AbstractApi
{
    public function __construct(\GuzzleHttp\Client $client, $key, &$rate)
    {
        parent::__construct($client, $key, $rate) ;
        $this->node = 'auth' ;
    }
    
    public function info()
    {
        $rtmp = $this->doGet("info", [], true) ;
        return new AuthEntity($rtmp) ;
    }
}
