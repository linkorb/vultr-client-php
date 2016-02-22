<?php

namespace LinkORB\Vultr;

abstract class AbstractApi
{
    /**
     * @var string
     */
    protected $key;
  
    /**
     * @var ClientInterface
     */
    protected $client;

    public $code ;
    public $reply ;

    protected $node ;
    
    protected $rate ;

    
    /**
     * @param GuzzleHttp\Client $client
     * @param string            $key
     */
    public function __construct(\GuzzleHttp\Client $client, $key, &$rate)
    {
        $this->client = $client;
        $this->key = $key;
        $this->rate = &$rate ;
    }
    
    protected function respectRateLimit() {
        $cur_time = microtime(true) ;
        $delta_time = $cur_time - $this->rate['last_call_time'] ;
        if ($delta_time < $this->rate['pause_time']) {
            usleep(($this->rate['pause_time'] - $delta_time)*1000000) ;
        }
        $this->rate['last_call_time'] = microtime(true) ;
    }
    

    protected function doGet($name, $content = array(), $assoc = false) {
        $res = false ;
        $this->code = 0 ;
        $this->respectRateLimit() ;
        try {
            if (sizeof($content) > 0) {
                $rtmp = $this->client->get(sprintf('%s/%s?api_key=%s&%s', $this->node, $name, $this->key, http_build_query($content)), 
                    ['http_errors' => false]);
            } else {
                $rtmp = $this->client->get(sprintf('%s/%s?api_key=%s', $this->node, $name, $this->key), 
                    ['http_errors' => false]);
            }
            $res = $this->getResult($rtmp, $assoc) ;
        } catch(\Exception $e) { } ;
        return $res ;
    }

    protected function doPost($name, $content, $assoc = false) {
        $res = false ;
        $this->code = 0 ;
        $this->respectRateLimit() ;
        try {
            $rtmp = $this->client->request("POST", sprintf('%s/%s?api_key=%s', $this->node, $name, $this->key), 
                ['form_params' => $content, 'http_errors' => false]);
            $res = $this->getResult($rtmp, $assoc) ;
        } catch(\Exception $e) { } ;
        return $res ;
    }

    protected function getResult($res, $assoc = false)
    {
        $this->code = $res->getStatusCode() ;
        $this->reply = $res->getBody()->getContents(); ;
        if ($this->code == 200) {
            if (strlen($this->reply) == 0) {
                // Empty body, but result 200
                return true ;
            } else {
                return json_decode($this->reply, $assoc) ;
            }
        } else {
            return false ;
        }
    }
    
    protected function createArrayOfEntity($a, $entity, $add = array()) {
        $res = array() ;
        $class = "LinkORB\\Vultr\\".$entity ;
        if ($a === false) {
            $res = false ;
        } elseif (is_array($a)) {
            foreach ($a as $k => $v) {
                $res[$k] = new $class(array_merge($v, $add)) ;
            }
        }
        return $res ;
    }
}
