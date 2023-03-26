<?php
/**
 * ;conexion pdo to dbb
 */
function pdo(){
    // etape 1 creation de variable de conexion
$serveur = "localhost";
$dbname ="escci_app_student";
$login = "root";
$password ="";

// 

try {
    $pdo = new PDO("mysql:host=$serveur;dbname=$dbname", $login, $password, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        // Recuperer datas sous forme tableau assciatif
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        //voir les erreurs
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
return $pdo;
} catch(PDOException $e){
    echo "Erreur de Connection : ".$e->getMessage();
}
}