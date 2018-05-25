<?php
/// Config untuk Atlas
    // $shard0 = "bdt-shard-00-00-cvijy.mongodb.net:27017";
    // $shard1 = "bdt-shard-00-01-cvijy.mongodb.net:27017";
    // $shard2 = "bdt-shard-00-02-cvijy.mongodb.net:27017";

    // $shards = $shard0.','.$shard1.','.$shard2;

    // $conUrl = "mongodb://bdt:bdt123!@".$shards.'/bdt?ssl=true&replicaSet=bdt-shard-0&authSource=admin';

    // $collection = (new MongoDB\Client($conUrl))->bdt->stock;
///
   
/// Config untuk Localhost
	$shard0 = "localhost:3021";
    $shard1 = "localhost:3022";
    $shard2 = "localhost:3023";

    $shards = $shard0.','.$shard1.','.$shard2;

    $conUrl = "mongodb://RootAdmin:qwe@localhost:3021,localhost:3022,localhost:3023/admin?readPreference=nearest&connectTimeout=10000&uriVersion=2&connection.name=BDT+Clustering&socketTimeout=0&sharded=true&connectionMode=multi&replicaSet=bdt";
    $client = new MongoDB\Client($conUrl);

    $collection = $client->bdt->stock;   

    try{
        $collection->createIndex(['Ticker' => 1]);   
    } catch(Exception $error) {
        echo $error->getMessage();
    }
///
?>