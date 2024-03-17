<?php
require_once __DIR__ . "/vendor/autoload.php";

$date = new DateTime($_REQUEST['date']);
$timestamp = $date->getTimestamp();

$client = new MongoDB\Client("mongodb://127.0.0.1:27017");
$rent = $client->dbforlab->rent;
$result = $rent->find(['dateStart' => ['$lt' => (int)$timestamp]], ['projection' => ['cost' => 1]]);

echo "<div id='result'>";
if (!$result->isDead())
{
    foreach ($result as $document)
    {
        $sum += $document['cost'];
    }
    
    echo "Станом на {$_REQUEST['date']} отримано дохід у {$sum} ";
}
else
{
    echo "Станом на {$_REQUEST['date']} доходу не було отримано";
}
echo "</div>";

echo "<script>localStorage.setItem(\"{$_REQUEST['date']}\", document.getElementById(\"result\").outerHTML);</script>";
