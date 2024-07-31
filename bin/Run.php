<?php

// include __DIR__ . '../../vendor/autoload.php';
require __DIR__ . '/../bootstrap.php';


use App\Queue\QueueRunner;

$options = getopt('', ["queue::"]);
$queue = array_key_exists('queue', $options) ? $options['queue'] : null;

$queue = new QueueRunner($queue);
$queue->run();
