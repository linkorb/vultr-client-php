<?php

namespace LinkORB\Vultr;

class UserEntity extends AbstractEntity
{
    protected $userid ;
    protected $name ;
    protected $email ;
    protected $api_enabled ;
    protected $acls = array() ;
    protected $password ;
}