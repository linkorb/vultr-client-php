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

$api = $vultrApi->dnsApi() ;

echo "---------- getList() ----------\n" ;
$res = $api->getList() ;
var_dump($res) ;
printReplyIfError($api, $res) ;

/*
echo "---------- createDomain(domain, ip) ----------\n" ;
$res = $api->createDomain('test01.info', 'PUT_YOUR_SERVER_IP_HERE') ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

echo "---------- records(domain) ----------\n" ;
$res = $api->records('test01.info') ;
var_dump($res) ;
printReplyIfError($api, $res) ;

/*
echo "---------- createRecord(record) ----------\n" ;
use LinkORB\Vultr\DnsRecordEntity;
$record = new DnsRecordEntity ;
$record->type = 'A' ; // type of DNS record (A, AAAA, CNAME, MX, SRV, etc)
$record->name = 'subdomain1' ;
$record->data = '127.0.0.1' ;
//$record->ttl = 3600 ; // optional
//$record->priority = 10 // (only required for MX and SRV) Priority of this record
$res = $api->createRecord('test01.info', $record) ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

/*
echo "---------- deleteRecord(domain, id) ----------\n" ;
// record id can be found in DnsRecordEntity->recordid field (see result of records() call)
$res = $api->deleteRecord('test01.info', PUT_RECORD_ID_HERE) ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

/*
echo "---------- updateRecord(domain, record) ----------\n" ;
// for update record we need valid DnsRecordEntity->recordid and DnsRecordEntity->type fields
// in follow code:
// 1. create record for test domain (we assume that the domain was created earlier by calling createDomain(...))
// 2. get list of records
// 3. find our record in this list
// 4. update this record

use LinkORB\Vultr\DnsRecordEntity;

$record = new DnsRecordEntity ;
$record->type = 'A' ;
$record->name = 'subdomain-for-update' ;
$record->data = '127.0.0.1' ;
$res = $api->createRecord('test01.info', $record) ;
if (!$res) {
    echo "Something wrong in createRecord\n" ;
    exit(1) ;
}

$res = $api->records('test01.info') ;
if (!$res) {
    echo "Something wrong in get list of records\n" ;
    exit(1) ;
}

foreach ($res as $k => $v) {
    if ($v->name == 'subdomain-for-update') {
        // record found
        $rec_for_update = $v ;
        var_dump($rec_for_update) ;
        $rec_for_update->data = '127.0.0.2' ;
        $res = $api->updateRecord('test01.info', $rec_for_update) ;
        var_dump($res) ;
        printReplyIfError($api, $res) ;
        exit(0) ;
    }
}
*/

/*
echo "---------- deleteRecord(domain, record_id) ----------\n" ;
$res = $api->deleteRecord('test01.info', 1234567) ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

/*
echo "---------- deleteDomain(domain) ----------\n" ;
$res = $api->deleteDomain('test01.info') ;
var_dump($res) ;
printReplyIfError($api, $res) ;
*/

