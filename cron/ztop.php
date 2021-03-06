#!/usr/bin/php5
<?php

require_once '../init.php';

$redisQueues = [];
$priorKillLog = 0;

$deltaArray = [];

$iterations = 0;
while ($iterations++ <= 1200) {
    ob_start();
    $infoArray = [];

    $isHardened = $redis->ttl("zkb:isHardened");
    if ($isHardened > 0) {
	addInfo('seconds remaining in Cached/Hardened Mode', $isHardened);
        addInfo('', 0);
    }

    $queues = $redis->sMembers('queues');
    foreach ($queues as $queue) {
        $redisQueues[$queue] = true;
    }
    ksort($redisQueues);

    foreach ($redisQueues as $queue => $v) {
        addInfo($queue, $redis->lLen($queue));
    }

    addInfo('', 0);

    addInfo('Kills remaining to be fetched.', $mdb->count('crestmails', ['processed' => false]));
    $killsLastHour = new RedisTtlCounter('killsLastHour', 3600);
    addInfo('Kills last hour', $killsLastHour->count());
    addInfo('Total Kills', $redis->get('zkb:totalKills'));
    addInfo('Top killID', $mdb->findField('killmails', 'killID', [], ['killID' => -1]));

    addInfo('', 0);
    addInfo('Api KillLogs to check', $redis->zCount('tqApiChars', 0, time()));
    addInfo("Api KeyInfos to check", $redis->zCount('tqApis', 0, time()));
    addInfo('Char/Corp Apis', $redis->zCard('tqApiChars'));
    addInfo('Valid Apis', $redis->zCard('tqApis'));

    addInfo('', 0);
    $visitors = new RedisTtlCounter('ttlc:visitors', 300);
    addInfo('Unique IPs in last 5 minutes', $visitors->count());
    $requests = new RedisTtlCounter('ttlc:requests', 300);
    addInfo('Requests in last 5 minutes', $requests->count());

    addInfo('', 0);
    $crestSuccess = new RedisTtlCounter('ttlc:CrestSuccess', 300);
    addInfo('Successful CREST calls in last 5 minutes', $crestSuccess->count());
    $crestFailure = new RedisTtlCounter('ttlc:CrestFailure', 300);
    addInfo('Failed CREST calls in last 5 minutes', $crestFailure->count());

    addInfo('', 0);
    $xmlSuccess = new RedisTtlCounter('ttlc:XmlSuccess', 300);
    addInfo('Successful XML calls in last 5 minutes', $xmlSuccess->count());
    $xmlFailure = new RedisTtlCounter('ttlc:XmlFailure', 300);
    addInfo('Failed XML calls in last 5 minutes', $xmlFailure->count());

    $info = $redis->info();
    $mem = $info['used_memory_human'];

    $stats = $mdb->getDb()->command(['dbstats' => 1]);
    $dataSize = number_format($stats['dataSize'] / (1024 * 1024 * 1024), 2);
    $storageSize = number_format($stats['storageSize'] / (1024 * 1024 * 1024), 2);

    $memory = getSystemMemInfo();
    $memTotal = number_format($memory['MemTotal'] / (1024 * 1024), 2);
    $memUsed = number_format(($memory['MemTotal'] - $memory['MemFree'] - $memory['Cached']) / (1024 * 1024), 2);

    $maxLen = 0;
    foreach ($infoArray as $i) {
        foreach ($i as $key => $value) {
            $maxLen = max($maxLen, strlen("$value"));
        }
    }

    $cpu = exec("top -d 0.5 -b -n2 | grep \"Cpu(s)\"| tail -n 1 | awk '{print $2 + $4}'");
    echo exec('date') . " CPU: $cpu% Load: " . Load::getLoad() . "  Memory: ${memUsed}G/${memTotal}G  Redis: $mem  TokuDB: ${storageSize}G / ${dataSize}G\n";
    echo "\n";
    foreach ($infoArray as $i) {
        foreach ($i as $name => $count) {
            if (trim($name) == '') {
                echo "\n";
                continue;
            }
            while (strlen($count) < (20 + $maxLen)) {
                $count = ' '.$count;
            }
            echo "$count $name\n";
        }
    }
    $output = ob_get_clean();
    file_put_contents("${baseDir}/public/ztop.txt", $output);
    sleep(3);
}

function addInfo($text, $number)
{
    global $infoArray, $deltaArray;
    $prevNumber = (int) @$deltaArray[$text];
    $delta = $number - $prevNumber;
    $deltaArray[$text] = $number;

    if ($delta > 0) {
        $delta = "+$delta";
    }
    $dtext = $delta == 0 ? '' : "($delta)";
    $infoArray[] = ["$text $dtext" => number_format($number, 0)];
}

function getSystemMemInfo()
{
    $data = explode("\n", file_get_contents('/proc/meminfo'));
    $meminfo = array();
    foreach ($data as $line) {
        if ($line == '') {
            continue;
        }
        list($key, $val) = explode(':', $line);
        $meminfo[$key] = trim($val);
    }

    return $meminfo;
}
