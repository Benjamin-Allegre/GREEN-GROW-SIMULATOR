<?php
$servername = "127.0.0.1";
$dbname = 'greengrow';
$username = "root";
$password = "";

try {
    $db = new PDO(
        "mysql:host=$servername;dbname=$dbname;charset=utf8",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

} catch(PDOException $e){
    echo "Erreur de connexion à la base de données.";
}
?>