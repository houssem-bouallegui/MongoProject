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
*/
$cursor = $empcol->insertMany([
	['nom' => 'Bouallegui' , 'prenom' => 'Houssem' , 'prime' => '500'],
	['nom' => 'Anoun' , 'prenom' => 'Mohamed' , 'anciennete' => '10']
]);
print_r ('<pre>');	
printf ("Document inserer %d", $cursor->getInsertedCount());
var_dump($cursor->getInsertedIds());
print_r ('</pre>');
//////////////////////////////////////
echo("<h1>Réponse 5 : </h1>");
$cursor = $empcol->find(
	['prenom': => '/^D.*/']
);
print_r ('<pre>');	
foreach($cursor as $doc){
	print_r($doc);}
print_r ('</pre>');




?>