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

$api = $vultrApi->reservedIpApi() ;

/*
// create(dcid, ip_type)
// see https://www.vultr.com/api/#reservedip_create
$res = $api->create(7, "v4") ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

$res = $api->getList() ;
var_dump($res) ;
printReplyIfError($api, $res) ;

/*
// attach(subid, ip)
// see https://www.vultr.com/api/#reservedip_attach
$res = $api->attach(123456, "123.45.67.89") ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

/*
// detach(subid, ip)
// see https://www.vultr.com/api/#reservedip_detach
$res = $api->detach(123456, "123.45.67.89") ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

/*
// destroy(subid)
// see https://www.vultr.com/api/#reservedip_destroy
// After call destroy(subid) you can receive error:
// bool(false)
// 412
// Unable to destroy reserved IP: Floating IPs must be active for at least one hour before being destroyed<br/><br />

// then wait 1 hour and call destroy(...) again

$res = $api->destroy(123456) ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

