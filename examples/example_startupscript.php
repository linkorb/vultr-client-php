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

$api = $vultrApi->startupScriptApi() ;

$res = $api->getList() ;
var_dump($res) ;
printReplyIfError($api, $res) ;

/*
// create(name, script, type) 
// see https://www.vultr.com/api/#startupscript_create
$res = $api->create("test_script2", "#!/bin/bash\necho hello world > /root/hello", "boot") ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

/*
// update(record)
// see https://www.vultr.com/api/#startupscript_update
// Assume that we want change only 'script' field of startupscript record with scriptid "12345"

use LinkORB\Vultr\StartupScriptEntity;

$rec = new StartupScriptEntity ;
$rec->scriptid = "12345" ;
$rec->script="#!/bin/bash\necho hello universe > /root/hello" ;
$res = $api->update($rec) ;
var_dump($res) ;
printReplyIfError($api, $res) ;

$res = $api->getList() ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

/*
// destroy(scriptid)
// see https://www.vultr.com/api/#startupscript_destroy
$res = $api->destroy("12345") ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/
