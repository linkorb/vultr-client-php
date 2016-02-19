<?php

require 'vendor/autoload.php';

use LinkORB\Vultr\Vultr;

function printReplyIfError($api, $res) {
    if($res === false) {
        echo $server->code."\n" ;
        echo $server->reply."\n" ;
    }
}

$vultrApi = new Vultr("PUT_YOUR_API_KEY_HERE");

$api = $vultrApi->authApi() ;

$res = $api->info() ;
var_dump($res) ;
printReplyIfError($api, $res) ;
