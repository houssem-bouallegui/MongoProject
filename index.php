<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client;

$employe = $client->employes;
$empcol = $employe->employes;

$documentlist = $empcol->find(
	['nom' => 'Bouallegui']
	);
foreach($documentlist as $doc){
	var_dump($doc);
}



?>