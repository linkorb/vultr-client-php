<?php

namespace LinkORB\Vultr;

class PlanEntity extends AbstractEntity
{
    protected $vpsplanid ;
    protected $name ;
    protected $vcpu_count ;
    protected $ram ;
    protected $disk ;
    protected $bandwidth ;
    protected $price_per_month ;
    protected $windows ;
    protected $plan_type ;
    protected $available_location = array() ;
}