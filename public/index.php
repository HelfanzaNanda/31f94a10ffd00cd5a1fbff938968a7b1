<?php


// phpinfo();
// load composer dependencies
require '../vendor/autoload.php';


// // Load our helpers
require_once '../src/Utils/helpers.php';

// require_once '../bootstrap.php';


// Load our custom routes
require_once '../routes/index.php';

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::enableMultiRouteRendering(false);
// Start the routing
SimpleRouter::start();