<?php
session_start();
header("Content-type: text/html;charset=utf-8");
mb_internal_encoding("UTF-8");


require 'config.php';
require 'vendor/autoload.php';

$core = new Core\Core();
$core->run();