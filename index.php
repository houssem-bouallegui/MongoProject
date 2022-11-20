<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client;
$db = $client->employes;
$empcol = $db->employes;
///////////////////////////////////////
echo("<h1>Réponse 1 : </h1>");
print_r ('<pre>');	
foreach($db->listCollections() as $col){
	print_r($col);
}
print_r ('</pre>');
//////////////////////////////////////
echo("<h1>Réponse 2 : </h1>");
$cursor = $empcol->find();
print_r ('<pre>');	
foreach($cursor as $doc){
	print_r($doc);}
print_r ('</pre>');
//////////////////////////////////////
echo("<h1>Réponse 3 : </h1>");
$cursor = $empcol->count();
print_r($cursor);
//////////////////////////////////////
echo("<h1>Réponse 4 : </h1>");
$filtre=[];
$option=['sort'=> array('_id' => -1),'limit'=>1];
$cursor = $empcol->find($filtre,$option);

$cursor = $empcol->insertMany([
	['nom' => 'Bouallegui' , 'prenom' => 'HoussemB' , 'prime' => 500],
	['nom' => 'Anoun' , 'prenom' => 'Mohamed' , 'anciennete' => 10]
]);
print_r ('<pre>');	
printf ("Document inserer %d", $cursor->getInsertedCount());
var_dump($cursor->getInsertedIds());
print_r ('</pre>');
//////////////////////////////////////
echo("<h1>Réponse 5 : </h1>");
$regex = new MongoDB\BSON\Regex("^D.*", "i");
$cursor = $empcol->find(
	['prenom' => $regex]
);
print_r ('<pre>');	
foreach($cursor as $doc){
	print_r($doc);}
print_r ('</pre>');
//////////////////////////////////////
echo("<h1>Réponse 6 : </h1>");
$regex = new MongoDB\BSON\Regex("^D.*|.*D$", "i");
$cursor = $empcol->find(
	['prenom' => $regex]
);
print_r ('<pre>');	
foreach($cursor as $doc){
	print_r($doc);}
print_r ('</pre>');
//////////////////////////////////////
echo("<h1>Réponse 7 : </h1>");
$regex = new MongoDB\BSON\Regex("^D[a-z]{5}$", "i");
$cursor = $empcol->find(
	['prenom' => $regex]
);
print_r ('<pre>');	
foreach($cursor as $doc){
	print_r($doc);}
print_r ('</pre>');
//////////////////////////////////////
echo("<h1>Réponse 8 : </h1>");
$filter	= ['anciennete' => ['$gte' => 10] ];
$option=[];
$cursor = $empcol->find($filter,$option);
print_r ('<pre>');	
foreach($cursor as $doc){
	print_r($doc);}
print_r ('</pre>');
//////////////////////////////////////
echo("<h1>Réponse 9 : </h1>");
$filter	= ['adresse.rue' => ['$exists' => true] ];
$option=['projection' => ['nom' => 1 , 'adresse' => 1]];
$cursor = $empcol->find($filter,$option);
print_r ('<pre>');	
foreach($cursor as $doc){
	print_r($doc);}
print_r ('</pre>');
//////////////////////////////////////
echo("<h1>Réponse 10 : </h1>");
$filter	= ['prime' => ['$exists' => true] ];
$option=['$inc' => ['prime' => 200]];
$cursor = $empcol->updateMany($filter,$option);
print_r ('<pre>');	
printf ('Success + 200');
print_r ('</pre>');
//////////////////////////////////////
echo("<h1>Réponse 11 : </h1>");
$filter	= ['anciennete' => ['$exists' => true] ];
$option=['sort' => ['anciennete' => -1] , 'limit' => 10];
$cursor = $empcol->find($filter,$option);
print_r ('<pre>');	
foreach($cursor as $doc){
	print_r($doc);}
print_r ('</pre>');
//////////////////////////////////////
echo("<h1>Réponse 12 : </h1>");
$filter	= ['adresse.ville' => 'Toulouse' ];
$option=['projection' => ['nom' => 1 , 'prenom' => 1 , 'adresse.ville' => 1]];
$cursor = $empcol->find($filter,$option);
print_r ('<pre>');	
foreach($cursor as $doc){
	print_r($doc);}
print_r ('</pre>');
//////////////////////////////////////
echo("<h1>Réponse 13 : </h1>");
$regex = new MongoDB\BSON\Regex("^M.*", "i");
$filter	= ['$and' => [['prenom' => $regex ] , ['$or' => [['adresse.ville' => 'Paris'] , ['adresse.ville' => 'Bordeaux']]]]];
$option=['projection' => ['nom' => 1 , 'prenom' => 1 , 'adresse.ville' => 1]];
$cursor = $empcol->find($filter,$option);
print_r ('<pre>');	
foreach($cursor as $doc){
	print_r($doc);
	}
print_r ('</pre>');



?>