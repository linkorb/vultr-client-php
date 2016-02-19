<?php

namespace LinkORB\Vultr;

class DnsRecordEntity extends AbstractEntity
{
    protected $type ;
    protected $name ;
    protected $data ;
    protected $priority = 0 ;
    protected $ttl = 0 ;
    protected $recordid = 0 ;
}
