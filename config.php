<?php
require 'environment.php';

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/projeto/");
	$config['dbname'] = 'projeto';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "https://lab-projeto.herokuapp.com/");
	$config['dbname'] = 'lucasp44_projeto';
	$config['host'] = 'br968.hostgator.com.br';
	$config['dbuser'] = 'lucasp44_projeto';
	$config['dbpass'] = 'Rg[L_AH?WNXK';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}