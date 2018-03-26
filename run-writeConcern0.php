<?php

require 'listenQueries.php';

$manager = new MongoDB\Driver\Manager();
MongoDB\Driver\Monitoring\addSubscriber(new QueryTimeCollector(__FILE__));

for ($j = 0; $j <= 40; $j++) {
    echo "\nPrepare for bulkwrite j={$j}";
    $bulkWrite = new MongoDB\Driver\BulkWrite(['ordered' => false]);

    for ($i = 0; $i < 9000; $i++) {
        $bulkWrite->update(
            ['_id' => 88888888 + $i],
            [
                '$set' => [
                    'name' => 'gmsantos',
                    'counter' => $i
                ]
            ],
            ['upsert' => true]
        );

        if (0 === $i % 1000 ) {
            echo "\n {$i}...";
        }
    }

    echo "\nExecuting bulkwrite j={$j}";
    $manager->executeBulkWrite(
        'db.some_collection',
        $bulkWrite,
        new MongoDB\Driver\WriteConcern(0)
    );

    echo "\nDone bulkwrite j={$j}";
}
