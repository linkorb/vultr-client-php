<?php

require 'vendor/autoload.php';

use LinkORB\Vultr\Vultr;

function printReplyIfError($api, $res) {
    if($res === false) {
        echo $api->code."\n" ;
        echo $api->reply."\n" ;
    }
}

$vultrApi = new Vultr("PUT_YOUR_API_KEY_HERE");

$api = $vultrApi->snapshotApi() ;

$res = $api->getList() ;
var_dump($res) ;
printReplyIfError($api, $res) ;

/*
// create(subid)
// see https://www.vultr.com/api/#snapshot_create
$res = $api->create(1234567) ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

/*
// destroy(snapshotid)
// see https://www.vultr.com/api/#snapshot_destroy
$res = $api->destroy("12345c67890a1") ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/