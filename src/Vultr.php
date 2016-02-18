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

    /**
     * @var string
     */
    protected $key;
  
    /**
     * @var ClientInterface
     */
    protected $client;
  
    /**
     * @param string $key
     */
    public function __construct($key)
    {
      $this->key = $key ;
      $this->client = new \GuzzleHttp\Client(['base_uri' => self::ENDPOINT]);
    }

    public function serverApi()
    {
        return new ServerApi($this->client, $this->key);
    }
      
 
}
