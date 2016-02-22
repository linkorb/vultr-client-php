<?php

namespace LinkORB\Vultr;

class IsoApi extends AbstractApi
{

    public function __construct(\GuzzleHttp\Client $client, $key, &$rate)
    {
        parent::__construct($client, $key, $rate) ;
        $this->node = 'iso' ;
    }
    
    public function getList()
    {
        $rtmp = $this->doGet("list", [], true) ;
        return $this->createArrayOfEntity($rtmp, "IsoEntity") ;
    }
    
}
