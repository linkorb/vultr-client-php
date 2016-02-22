<?php

/*
 * This file is part of the VultrAPI library.
 */

namespace LinkORB\Vultr;

use \GuzzleHttp\Client;

class Vultr
{
    /**
     * @var string
     */
    const ENDPOINT = 'https://api.vultr.com/v1/';
    const RPS_LIMIT = 1.9 ; // Actually, in this API rate limit is 2 req/sec, choose 1.9 for omit clock jitter

    /**
     * @var string
     */
    protected $key;
  
    /**
     * @var ClientInterface
     */
    protected $client;
    
    protected $apis = array( 
        'AccountApi', 'AppApi', 'AuthApi', 'BackupApi', 'DnsApi', 'IsoApi', 
        'OsApi', 'PlanApi', 'RegionApi', 'ReservedIpApi', 'ServerApi', 
        'SnapshotApi', 'SshKeyApi', 'StartupScriptApi', 'UserApi'
    ) ;
  
    protected $rate = array (
        'last_call_time' => 0.0,
        'pause_time' => 0.0
    ) ;
  
    /**
     * @param string $key
     */
    public function __construct($key, $rate_limit = self::RPS_LIMIT)
    {
      $this->key = $key ;
      $this->rate['pause_time'] = 1/$rate_limit ; // pause in seconds
      $this->client = new \GuzzleHttp\Client(['base_uri' => self::ENDPOINT]);
    }

    public function __call($name, $args)
    {
        $name = strtolower($name) ;
        foreach($this->apis as $k => $v) {
            if ($name == strtolower($v)) {
                $class = "LinkORB\\Vultr\\".$v ;
                return new $class($this->client, $this->key, $this->rate);
            }
        }
        return false ;
    }
}
