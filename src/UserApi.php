<?php

namespace LinkORB\Vultr;

class UserApi extends AbstractApi
{
    public function __construct(\GuzzleHttp\Client $client, $key, &$rate)
    {
        parent::__construct($client, $key, $rate) ;
        $this->node = 'user' ;
    }

    public function getList()
    {
        $rtmp = $this->doGet("list", [], true) ;
        return $this->createArrayOfEntity($rtmp, "UserEntity") ;
    }
    
    public function create($user)
    {
        if (is_object($user) && ($user instanceof DnsRecordEntity)) {
            $content = [ 
                'name' => $user->name, 
                'email' => $user->email,
                'password' => $user->password,
                'acls' => $user->acls ] ;
            (strlen($rec->api_enabled) > 0) ? $content['api_enabled'] = $user->api_enabled ;
            return $this->doPost("create", $content, true) ;
        } else {
            $this->code = -1 ;
            $this->reply = "Invalid parameter type, must be UserEntity" ;
            return false ;
        }
    }

    public function delete($id)
    {
        return $this->doPost("delete", ['USERID' => $id]) ;
    }
    
    public function update($user)
    {
        if (is_object($user) && ($user instanceof DnsRecordEntity)) {
            if(strlen($user->userid) > 0) {
                $content = ['USERID' => $user->userid] ;
                (strlen($user->email) > 0) ? $content['email'] = $user->email ;
                (strlen($user->name) > 0) ? $content['name'] = $user->name ;
                (strlen($user->password) > 0) ? $content['password'] = $user->password ;
                (strlen($user->api_enabled) > 0) ? $content['api_enabled'] = $user->api_enabled ;
                (sizeof($user->acls) > 0) ? $content['acls'] = $user->acls ;
                
                return $this->doPost("update", $content) ;
            } else {
                $this->reply = "Invalid user->userid value." ;
            }
        } else {
            $this->reply = "Invalid parameter type, must be UserEntity" ;
        }
        $this->code = -1 ;
        return false ;
    }
    
}
