<?php
$id = $_GET['id'];
$libre1 = htmlspecialchars(addslashes($_FILES['libre1']['name']));
move_uploaded_file($_FILES['libre1']['tmp_name'], "images/" . $libre1);
?>
<?php
$sql = "UPDATE membre" . " SET libre1=:libre1"
        . " WHERE id=:id ";
$sth = $dbh->prepare($sql);
$sth->bindvalue(':libre1', $libre1);
$sth->bindvalue(':id', $id);
$requete_correcte = $sth->execute();
if ($requete_correcte === FALSE) {
    echo("Erreur: la requete SQL est incorrecte. <br/>");
} else {
    $nb_lignes_modifiees = $sth->rowCount();
    if ($nb_lignes_modifiees === 1) {
        header('Location:index.php?choix=parametre-compte');
    } elseif ($nb_lignes_modifiees === 0) {
      header('Location:index.php?choix=parametre-compte&msg1=img');
    } elseif ($nb_lignes_modifiees === FALSE) {
        echo("Requete SQL syntaxiquement incorrecte.");
    }
}
?>