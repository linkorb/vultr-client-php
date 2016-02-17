<?php

namespace LinkORB\Vultr;

class Server extends AbstractApi
{

    public function __construct(\GuzzleHttp\Client $client, $key)
    {
        parent::__construct($client, $key) ;
        $this->node = 'server' ;
    }

    public function getAll($subid = 0)
    {
        try {
            if($subid != 0) {
                $res = $this->client->get(sprintf('%s/list?api_key=%s&SUBID=%d', $this->node, $this->key, $subid), ['http_errors' => false]) ;
                $rtmp = $this->getResult($res, true) ;
                $res = new ServerEntity($rtmp) ;
            }else{
                $res = $this->client->get(sprintf('%s/list?api_key=%s', $this->node, $this->key), ['http_errors' => false]) ;
                $rtmp = $this->getResult($res, true) ;
                $res = $this->createArrayOfEntity($rtmp, "ServerEntity") ;
            }
        } catch(\Exception $e) {
            $res = false ;
        }
        return $res ;
    }

    public function os_change_list($subid)
    {
        $rtmp = $this->doGet("os_change_list", ['SUBID' => $subid], true) ;
        return $this->createArrayOfEntity($rtmp, "OsEntity") ;
    }

    public function app_change_list($subid)
    {
        $rtmp = $this->doGet("app_change_list", ['SUBID' => $subid], true) ;
        return $this->createArrayOfEntity($rtmp, "AppEntity") ;
    }

    public function upgrade_plan_list($subid)
    {
        return $this->doGet("upgrade_plan_list", ['SUBID' => $subid], true) ;
    }

    public function list_ipv4($subid)
    {
        $rtmp = $this->doGet("list_ipv4", ['SUBID' => $subid], true) ;
        $keys = array_keys($rtmp) ;
        if(isset($keys[0])) {
            return $this->createArrayOfEntity($rtmp[$keys[0]], "IpEntity", array("ip_version" => 4)) ;
        }else{
            return false ;
        }
    }

    public function list_ipv6($subid)
    {
        $rtmp = $this->doGet("list_ipv6", ['SUBID' => $subid]) ;
        $keys = array_keys($rtmp) ;
        if(isset($keys[0])) {
            return $this->createArrayOfEntity($rtmp[$keys[0]], "IpEntity", array("ip_version" => 6)) ;
        }else{
            return false ;
        }
    }

    public function reverse_list_ipv6($subid)
    {
        return $this->doGet("reverse_list_ipv6", ['SUBID' => $subid]) ;
    }

    public function neighbors($subid)
    {
        return $this->doGet("neighbors", ['SUBID' => $subid]) ;
    }

    public function get_user_data($subid)
    {
        $res = $this->doGet("get_user_data", ['SUBID' => $subid]) ;
        if($this->code == 200 && property_exists($res, "userdata")) {
            $res->userdata = base64_decode($res->userdata) ;
        }
        return $res ;
    }
    
    public function create($dcid, $vpsplanid, $osid, $opt_params = array())
    {
        $content = ['DCID' => $dcid, 'VPSPLANID' => $vpsplanid, 'OSID' => $osid];
        foreach($opt_params as $k => $v) {
            $content[$k] = $v ;
        }
        return $this->doPost("create", $content) ;
    }
    
    public function bandwidth($subid)
    {
        return $this->doGet("bandwidth", ['SUBID' => $subid], true);
    }
    
    public function reboot($subid)
    {
        return $this->doPost("reboot", ['SUBID' => $subid]) ;
    }
    
    public function halt($subid)
    {
        return $this->doPost("halt", ['SUBID' => $subid]) ;
    }
    
    public function start($subid)
    {
        return $this->doPost("start", ['SUBID' => $subid]) ;
    }
    
    public function destroy($subid)
    {
        return $this->doPost("destroy", ['SUBID' => $subid]) ;
    }
    
    public function reinstall($subid)
    {
        return $this->doPost("reinstall", ['SUBID' => $subid]) ;
    }
    
    public function restore_snapshot($subid)
    {
        return $this->doPost("restore_snapshot", ['SUBID' => $subid]) ;
    }
    
    public function reverse_set_ipv4($subid, $ip, $entry)
    {
        return $this->doPost("reverse_set_ipv4", ['SUBID' => $subid, 'ip' => $ip, 'entry' => $entry]) ;
    }
    
    public function reverse_default_ipv4($subid, $ip)
    {
        return $this->doPost("reverse_default_ipv4", ['SUBID' => $subid, 'ip' => $ip]) ;
    }
    
    public function reverse_set_ipv6($subid, $ip, $entry)
    {
        return $this->doPost("reverse_set_ipv6", ['SUBID' => $subid, 'ip' => $ip, 'entry' => $entry]) ;
    }
    
    public function reverse_delete_ipv6($subid, $ip)
    {
        return $this->doPost("reverse_delete_ipv6", ['SUBID' => $subid, 'ip' => $ip]) ;
    }
    
    public function label_set($subid, $label)
    {
        return $this->doPost("label_set", ['SUBID' => $subid, 'label' => $label]) ;
    }
    
    public function restore_backup($subid, $backupid)
    {
        return $this->doPost("restore_backup", ['SUBID' => $subid, 'BACKUPID' => $backupid]) ;
    }
    
    public function create_ipv4($subid, $reboot = true)
    {
        return $this->doPost("create_ipv4", ['SUBID' => $subid, 'reboot' => ($reboot ? 'yes': 'no')]) ;
    }
    
    public function destroy_ipv4($subid, $ip)
    {
        return $this->doPost("destroy_ipv4", ['SUBID' => $subid, 'ip' => $ip]) ;
    }
    
    public function os_change($subid, $osid)
    {
        return $this->doPost("os_change", ['SUBID' => $subid, 'OSID' => $osid]) ;
    }
    
    public function upgrade_plan($subid, $planid)
    {
        return $this->doPost("upgrade_plan", ['SUBID' => $subid, 'VPSPLANID' => $planid]) ;
    }
    
    public function set_user_data($subid, $userdata)
    {
        return $this->doPost("set_user_data", ['SUBID' => $subid, 'userdata' => base64_encode($userdata)]) ;
    }
    
    public function app_change($subid, $appid)
    {
        return $this->doPost("app_change", ['SUBID' => $subid, 'APPID' => $appid]) ;
    }
    
}
