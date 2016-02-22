<?php

namespace LinkORB\Vultr;

class AppApi extends AbstractApi
{

    public function __construct(\GuzzleHttp\Client $client, $key, &$rate)
    {
        parent::__construct($client, $key, $rate) ;
        $this->node = 'app' ;
    }
    
    public function getList()
    {
        $rtmp = $this->doGet("list", [], true) ;
        return $this->createArrayOfEntity($rtmp, "AppEntity") ;
    }
    
}
