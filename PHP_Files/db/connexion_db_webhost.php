<?php
define('USER', 'root');
define('PASSWORD', 'sd314hitrerera');
define('DSN', 'mysql:host=localhost;dbname=id8991140_jeuxvideo;charset=UTF8');
try {
    $dbh = new PDO(DSN, USER, PASSWORD);
} catch (PDOException $exception) {
    echo "Erreur ! : " . $exception->getMessage() . "<br/>";
    die();
}
?>