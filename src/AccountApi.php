<?php

namespace LinkORB\Vultr;

class AccountApi extends AbstractApi
{

    public function __construct(\GuzzleHttp\Client $client, $key, &$rate)
    {
        parent::__construct($client, $key, $rate) ;
        $this->node = 'account' ;
    }
    
    public function info()
    {
        $rtmp = $this->doGet("info", [], true) ;
        return new AccountEntity($rtmp) ;
    }
    
}
