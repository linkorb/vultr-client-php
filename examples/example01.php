<?php

require 'vendor/autoload.php';

use LinkORB\Vultr\Vultr;

$vultrApi = new Vultr("PUT_YOUR_API_KEY_HERE");

$server = $vultrApi->server() ;

// safe (read) queries

// Get All servers

$list = $server->getAll() ;
echo "------------- getAll --------------\n" ;
var_dump($list) ;

// Get servers one by one
/*
foreach($list as $k => $v) {
    echo "------------- getAll(".$k.") --------------\n" ;
    $res = $server->getAll($k) ;
    var_dump($res) ;
    echo "------------- os_change_list(".$k.") --------------\n" ;
    $res = $server->os_change_list($k) ;
    var_dump($res) ;
    echo "------------- app_change_list(".$k.") --------------\n" ;
    $res = $server->app_change_list($k) ;
    var_dump($res) ;
    echo "------------- upgrade_plan_list(".$k.") --------------\n" ;
    $res = $server->upgrade_plan_list($k) ;
    var_dump($res) ;
    echo "------------- list_ipv4(".$k.") --------------\n" ;
    $res = $server->list_ipv4($k) ;
    var_dump($res) ;
    echo "------------- list_ipv6(".$k.") --------------\n" ;
    $res = $server->list_ipv6($k) ;
    var_dump($res) ;
    echo "------------- reverse_list_ipv6(".$k.") --------------\n" ;
    $res = $server->reverse_list_ipv6($k) ;
    var_dump($res) ;
    echo "------------- neighbors(".$k.") --------------\n" ;
    $res = $server->neighbors($k) ;
    var_dump($res) ;
    echo "------------- get_user_data(".$k.") --------------\n" ;
    $res = $server->get_user_data($k) ;
    var_dump($res) ;
    echo "------------- bandwidth(".$k.") --------------\n" ;
    $res = $server->bandwidth($k) ;
    var_dump($res) ;
    echo "------------- reboot(".$k.") --------------\n" ;
    $res = $server->reboot($k) ;
    var_dump($res) ;
    exit(0) ;
}*/

/*$res = $server->create(1, 29, 127) ;
var_dump($res) ;
echo $server->code."\n" ;
echo $server->reply."\n" ;*/

/*$res = $server->destroy(PUT_SERVER_ID_HERE) ;
var_dump($res) ;
echo $server->code."\n" ;
echo $server->reply."\n" ;*/
