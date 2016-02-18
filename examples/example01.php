<?php

require 'vendor/autoload.php';

use LinkORB\Vultr\Vultr;


function printReplyIfError($server, $res) {
    if($res === false) {
        echo $server->code."\n" ;
        echo $server->reply."\n" ;
    }
}

$vultrApi = new Vultr("PUT_YOUR_API_KEY_HERE");

$server = $vultrApi->serverApi() ;

// safe (read) queries

// Get All servers

$list = $server->getAll() ;
echo "------------- getAll --------------\n" ;
var_dump($list) ;
usleep(600000) ; // 0.6 sec

// Get servers one by one

foreach($list as $k => $v) {
    echo "------------- getAll(".$k.") --------------\n" ;
    $res = $server->getAll($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    usleep(600000) ; // 0.6 sec
    echo "------------- osChangeList(".$k.") --------------\n" ;
    $res = $server->osChangeList($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    usleep(600000) ; // 0.6 sec
    echo "------------- appChangeList(".$k.") --------------\n" ;
    $res = $server->appChangeList($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    usleep(600000) ; // 0.6 sec
    echo "------------- upgradePlanList(".$k.") --------------\n" ;
    $res = $server->upgradePlanList($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    usleep(600000) ; // 0.6 sec
    echo "------------- listIpv4(".$k.") --------------\n" ;
    $res = $server->listIpv4($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    usleep(600000) ; // 0.6 sec
    echo "------------- listIpv6(".$k.") --------------\n" ;
    $res = $server->listIpv6($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    usleep(600000) ; // 0.6 sec
    echo "------------- reverseListIpv6(".$k.") --------------\n" ;
    $res = $server->reverseListIpv6($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    usleep(600000) ; // 0.6 sec
    echo "------------- neighbors(".$k.") --------------\n" ;
    $res = $server->neighbors($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    usleep(600000) ; // 0.6 sec
    echo "------------- getUserData(".$k.") --------------\n" ;
    $res = $server->getUserData($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    usleep(600000) ; // 0.6 sec
    echo "------------- bandwidth(".$k.") --------------\n" ;
    $res = $server->bandwidth($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    usleep(600000) ; // 0.6 sec
}


/*echo "------------- reboot(".$k.") --------------\n" ;
$res = $server->reboot(PUT_SERVER_ID_HERE) ;
var_dump($res) ;
exit(0) ;*/

/*$res = $server->create(1, 29, 127) ;
var_dump($res) ;
echo $server->code."\n" ;
echo $server->reply."\n" ;*/

/*$res = $server->destroy(PUT_SERVER_ID_HERE) ;
var_dump($res) ;
echo $server->code."\n" ;
echo $server->reply."\n" ;*/
