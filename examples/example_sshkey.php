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

$api = $vultrApi->sshKeyApi() ;

$res = $api->getList() ;
var_dump($res) ;
printReplyIfError($api, $res) ;

/*
// create(name, key) - key is SSH public key
// see https://www.vultr.com/api/#sshkey_create
$res = $api->create("test_key01", "ssh-dss ...== test@example.com") ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

/*
// update(record)
// see https://www.vultr.com/api/#sshkey_update
// Assume that we want change only 'name' field of sshkey record with sshkeyid "12a345b678c90"

use LinkORB\Vultr\SshKeyEntity;

$rec = new SshKeyEntity ;
$rec->sshkeyid = "12a345b678c90" ;
$rec->name = "new_name_for_test_key" ;
$res = $api->update($rec) ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

/*
// destroy(sshkeyid)
// see https://www.vultr.com/api/#sshkey_destroy
$res = $api->destroy("12a345b678c90") ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/