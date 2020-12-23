

<h1>Réception des données modifiées pour un jeu</h1>

<h3>Réception des données GET (id), var_dump puis enregistrement de l'id dans une variable</h3>
<?php
$id = $_GET['id'];
var_dump($id);
?>


<?php
$titre = htmlspecialchars(addslashes($_POST['titre']));
$plateforme = htmlspecialchars(addslashes($_POST['plateforme']));
$editeur = htmlspecialchars(addslashes($_POST['editeur']));
$date = htmlspecialchars(addslashes($_POST['date']));
$prix = htmlspecialchars(addslashes($_POST['prix']));
$synopsis = htmlspecialchars(addslashes($_POST['synopsis']));
$libre1 = htmlspecialchars(addslashes($_POST['libre1']));
$image = htmlspecialchars(addslashes($_FILES['image']['name']));
move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
var_dump($image);
?>

<h1>UPDATE en DB du jeu</h1>
<?php
$sql = "UPDATE jeu" . " SET titre=:titre, plateforme=:plateforme, editeur=:editeur, date_de_sortie=:date, prix=:prix,synopsis=:synopsis, libre1=:libre1, libre2=:image"
        . " WHERE id=:id ";

$sth = $dbh->prepare($sql);

$sth->bindvalue(':titre', $titre);
$sth->bindvalue(':plateforme', $plateforme);
$sth->bindvalue(':editeur', $editeur);
$sth->bindvalue(':date', $date);
$sth->bindvalue(':prix', $prix);
$sth->bindvalue(':synopsis', $synopsis);
$sth->bindvalue(':libre1', $libre1);
$sth->bindvalue(':image', $image);
$sth->bindvalue(':id', $id);


$requete_correcte = $sth->execute();

if ($requete_correcte === FALSE) {
    echo("Erreur: la requete SQL est incorrecte. <br/>");
} else {
    $nb_lignes_modifiees = $sth->rowCount();
    if ($nb_lignes_modifiees === 1) {
        echo("Reussite de l’UPDATE : 1 ligne a été updatee en DB.");
    } elseif ($nb_lignes_modifiees === 0) {
        echo("Requete SQL syntaxiquement correcte MAIS aucune ligne n’a
   été updatee en DB. Verifier la requete (table, colonnes...)");
    } elseif ($nb_lignes_modifiees === FALSE) {
        echo("Requete SQL syntaxiquement incorrecte.");
    }
}
?>
