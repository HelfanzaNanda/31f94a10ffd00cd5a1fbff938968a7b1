#!/usr/bin/env php
<?php
// bin/doctrine

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

// use src\Utils\ORM;

// Adjust this path to your actual bootstrap.php
require __DIR__ . '/../bootstrap.php';

// print_r(__DIR__ . '/../src/Utils/');
// $entityManager = ORM::manager();


ConsoleRunner::run((new SingleManagerProvider($entityManager)));