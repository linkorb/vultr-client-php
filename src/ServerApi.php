<?php

namespace LinkORB\Vultr;

class ServerApi extends AbstractApi
{

    public function __construct(\GuzzleHttp\Client $client, $key, &$rate)
    {
        parent::__construct($client, $key, $rate) ;
        $this->node = 'server' ;
    }

    public function getList($subid = 0)
    {
        if ($subid != 0) {
            $rtmp = $this->doGet("list", ['SUBID' => $subid], true) ;
            $res = new ServerEntity($rtmp) ;
        } else {
            $rtmp = $this->doGet("list", [], true) ;
            $res = $this->createArrayOfEntity($rtmp, "ServerEntity") ;
        }
        return $res ;
    }

    public function osChangeList($subid)
    {
        $rtmp = $this->doGet("os_change_list", ['SUBID' => $subid], true) ;
        return $this->createArrayOfEntity($rtmp, "OsEntity") ;
    }

    public function appChangeList($subid)
    {
        $rtmp = $this->doGet("app_change_list", ['SUBID' => $subid], true) ;
        return $this->createArrayOfEntity($rtmp, "AppEntity") ;
    }

    public function upgradePlanList($subid)
    {
        return $this->doGet("upgrade_plan_list", ['SUBID' => $subid], true) ;
    }

    public function listIpv4($subid)
    {
        $rtmp = $this->doGet("list_ipv4", ['SUBID' => $subid], true) ;
        if (is_array($rtmp)) {
            $keys = array_keys($rtmp) ;
            if (isset($keys[0])) {
                return $this->createArrayOfEntity($rtmp[$keys[0]], "IpEntity", array("ip_version" => 4)) ;
            }
        }
        return false ;
    }

    public function listIpv6($subid)
    {
        $rtmp = $this->doGet("list_ipv6", ['SUBID' => $subid]) ;
        if (is_array($rtmp)) {
            $keys = array_keys($rtmp) ;
            if (isset($keys[0])) {
                return $this->createArrayOfEntity($rtmp[$keys[0]], "IpEntity", array("ip_version" => 6)) ;
            }
        }
        return false ;
    }

    public function reverseListIpv6($subid)
    {
        return $this->doGet("reverse_list_ipv6", ['SUBID' => $subid]) ;
    }

    public function neighbors($subid)
    {
        return $this->doGet("neighbors", ['SUBID' => $subid]) ;
    }

    public function getUserData($subid)
    {
        $res = $this->doGet("get_user_data", ['SUBID' => $subid]) ;
        if ($this->code == 200 && property_exists($res, "userdata")) {
            $res->userdata = base64_decode($res->userdata) ;
        }
        return $res ;
    }
    
    public function create($dcid, $vpsplanid, $osid, $opt_params = array())
    {
        $content = ['DCID' => $dcid, 'VPSPLANID' => $vpsplanid, 'OSID' => $osid];
        foreach ($opt_params as $k => $v) {
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
    
    public function restoreSnapshot($subid)
    {
        return $this->doPost("restore_snapshot", ['SUBID' => $subid]) ;
    }
    
    public function reverseSetIpv4($subid, $ip, $entry)
    {
        return $this->doPost("reverse_set_ipv4", ['SUBID' => $subid, 'ip' => $ip, 'entry' => $entry]) ;
    }
    
    public function reverseDefaultIpv4($subid, $ip)
    {
        return $this->doPost("reverse_default_ipv4", ['SUBID' => $subid, 'ip' => $ip]) ;
    }
    
    public function reverseSetIpv6($subid, $ip, $entry)
    {
        return $this->doPost("reverse_set_ipv6", ['SUBID' => $subid, 'ip' => $ip, 'entry' => $entry]) ;
    }
    
    public function reverseDeleteIpv6($subid, $ip)
    {
        return $this->doPost("reverse_delete_ipv6", ['SUBID' => $subid, 'ip' => $ip]) ;
    }
    
    public function labelSet($subid, $label)
    {
        return $this->doPost("label_set", ['SUBID' => $subid, 'label' => $label]) ;
    }
    
    public function restoreBackup($subid, $backupid)
    {
        return $this->doPost("restore_backup", ['SUBID' => $subid, 'BACKUPID' => $backupid]) ;
    }
    
    public function createIpv4($subid, $reboot = true)
    {
        return $this->doPost("create_ipv4", ['SUBID' => $subid, 'reboot' => ($reboot ? 'yes': 'no')]) ;
    }
    
    public function destroyIpv4($subid, $ip)
    {
        return $this->doPost("destroy_ipv4", ['SUBID' => $subid, 'ip' => $ip]) ;
    }
    
    public function osChange($subid, $osid)
    {
        return $this->doPost("os_change", ['SUBID' => $subid, 'OSID' => $osid]) ;
    }
    
    public function upgradePlan($subid, $planid)
    {
        return $this->doPost("upgrade_plan", ['SUBID' => $subid, 'VPSPLANID' => $planid]) ;
    }
    
    public function setUserData($subid, $userdata)
    {
        return $this->doPost("set_user_data", ['SUBID' => $subid, 'userdata' => base64_encode($userdata)]) ;
    }
    
    public function appChange($subid, $appid)
    {
        return $this->doPost("app_change", ['SUBID' => $subid, 'APPID' => $appid]) ;
    }
    
}
