<?php

namespace LinkORB\Vultr;

class RegionApi extends AbstractApi
{

    public function __construct(\GuzzleHttp\Client $client, $key, &$rate)
    {
        parent::__construct($client, $key, $rate) ;
        $this->node = 'regions' ;
    }
    
    public function listRegions()
    {
        $rtmp = $this->doGet("list", [], true) ;
        return $this->createArrayOfEntity($rtmp, "RegionEntity") ;
    }

    public function availability()
    {
        return $this->doGet("availability", [], true) ;
    }
    
    
}
