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

$api = $vultrApi->userApi() ;

$res = $api->getList() ;
var_dump($res) ;
printReplyIfError($api, $res) ;

/*
echo "---------- create(user) ----------\n" ;
// create(user)
// see https://www.vultr.com/api/#user_create
use LinkORB\Vultr\UserEntity;
$record = new UserEntity ;
$record->name = 'testuser1' ;
$record->email = 'test75bb1@example.com' ;
$record->api_enabled = "yes" ;
$record->password = "432f5ff6_very_good_password_5be75bb15f79829f" ;
$record->acls = [         
    "manage_users",
    "subscriptions",
    "billing",
    "provisioning"] ;
$res = $api->create($record) ;
var_dump($res) ;
printReplyIfError($api, $res) ;

$res = $api->getList() ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

/*
// update(record)
// see https://www.vultr.com/api/#user_update
// Assume that we want change only 'email' field of user record with userid "12345"

use LinkORB\Vultr\UserEntity;

$record = new UserEntity ;
$record->userid = "12345" ;
$record->email = "test26788@example.com" ;
$res = $api->update($record) ;
var_dump($res) ;
printReplyIfError($api, $res) ;

$res = $api->getList() ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

/*
// delete(userid)
// https://www.vultr.com/api/#user_delete
$res = $api->delete("12345") ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/
