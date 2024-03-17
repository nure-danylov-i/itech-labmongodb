<?php
require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://127.0.0.1:27017");
$cars = $client->dbforlab->cars;
$cursor = $cars->find([], ['projection' => ['model' => 1]]);

echo "<div id='result'>";
echo "<p>Наявні в цьому пункті пробігу марки автомобілів:";
echo "<ul>";

foreach($cursor as $document)
{
    echo "<li>{$document['model']}</li>";
}

echo "</ul></p>";
echo "</div>";
echo "<script>localStorage.setItem(\"models\", document.getElementById(\"result\").outerHTML);</script>";
