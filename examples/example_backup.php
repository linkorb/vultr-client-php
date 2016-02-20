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

/*
    There is some stranges in api about backups. 
    According to documentation at https://www.vultr.com/api/ 
    we can list existing backups by call:
        /v1/backup/list
    and we can restore backup by call:
        /v1/server/restore_backup 
    also in options for create server call 
        /v1/server/create
    present option 'auto_backups'
    "auto_backups string (optional) 'yes' or 'no'.  If yes, automatic backups will be enabled for this server
    (these have an extra charge associated with them)"
    
    but where is call for create backup from api ???
*/

$api = $vultrApi->backupApi() ;

$res = $api->getList() ;
var_dump($res) ;
printReplyIfError($api, $res) ;
