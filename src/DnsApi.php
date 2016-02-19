<?php

namespace LinkORB\Vultr;

class DnsApi extends AbstractApi
{

    public function __construct(\GuzzleHttp\Client $client, $key, &$rate)
    {
        parent::__construct($client, $key, $rate) ;
        $this->node = 'dns' ;
    }
    
    public function getList()
    {
        $rtmp = $this->doGet("list", [], true) ;
        return $this->createArrayOfEntity($rtmp, "DomainEntity") ;
    }
    
    public function createDomain($domain, $ip)
    {
        return $this->doPost("create_domain", ['domain' => $domain, 'serverip' => $ip]) ;
    }

    public function deleteDomain($domain)
    {
        return $this->doPost("delete_domain", ['domain' => $domain]) ;
    }
    
    public function records($domain)
    {
        $rtmp = $this->doGet("records", ['domain' => $domain], true) ;
        return $this->createArrayOfEntity($rtmp, "DnsRecordEntity") ;        
    }

    public function createRecord($domain, $rec)
    {
        if (is_object($rec) && ($rec instanceof DnsRecordEntity)) {
            $content = array('domain' => $domain, 'name' => $rec->name, 'data' => $rec->data) ;
            if ($rec->priority > 0) {
                $content['priority'] = $rec->priority ;
            }
            if ($rec->ttl > 0) {
                $content['ttl'] = $rec->ttl ;
            }
            return $this->doPost("create_record", $content) ;
        } else {
            $this->code = -1 ;
            $this->reply = "Invalid 2nd parameter type, must be DnsRecordEntity" ;
            return false ;
        }
    }
    
    public function deleteRecord($domain, $recid)
    {
        return $this->doPost("delete_record", ['domain' => $domain, 'RECORDID' => $recid]) ;
    }
    
    public function updateRecord($domain, $rec)
    {
        if (is_object($rec) && ($rec instanceof DnsRecordEntity)) {
            if ($rec->recordid > 0) {
                $content = array('domain' => $domain, 'RECORDID' => $rec->recordid) ;
                if (strlen($rec->data) > 0) {
                    $content['data'] = $rec->data ;
                }
                if (strlen($rec->name) > 0) {
                    $content['name'] = $rec->name ;
                }
                if ($rec->priority > 0) { 
                    $content['priority'] = $rec->priority ;
                }
                if ($rec->ttl > 0) {
                    $content['ttl'] = $rec->ttl ;
                }
                return $this->doPost("create_record", $content) ;
            } else {
                $this->reply = "Invalid rec->recordid value" ;
            }
        } else {
            $this->reply = "Invalid 2nd parameter type, must be DnsRecordEntity" ;
        }
        $this->code = -1 ;
        return false ;
    }

}
