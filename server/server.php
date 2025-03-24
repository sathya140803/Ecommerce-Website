<?php

require("../NuSoap/nusoap.php");

$server = new soap_server();
$server->debug_flag=false;
$server->configureWSDL("Games","http://www.getgames.com");
$server->wsdl->schemaTargetNamespace = "http://www.getgames.com";

$server->wsdl->addComplexType(
    "game",
    "complexType",
    "struct",
    "sequence",
    "",
    array(
        "game_id"=>array("name"=>"game_id","type"=>"xsd:string"),
        "game_title"=>array("name"=>"game_title","type"=>"xsd:string"),
        "category_id"=>array("name"=>"category_id","type"=>"xsd:string"),
        "game_description"=>array("name"=>"game_description","type"=>"xsd:string"),
        "game_image1"=>array("name"=>"gname","game_image1"=>"xsd:string")
    )
);

$server->wsdl->addComplexType(
    "games",
    "complexType",
    "array",
    "",
    "SOAP-ENC:Array",
    array(),
    array(array(
        "ref"=>"SOAP-ENC:arrayType",
        "wsdl:arrayType"=>"tns:game[]"
    )),
    "tns:game"
);

$server->register("getGames",array("id"=>"xsd:integer","genre"=>"xsd:string"),array("games"=>"tns:games"),"http://www.getgames.com");


function getGames($values){
    $id = $values["id"];
    $genre = $values["genre"];
    
    require("../PHPScripts/dbInit.php");

    $sql = "SELECT g.game_id, g.game_title, g.category_id, g.game_description, game_image1
                    FROM games g
                    INNER JOIN gamesowned owg
                    WHERE owg.gameID = g.game_id AND owg.userID = ". $id;
            
    if($genre != "None"){
        $sql .= " AND g.category_id = " . '"' . $genre . '"';
    }

    $games = array();

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $games[] = array(
                "game_id"=>$row["game_id"],
                "game_title"=>$row["game_title"],
                "category_id"=>$row["category_id"],
                "game_description"=>$row["game_description"],
                "game_image1"=>$row["game_image1"]
            );
        }
    } 
    $conn->close();
    return $games;
    
}

$server->service(file_get_contents("php://input"));

?>