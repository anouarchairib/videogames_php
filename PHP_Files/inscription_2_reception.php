<?php
if ($_POST['password'] !== $_POST['c_password']) {
    header('Location:index.php?choix=inscription_1_formulaire&mssg=err_mdp');
}
$login = htmlspecialchars($_POST['login']);
$sql = "SELECT login FROM membre WHERE login LIKE :login";
$sth = $dbh->prepare($sql);
$sth->bindvalue(':login', $login);
$requete_correcte = $sth->execute();
if ($requete_correcte === FALSE) {
    echo("Erreur : la requete SQL est incorrecte. <br/>");
} else {
    $les_membres = $sth->fetch(PDO::FETCH_ASSOC);
    if ($les_membres['login'] === $login) {
        header('Location:index.php?choix=inscription_1_formulaire&mssg=err_login');
    } else if (($_POST['password'] === $_POST['c_password'] ) && ($les_membres['login'] !== $login)) {
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        $sql = "INSERT INTO membre (login, password)" . " VALUES(:login ,:password)";
        $sth = $dbh->prepare($sql);
        $sth->bindvalue(':login', $login);
        $sth->bindvalue(':password', $password);
        $requete_correcte = $sth->execute();
        if ($requete_correcte === FALSE) {
            echo("Erreur : la requete SQL est incorrecte. <br/>");
        } else {
            $nb_lignes_inserees = $sth->rowCount();
            if ($nb_lignes_inserees === 1) {
                header('Location:index.php?choix=inscription_1_formulaire&mssg=reussite');
            } elseif ($nb_lignes_inserees === 0) {
                echo("Requete SQL syntaxiquement correcte MAIS aucune ligne n’a
été inseree en DB. Verifier la requete (table, colonnes...)");
            } elseif ($nb_lignes_inserees === FALSE) {
                echo("Requete SQL syntaxiquement incorrecte.");
            }
        }
    }
}
?>