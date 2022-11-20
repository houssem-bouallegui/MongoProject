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
/*$filtre=[];
$option=['sort'=> array('_id' => -1),'limit'=>1];
$cursor = $empcol->find($filtre,$option);

$cursor = $empcol->insertMany([
	['nom' => 'Bouallegui' , 'prenom' => 'HoussemB' , 'prime' => '500'],
	['nom' => 'Anoun' , 'prenom' => 'Mohamed' , 'anciennete' => '10']
]);
print_r ('<pre>');	
printf ("Document inserer %d", $cursor->getInsertedCount());
var_dump($cursor->getInsertedIds());
print_r ('</pre>');*/
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
$filter	= ["anciennete" => ['$gt' => "10"]];
$option=[];
$cursor = $empcol->find($filter,$option);
print_r ('<pre>');	
foreach($cursor as $doc){
	print_r($doc);}
print_r ('</pre>');
?>