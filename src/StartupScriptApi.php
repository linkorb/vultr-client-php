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
    
    public function update($rec)
    {
        if (is_object($rec) && ($rec instanceof StartupScriptEntity)) {
            if (strlen($rec->scriptid) > 0) {
                $content = ['SCRIPTID' => $rec->scriptid] ;
                if (strlen($rec->name) > 0) {
                    $content['name'] = $rec->name ;
                }
                if (strlen($rec->ssh_key) > 0) {
                    $content['script'] = $rec->script ;
                }
                return $this->doPost("update", $content) ;
            } else {
                $this->reply = "Invalid rec->scriptid value" ;
            }
        } else {
            $this->reply = "Invalid parameter type, must be StartupScriptEntity" ;
        }
        $this->code = -1 ;
        return false ;
    }
}
