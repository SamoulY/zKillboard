<?php

class CrestTools
{
    public static function getJSON($url)
    {
        return json_decode(self::curlFetch($url), true);
    }

    public static function curlFetch($url)
    {
        global $baseAddr;

	$crestSuccess = new RedisTtlCounter('ttlc:CrestSuccess', 300);
	$crestFailure = new RedisTtlCounter('ttlc:CrestFailure', 300);
	$errorCodes = [403, 404, 415, 500];

        $numTries = 0;
        $httpCode = null;
        do {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "Crest Fetcher for https://$baseAddr");
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout in seconds
            $body = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpCode == 200) {
		$crestSuccess->add(uniqid());
                return $body;
            }
	    $crestFailure->add(uniqid());

	    if (in_array($httpCode, $errorCodes)) return $httpCode;

            ++$numTries;
            sleep(1);
        } while ($httpCode != 200 && $numTries <= 3);
        Log::log("Gave up on $url");

        return $httpCode;
    }

    public static function fetch($id, $hash = null)
    {
        global $mdb;

        // Do we already have this mail?
        $mail = $mdb->findDoc('rawmails', ['killID' => (int) $id]);
        if ($mail != null) {
            return $mail;
        }

        // Nope, don't have it, go fetch
        if ($hash == null) {
            throw new Exception('rawmail not on record, must provide a hash');
        }
        $url = "https://public-crest.eveonline.com/killmails/$id/$hash/";

        return self::getJSON($url);
    }
}
