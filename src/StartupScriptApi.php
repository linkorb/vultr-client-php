<?php

namespace LinkORB\Vultr;

class StartupScriptApi extends AbstractApi
{
    public function __construct(\GuzzleHttp\Client $client, $key, &$rate)
    {
        parent::__construct($client, $key, $rate) ;
        $this->node = 'startupscript' ;
    }

    public function getList()
    {
        $rtmp = $this->doGet("list", [], true) ;
        return $this->createArrayOfEntity($rtmp, "StartupScriptEntity") ;
    }
    
    public function create($name, $script, $type)
    {
        return $this->doPost("create", ['name' => $name, 'script' => $script, 'type' => $type], true) ;
    }

    public function destroy($id)
    {
        return $this->doPost("destroy", ['SCRIPTID' => $id]) ;
    }
    
    public function update($id, $name, $script)
    {
        return $this->doPost("update", ['SCRIPTID' => $id, 'name' => $name, 'script' => $script]) ;
    }
    
}
