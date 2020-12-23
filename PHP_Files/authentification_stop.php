<?php
session_destroy();
unset($_SESSION);
header("Location:index.php?choix=accueil");
exit();
?>

