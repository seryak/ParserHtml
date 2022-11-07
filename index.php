<?php

include_once 'autoload.php';

$app = new \Seryak\TestParser\App\Core\App();

try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}