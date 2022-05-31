<?php
session_start();
$conn='mysql:host=sql309.epizy.com;dbname=epiz_31850807_green_life';   
global $db; //declarando como variavel global
try{
    $db = new PDO($conn,'epiz_31850807','0qx7UUwgpucPP');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {  //tratamento de erro
    if($e->getcode()==1049){
        echo "Banco de dados errado.";
    }else{
        echo $e->getMessage;
    }
}



