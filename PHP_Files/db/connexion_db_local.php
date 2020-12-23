<?php
define('USER', 'root');
define('PASSWORD', '');
define('DSN', 'mysql:host=localhost;dbname=jeuxvideo;charset=UTF8');
try {
    $dbh = new PDO(DSN, USER, PASSWORD);
} catch (PDOException $exception) {
    echo "Erreur ! : " . $exception->getMessage() . "<br/>";
    die();
}
?>




