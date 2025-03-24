<?php

session_start();

if(!isset($_GET["sortval"])||!isset($_SESSION["userid"])){
    echo "NoResult";
    exit();
}


require("../NuSoap/nusoap.php");

$client = new nusoap_client("http://localhost/WEB/server/server.php?wsdl");
$result = $client->call("getGames",array(array("id"=>$_SESSION["userid"],"genre"=>$_GET["sortval"])));

echo $client->getError();

echo json_encode($result);


?>
