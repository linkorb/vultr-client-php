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
    
    public function update($id, $name, $key)
    {
        return $this->doPost("update", ['SSHKEYID' => $id, 'name' => $name, 'ssh_key' => $key]) ;
    }
    
}
