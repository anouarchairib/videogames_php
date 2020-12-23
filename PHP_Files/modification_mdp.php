<?php
$password = htmlspecialchars($_POST['mdp']);
$npassword = htmlspecialchars($_POST['nmdp']);
$c_password = htmlspecialchars($_POST['cmdp']);
if ($npassword !== $c_password) {
    header('Location:index.php?choix=parametre-compte&msssg=err_nmdp');
}
$id = $_GET['id'];
?>
<?php
$sql = "SELECT password FROM membre WHERE password LIKE :password";
$sth = $dbh->prepare($sql);
$sth->bindvalue(':password', $password);
$les_membres = $sth->fetch(PDO::FETCH_ASSOC);
$requete_correcte = $sth->execute();
if ($requete_correcte === FALSE) {
    echo("Erreur : la requete SQL est incorrecte. <br/>");
} else {
    $les_membres = $sth->fetch(PDO::FETCH_ASSOC);
    if (($_POST['nmdp'] === $_POST['cmdp'] ) && ($les_membres['password'] === $password)) {
$sql = "UPDATE membre" . " SET password=:npassword". " WHERE id=:id ";
        $sth = $dbh->prepare($sql);
        $sth->bindvalue(':id', $id);
        $sth->bindvalue(':npassword', $npassword);
        $requete_correcte = $sth->execute();
        if ($requete_correcte === FALSE) {
            echo("Erreur: la requete SQL est incorrecte. <br/>");
        } else {
            $nb_lignes_modifiees = $sth->rowCount();
            if ($nb_lignes_modifiees === 1) {
                header('Location:index.php?choix=parametre-compte&msssg=reussite');
            } elseif ($nb_lignes_modifiees === 0) {
                echo("Requete SQL syntaxiquement correcte MAIS aucune ligne n’a
   été updatee en DB. Verifier la requete (table, colonnes...)");
            } elseif ($nb_lignes_modifiees === FALSE) {
                echo("Requete SQL syntaxiquement incorrecte.");
            }
        }
    } else if (($les_membres['password'] !== $password)) {
        header('Location:index.php?choix=parametre-compte&msssg=err_mdp');
    }
}
?>  