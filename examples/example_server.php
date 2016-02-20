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

$list = $server->getList() ;
echo "------------- getList --------------\n" ;
var_dump($list) ;

// Get servers one by one

foreach($list as $k => $v) {
    echo "------------- getList(".$k.") --------------\n" ;
    $res = $server->getList($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    echo "------------- osChangeList(".$k.") --------------\n" ;
    $res = $server->osChangeList($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    echo "------------- appChangeList(".$k.") --------------\n" ;
    $res = $server->appChangeList($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    echo "------------- upgradePlanList(".$k.") --------------\n" ;
    $res = $server->upgradePlanList($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    echo "------------- listIpv4(".$k.") --------------\n" ;
    $res = $server->listIpv4($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    echo "------------- listIpv6(".$k.") --------------\n" ;
    $res = $server->listIpv6($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    echo "------------- reverseListIpv6(".$k.") --------------\n" ;
    $res = $server->reverseListIpv6($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    echo "------------- neighbors(".$k.") --------------\n" ;
    $res = $server->neighbors($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    echo "------------- getUserData(".$k.") --------------\n" ;
    $res = $server->getUserData($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
    echo "------------- bandwidth(".$k.") --------------\n" ;
    $res = $server->bandwidth($k) ;
    var_dump($res) ;
    printReplyIfError($server, $res) ;
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
