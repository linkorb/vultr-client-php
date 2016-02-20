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
        if (is_object($user) && ($user instanceof UserEntity)) {
            $content = [ 
                'name' => $user->name, 
                'email' => $user->email,
                'password' => $user->password,
                'acls' => $user->acls ] ;
            if (strlen($rec->api_enabled) > 0) {
                $content['api_enabled'] = $user->api_enabled ;
            }
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
        if (is_object($user) && ($user instanceof UserEntity)) {
            if(strlen($user->userid) > 0) {
                $content = ['USERID' => $user->userid] ;
                if (strlen($user->email) > 0) {
                    $content['email'] = $user->email ;
                }
                if (strlen($user->name) > 0) {
                    $content['name'] = $user->name ;
                }
                if (strlen($user->password) > 0) {
                    $content['password'] = $user->password ;
                }
                if (strlen($user->api_enabled) > 0) {
                    $content['api_enabled'] = $user->api_enabled ;
                }
                if (sizeof($user->acls) > 0) {
                    $content['acls'] = $user->acls ;
                }
                
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
