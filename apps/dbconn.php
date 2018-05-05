<?php
    $shard0 = "bdt-shard-00-00-cvijy.mongodb.net:27017";
    $shard1 = "bdt-shard-00-01-cvijy.mongodb.net:27017";
    $shard2 = "bdt-shard-00-02-cvijy.mongodb.net:27017";
    $shards = $shard0.','.$shard1.','.$shard2;

    $conUrl = "mongodb://bdt:bdt123!@".$shards.'/bdt?ssl=true&replicaSet=bdt-shard-0&authSource=admin';
//
    $collection = (new MongoDB\Client($conUrl))->bdt->stock;

    $collection->createIndex(['Ticker' => 1]);
?>