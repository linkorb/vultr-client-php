<?php

namespace LinkORB\Vultr;

class SshKeyApi extends AbstractApi
{
    public function __construct(\GuzzleHttp\Client $client, $key, &$rate)
    {
        parent::__construct($client, $key, $rate) ;
        $this->node = 'sshkey' ;
    }

    public function getList()
    {
        $rtmp = $this->doGet("list", [], true) ;
        return $this->createArrayOfEntity($rtmp, "SshKeyEntity") ;
    }
    
    public function create($name, $key)
    {
        return $this->doPost("create", ['name' => $name, 'ssh_key' => $key], true) ;
    }

    public function destroy($id)
    {
        return $this->doPost("destroy", ['SSHKEYID' => $id]) ;
    }
    
    public function update($rec)
    {
        if (is_object($rec) && ($rec instanceof SshKeyEntity)) {
            if (strlen($rec->sshkeyid) > 0) {
                $content = ['SSHKEYID' => $rec->sshkeyid] ;
                if (strlen($rec->name) > 0) {
                    $content['name'] = $rec->name ;
                }
                if (strlen($rec->ssh_key) > 0) {
                    $content['ssh_key'] = $rec->ssh_key ;
                }
                return $this->doPost("update", $content) ;
            } else {
                $this->reply = "Invalid rec->sshkeyid value" ;
            }
        } else {
            $this->reply = "Invalid parameter type, must be SshKeyEntity" ;
        }
        $this->code = -1 ;
        return false ;
    }
    
}
