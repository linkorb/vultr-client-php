<?php

namespace LinkORB\Vultr;

class SnapshotApi extends AbstractApi
{
    public function __construct(\GuzzleHttp\Client $client, $key, &$rate)
    {
        parent::__construct($client, $key, $rate) ;
        $this->node = 'snapshot' ;
    }

    public function getList()
    {
        $rtmp = $this->doGet("list", [], true) ;
        return $this->createArrayOfEntity($rtmp, "SnapshotEntity") ;
    }
    
    public function create($subid)
    {
        return $this->doPost("create", ['SUBID' => $subid], true) ;
    }

    public function destroy($snapshotid)
    {
        return $this->doPost("destroy", ['SNAPSHOTID' => $snapshotid]) ;
    }
}
