<?php

namespace LinkORB\Vultr;

class ReservedIpApi extends AbstractApi
{

    public function __construct(\GuzzleHttp\Client $client, $key, &$rate)
    {
        parent::__construct($client, $key, $rate) ;
        $this->node = 'reservedip' ;
    }

    public function getList()
    {
        $rtmp = $this->doGet("list", [], true) ;
        return $this->createArrayOfEntity($rtmp, "ReservedIpEntity") ;
    }
    
    public function create($dcid, $ip_type)
    {
        return $this->doPost("create", ['DCID' => $dcid, 'ip_type' => $ip_type], true) ;
    }

    public function destroy($subid)
    {
        return $this->doPost("destroy", ['SUBID' => $subid]) ;
    }
    
    public function attach($subid, $ip)
    {
        return $this->doPost("attach", ['ip_address' => $ip, 'attach_SUBID' => $subid]) ;
    }

    public function detach($subid, $ip)
    {
        return $this->doPost("detach", ['ip_address' => $ip, 'detach_SUBID' => $subid]) ;
    }

    public function destroy($subid)
    {
        return $this->doPost("destroy", ['SUBID' => $subid]) ;
    }

    public function destroy($subid)
    {
        return $this->doPost("destroy", ['SUBID' => $subid]) ;
    }
    
}
