<?php
require_once __DIR__ . "/vendor/autoload.php";

$mileage = $_REQUEST['mileage'];

$client = new MongoDB\Client("mongodb://127.0.0.1:27017");
$cars = $client->dbforlab->cars;
$result = $cars->find(['mileage' => ['$lt' => (int)$mileage]]);

//print_r($result[0]);

echo "<div id='result'>";
if (!$result->isDead())
{
    echo "<p>Автомобілі з пробігом, меншим за {$mileage}:</p>";
    echo "<table border='1'>";
    echo "<tr><th>Назва автомобіля</th><th>Рік випуску</th><th>Пробіг</th><th>Стан</th></tr>";
    
    foreach ($result as $document)
    {
        echo "<tr><td>{$document['model']}</td><td>{$document['year']}</td><td>{$document['mileage']}</td><td>{$document['state']}</td></tr>";
    }
    echo "</table>";
}
else
{
    echo "За заданими параметрами немає результатів.";
}
echo "</div>";
echo "<script>localStorage.setItem(\"{$_REQUEST['mileage']}\", document.getElementById(\"result\").outerHTML);</script>";


