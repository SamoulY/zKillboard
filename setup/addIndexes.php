<?php
require_once "../init.php";
$m = new MongoClient();
$db = $m->selectDB("zkillboard");

// apis
echo "\nCreating collection apis ... ";
$apis = $db->createCollection("apis");
echo "Done\n";
echo "Creating index : 'keyID' => 1, 'vCode' => 1, with sparse = 0 and unique = 0 ... ";
$apis->ensureIndex(array('keyID' => 1, 'vCode' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'lastApiUpdate' => 1, with sparse = 0 and unique = 0 ... ";
$apis->ensureIndex(array('lastApiUpdate' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'keyID' => 1, with sparse = 0 and unique = 0 ... ";
$apis->ensureIndex(array('keyID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$apis->ensureIndex(array('killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'errorCode' => 1, with sparse = 1 and unique = 0 ... ";
$apis->ensureIndex(array('errorCode' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";

// battles
echo "\nCreating collection battles ... ";
$battles = $db->createCollection("battles");
echo "Done\n";
echo "Creating index : 'battleID' => 1, with sparse = 0 and unique = 1 ... ";
$battles->ensureIndex(array('battleID' => 1), array("sparse" => 0, "unique" => 1));
echo "Done\n";
echo "Creating index : 'solarSystemID' => 1, 'dttm' => 1, 'options' => 1, with sparse = 0 and unique = 0 ... ";
$battles->ensureIndex(array('solarSystemID' => 1, 'dttm' => 1, 'options' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";

// crestmails
echo "\nCreating collection crestmails ... ";
$crestmails = $db->createCollection("crestmails");
echo "Done\n";
echo "Creating index : 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$crestmails->ensureIndex(array('killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'killID' => 1, 'hash' => 1, with sparse = 0 and unique = 1 ... ";
$crestmails->ensureIndex(array('killID' => 1, 'hash' => 1), array("sparse" => 0, "unique" => 1));
echo "Done\n";
echo "Creating index : 'npcOnly' => 1, with sparse = 1 and unique = 0 ... ";
$crestmails->ensureIndex(array('npcOnly' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'errorCode' => 1, with sparse = 1 and unique = 0 ... ";
$crestmails->ensureIndex(array('errorCode' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'processed' => 1, with sparse = 0 and unique = 0 ... ";
$crestmails->ensureIndex(array('processed' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'processed' => 1, 'killID' => -1, with sparse = 0 and unique = 0 ... ";
$crestmails->ensureIndex(array('processed' => 1, 'killID' => -1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'hash' => 1, with sparse = 0 and unique = 0 ... ";
$crestmails->ensureIndex(array('hash' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'added' => -1, with sparse = 0 and unique = 0 ... ";
$crestmails->ensureIndex(array('added' => -1), array("sparse" => 0, "unique" => 0));
echo "Done\n";

// information
echo "\nCreating collection information ... ";
$information = $db->createCollection("information");
echo "Done\n";
echo "Creating index : 'type' => 1, 'lastApiUpdate' => 1, with sparse = 0 and unique = 0 ... ";
$information->ensureIndex(array('type' => 1, 'lastApiUpdate' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'name' => 1, with sparse = 0 and unique = 0 ... ";
$information->ensureIndex(array('name' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'name' => 1, 'type' => 1, with sparse = 0 and unique = 0 ... ";
$information->ensureIndex(array('name' => 1, 'type' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'id' => 1, with sparse = 0 and unique = 0 ... ";
$information->ensureIndex(array('id' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'id' => 1, with sparse = 0 and unique = 1 ... ";
$information->ensureIndex(array('type' => 1, 'id' => 1), array("sparse" => 0, "unique" => 1));
echo "Done\n";
echo "Creating index : 'regionID' => 1, with sparse = 1 and unique = 0 ... ";
$information->ensureIndex(array('regionID' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'groupID' => 1, with sparse = 1 and unique = 0 ... ";
$information->ensureIndex(array('groupID' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'lastCrestUpdate' => 1, with sparse = 0 and unique = 0 ... ";
$information->ensureIndex(array('lastCrestUpdate' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'allianceID' => 1, with sparse = 1 and unique = 0 ... ";
$information->ensureIndex(array('type' => 1, 'allianceID' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'ticker' => 1, with sparse = 1 and unique = 0 ... ";
$information->ensureIndex(array('type' => 1, 'ticker' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'timeStarted' => 1, with sparse = 1 and unique = 0 ... ";
$information->ensureIndex(array('type' => 1, 'timeStarted' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'timeFinished' => -1, with sparse = 1 and unique = 0 ... ";
$information->ensureIndex(array('type' => 1, 'timeFinished' => -1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'lastCrestUpdate' => 1, 'finished' => 1, with sparse = 1 and unique = 0 ... ";
$information->ensureIndex(array('type' => 1, 'lastCrestUpdate' => 1, 'finished' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'mutual' => 1, 'timeStarted' => -1, with sparse = 1 and unique = 0 ... ";
$information->ensureIndex(array('type' => 1, 'mutual' => 1, 'timeStarted' => -1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'timeStarted' => -1, with sparse = 1 and unique = 0 ... ";
$information->ensureIndex(array('type' => 1, 'timeStarted' => -1), array("sparse" => 1, "unique" => 0));
echo "Done\n";

// itemmails
echo "\nCreating collection itemmails ... ";
$itemmails = $db->createCollection("itemmails");
echo "Done\n";
echo "Creating index : 'dttm' => 1, with sparse = 0 and unique = 0 ... ";
$itemmails->ensureIndex(array('dttm' => 1), array("sparse" => 0, "unique" => 0, "expireAfterSeconds" => 2419200));
echo "Done\n";
echo "Creating index : 'typeID' => 1, 'killID' => -1, with sparse = 0 and unique = 0 ... ";
$itemmails->ensureIndex(array('typeID' => 1, 'killID' => -1), array("sparse" => 0, "unique" => 0));
echo "Done\n";

// killmails
echo "\nCreating collection killmails ... ";
$killmails = $db->createCollection("killmails");
echo "Done\n";
echo "Creating index : 'killID' => 1, with sparse = 0 and unique = 1 ... ";
$killmails->ensureIndex(array('killID' => 1), array("sparse" => 0, "unique" => 1));
echo "Done\n";
echo "Creating index : 'attackerCount' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('attackerCount' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'dttm' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('dttm' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'vGroupID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('vGroupID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.solarSystemID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('system.solarSystemID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.regionID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('system.regionID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.characterID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('involved.characterID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.corporationID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('involved.corporationID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.allianceID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('involved.allianceID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.factionID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('involved.factionID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.shipTypeID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('involved.shipTypeID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.groupID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('involved.groupID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'warID' => 1, with sparse = 1 and unique = 0 ... ";
$killmails->ensureIndex(array('warID' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.factionID' => 1, 'involved.isVictim' => 1, 'killID' => 1, with sparse = 1 and unique = 0 ... ";
$killmails->ensureIndex(array('involved.factionID' => 1, 'involved.isVictim' => 1, 'killID' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.groupID' => 1, 'involved.isVictim' => 1, 'killID' => 1, with sparse = 1 and unique = 0 ... ";
$killmails->ensureIndex(array('involved.groupID' => 1, 'involved.isVictim' => 1, 'killID' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'zkb.totalValue' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('zkb.totalValue' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'sequence' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('sequence' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.security' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('system.security' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'solo' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('solo' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'awox' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('awox' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.shipTypeID' => 1, 'involved.groupID' => 1, 'killID' => -1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('involved.shipTypeID' => 1, 'involved.groupID' => 1, 'killID' => -1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.constellationID' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('system.constellationID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'locationID' => 1, with sparse = 1 and unique = 0 ... ";
$killmails->ensureIndex(array('locationID' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'zkb.points' => 1, with sparse = 0 and unique = 0 ... ";
$killmails->ensureIndex(array('zkb.points' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";

// oneWeek
echo "\nCreating collection oneWeek ... ";
$oneWeek = $db->createCollection("oneWeek");
echo "Done\n";
echo "Creating index : 'killID' => 1, with sparse = 0 and unique = 1 ... ";
$oneWeek->ensureIndex(array('killID' => 1), array("sparse" => 0, "unique" => 1));
echo "Done\n";
echo "Creating index : 'attackerCount' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('attackerCount' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'dttm' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('dttm' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'vGroupID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('vGroupID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.solarSystemID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.solarSystemID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.regionID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.regionID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.characterID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.characterID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.corporationID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.corporationID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.allianceID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.allianceID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.factionID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.factionID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.shipTypeID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.shipTypeID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.groupID' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.groupID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'warID' => 1, with sparse = 1 and unique = 0 ... ";
$oneWeek->ensureIndex(array('warID' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.factionID' => 1, 'involved.isVictim' => 1, 'killID' => 1, with sparse = 1 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.factionID' => 1, 'involved.isVictim' => 1, 'killID' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.groupID' => 1, 'involved.isVictim' => 1, 'killID' => 1, with sparse = 1 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.groupID' => 1, 'involved.isVictim' => 1, 'killID' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'zkb.totalValue' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('zkb.totalValue' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'sequence' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('sequence' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.security' => 1, 'killID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.security' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'solo' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('solo' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'awox' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('awox' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'dttm' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('dttm' => 1), array("sparse" => 0, "unique" => 0, "expireAfterSeconds" => 604800));
echo "Done\n";
echo "Creating index : 'involved.allianceID' => 1, 'involved.characterID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.allianceID' => 1, 'involved.characterID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.allianceID' => 1, 'involved.corporationID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.allianceID' => 1, 'involved.corporationID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.corporationID' => 1, 'involved.characterID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.corporationID' => 1, 'involved.characterID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.allianceID' => 1, 'involved.shipTypeID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.allianceID' => 1, 'involved.shipTypeID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.shipTypeID' => 1, 'involved.allianceID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.shipTypeID' => 1, 'involved.allianceID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.shipTypeID' => 1, 'involved.corporationID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.shipTypeID' => 1, 'involved.corporationID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.shipTypeID' => 1, 'involved.characterID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.shipTypeID' => 1, 'involved.characterID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.shipTypeID' => 1, 'system.solarSystemID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.shipTypeID' => 1, 'system.solarSystemID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.regionID' => 1, 'system.solarSystemID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.regionID' => 1, 'system.solarSystemID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.regionID' => 1, 'involved.characterID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.regionID' => 1, 'involved.characterID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.regionID' => 1, 'involved.corporationID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.regionID' => 1, 'involved.corporationID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.regionID' => 1, 'involved.allianceID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.regionID' => 1, 'involved.allianceID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.regionID' => 1, 'involved.factionID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.regionID' => 1, 'involved.factionID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.regionID' => 1, 'involved.shipTypeID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.regionID' => 1, 'involved.shipTypeID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.regionID' => 1, 'involved.groupID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.regionID' => 1, 'involved.groupID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.solarSystemID' => 1, 'involved.characterID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.solarSystemID' => 1, 'involved.characterID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.solarSystemID' => 1, 'involved.corporationID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.solarSystemID' => 1, 'involved.corporationID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.solarSystemID' => 1, 'involved.allianceID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.solarSystemID' => 1, 'involved.allianceID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.solarSystemID' => 1, 'involved.factionID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.solarSystemID' => 1, 'involved.factionID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.solarSystemID' => 1, 'involved.shipTypeID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.solarSystemID' => 1, 'involved.shipTypeID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'system.solarSystemID' => 1, 'involved.groupID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('system.solarSystemID' => 1, 'involved.groupID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.characterID' => 1, 'involved.corporationID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.characterID' => 1, 'involved.corporationID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.characterID' => 1, 'involved.allianceID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.characterID' => 1, 'involved.allianceID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.characterID' => 1, 'involved.factionID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.characterID' => 1, 'involved.factionID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.characterID' => 1, 'involved.shipTypeID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.characterID' => 1, 'involved.shipTypeID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.characterID' => 1, 'involved.groupID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.characterID' => 1, 'involved.groupID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.corporationID' => 1, 'involved.allianceID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.corporationID' => 1, 'involved.allianceID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.corporationID' => 1, 'involved.factionID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.corporationID' => 1, 'involved.factionID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.corporationID' => 1, 'involved.shipTypeID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.corporationID' => 1, 'involved.shipTypeID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.corporationID' => 1, 'involved.groupID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.corporationID' => 1, 'involved.groupID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.allianceID' => 1, 'involved.factionID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.allianceID' => 1, 'involved.factionID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.allianceID' => 1, 'involved.groupID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.allianceID' => 1, 'involved.groupID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.factionID' => 1, 'involved.shipTypeID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.factionID' => 1, 'involved.shipTypeID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.factionID' => 1, 'involved.groupID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.factionID' => 1, 'involved.groupID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'involved.shipTypeID' => 1, 'involved.groupID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('involved.shipTypeID' => 1, 'involved.groupID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'locationID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('locationID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'categoryID' => 1, with sparse = 0 and unique = 0 ... ";
$oneWeek->ensureIndex(array('categoryID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";

// payments
echo "\nCreating collection payments ... ";
$payments = $db->createCollection("payments");
echo "Done\n";
echo "Creating index : 'paymentApplied' => 1, with sparse = 0 and unique = 0 ... ";
$payments->ensureIndex(array('paymentApplied' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'refID' => 1, with sparse = 0 and unique = 1 ... ";
$payments->ensureIndex(array('refID' => 1), array("sparse" => 0, "unique" => 1));
echo "Done\n";

// prices
echo "\nCreating collection prices ... ";
$prices = $db->createCollection("prices");
echo "Done\n";
echo "Creating index : 'typeID' => 1, with sparse = 0 and unique = 0 ... ";
$prices->ensureIndex(array('typeID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";

// rawmails
echo "\nCreating collection rawmails ... ";
$rawmails = $db->createCollection("rawmails");
echo "Done\n";
echo "Creating index : 'killID' => 1, with sparse = 0 and unique = 1 ... ";
$rawmails->ensureIndex(array('killID' => 1), array("sparse" => 0, "unique" => 1));
echo "Done\n";

// statistics
echo "\nCreating collection statistics ... ";
$statistics = $db->createCollection("statistics");
echo "Done\n";
echo "Creating index : 'type' => 1, 'id' => 1, with sparse = 0 and unique = 1 ... ";
$statistics->ensureIndex(array('type' => 1, 'id' => 1), array("sparse" => 0, "unique" => 1));
echo "Done\n";
echo "Creating index : 'type' => 1, 'id' => 1, 'stats.type' => 1, 'stats.id' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'id' => 1, 'stats.type' => 1, 'stats.id' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'shipsDestroyed' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'shipsDestroyed' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'shipsLost' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'shipsLost' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'iskLost' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'iskLost' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'pointsLost' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'pointsLost' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'pointsDestroyed' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'pointsDestroyed' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'iskDestroyed' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'iskDestroyed' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'overallRank' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('overallRank' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'overallScore' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('overallScore' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'overallScore' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'overallScore' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'id' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('id' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'shipsDestroyedRank' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'shipsDestroyedRank' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'shipsLostRank' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'shipsLostRank' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'iskDestroyedRank' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'iskDestroyedRank' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'iskLostRank' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'iskLostRank' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'pointsDestroyedRank' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'pointsDestroyedRank' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'pointsLostRank' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'pointsLostRank' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'overallRank' => 1, with sparse = 0 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'overallRank' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentShipsDestroyed' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentShipsDestroyed' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentShipsDestroyedRank' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentShipsDestroyedRank' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentShipsLost' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentShipsLost' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentShipsLostRank' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentShipsLostRank' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentIskDestroyed' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentIskDestroyed' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentIskDestroyedRank' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentIskDestroyedRank' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentIskLost' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentIskLost' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentIskLostRank' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentIskLostRank' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentPointsDestroyed' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentPointsDestroyed' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentPointsDestroyedRank' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentPointsDestroyedRank' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentPointsLost' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentPointsLost' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentPointsLostRank' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentPointsLostRank' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentOverallScore' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentOverallScore' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";
echo "Creating index : 'type' => 1, 'recentOverallRank' => 1, with sparse = 1 and unique = 0 ... ";
$statistics->ensureIndex(array('type' => 1, 'recentOverallRank' => 1), array("sparse" => 1, "unique" => 0));
echo "Done\n";

// storage
echo "\nCreating collection storage ... ";
$storage = $db->createCollection("storage");
echo "Done\n";
echo "Creating index : 'locker' => 1, with sparse = 0 and unique = 1 ... ";
$storage->ensureIndex(array('locker' => 1), array("sparse" => 0, "unique" => 1));
echo "Done\n";

// tickets
echo "\nCreating collection tickets ... ";
$tickets = $db->createCollection("tickets");
echo "Done\n";
echo "Creating index : 'characterID' => 1, with sparse = 0 and unique = 0 ... ";
$tickets->ensureIndex(array('characterID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'dttm' => 1, with sparse = 0 and unique = 0 ... ";
$tickets->ensureIndex(array('dttm' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'dttm' => 1, 'characterID' => 1, with sparse = 0 and unique = 0 ... ";
$tickets->ensureIndex(array('dttm' => 1, 'characterID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'parentID' => 1, 'dttm' => 1, with sparse = 0 and unique = 0 ... ";
$tickets->ensureIndex(array('parentID' => 1, 'dttm' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";

// warmails
echo "\nCreating collection warmails ... ";
$warmails = $db->createCollection("warmails");
echo "Done\n";
echo "Creating index : 'warID' => 1, with sparse = 0 and unique = 0 ... ";
$warmails->ensureIndex(array('warID' => 1), array("sparse" => 0, "unique" => 0));
echo "Done\n";
echo "Creating index : 'warID' => 1, 'killID' => 1, with sparse = 0 and unique = 1 ... ";
$warmails->ensureIndex(array('warID' => 1, 'killID' => 1), array("sparse" => 0, "unique" => 1));
echo "Done\n";

