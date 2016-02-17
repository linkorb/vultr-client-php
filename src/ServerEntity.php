<?php

namespace LinkORB\Vultr;

class ServerEntity extends AbstractEntity
{
    public $subid ;
    public $os ;
    public $ram ;
    public $disk ;
    public $main_ip ;
    public $vcpu_count ;
    public $location ;
    public $dcid ;
    public $default_password ;
    public $date_created ;
    public $pending_charges ;
    public $status ;
    public $cost_per_month ;
    public $current_bandwidth_gb ;
    public $allowed_bandwidth_gb ;
    public $netmask_v4 ;
    public $gateway_v4 ;
    public $power_status ;
    public $server_state ;
    public $vpsplanid ;
    public $v6_network ;
    public $v6_main_ip ;
    public $v6_network_size ;
    public $v6_networks = array() ;
    public $label ;
    public $internal_ip ;
    public $kvm_url ;
    public $auto_backups ;
    public $tag ;
}
