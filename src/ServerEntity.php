<?php

namespace LinkORB\Vultr;

class ServerEntity extends AbstractEntity
{
    protected $subid ;
    protected $os ;
    protected $ram ;
    protected $disk ;
    protected $main_ip ;
    protected $vcpu_count ;
    protected $location ;
    protected $dcid ;
    protected $default_password ;
    protected $date_created ;
    protected $pending_charges ;
    protected $status ;
    protected $cost_per_month ;
    protected $current_bandwidth_gb ;
    protected $allowed_bandwidth_gb ;
    protected $netmask_v4 ;
    protected $gateway_v4 ;
    protected $power_status ;
    protected $server_state ;
    protected $vpsplanid ;
    protected $v6_network ;
    protected $v6_main_ip ;
    protected $v6_network_size ;
    protected $v6_networks = array() ;
    protected $label ;
    protected $internal_ip ;
    protected $kvm_url ;
    protected $auto_backups ;
    protected $tag ;
}
