<?php

require_once __DIR__.'/vendor/autoload.php';

$app = require __DIR__.'/src/app.php';
require __DIR__.'/config/dev.php';
//require _DIR_.'/config/prod.php';
require __DIR__.'/src/controllers.php';

$app->run();

?>