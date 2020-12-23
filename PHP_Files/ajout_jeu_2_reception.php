
<h1>Réception des données de l'ajout d'un jeu</h1>


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
/* [image]=nom donnée dans le formulaire 
 * ['tmp_name']=il va cree une adresse qui est propre a l'image que j ai ajouter dans le dosser tmp
 * "images/".$image= va parcourir le dossier courrant et mettre l'image dans le dossier images.
 */
var_dump($_FILES);
var_dump($_FILES['image']['tmp_name']);
//$_FILES([][],"".$image);
?>

<h3>INSERT du  jeux en DB</h3>
<?php
$sql = "INSERT INTO jeu(titre,plateforme,editeur,date_de_sortie,prix,synopsis,libre1,libre2)"
        . " VALUES(:titre,:plateforme,:editeur,:date,:prix,:synopsis,:libre1,:image)";

$sth = $dbh->prepare($sql);

$sth->bindvalue(':titre', $titre);
$sth->bindvalue(':plateforme', $plateforme);
$sth->bindvalue(':editeur', $editeur);
$sth->bindvalue(':date', $date);
$sth->bindvalue(':prix', $prix);
$sth->bindvalue(':synopsis', $synopsis);
$sth->bindvalue(':libre1', $libre1);
$sth->bindvalue(':image', $image);

$requete_correcte = $sth->execute();

if ($requete_correcte === FALSE) {
    echo("Erreur: la requete SQL est incorrecte. <br/>");
} else {
    $nb_lignes_inserees = $sth->rowCount();
    var_dump($nb_lignes_inserees);
    if ($nb_lignes_inserees === 1) {
        echo("Reussite de l’INSERT : 1 ligne a été inseree en DB.");
    } elseif ($nb_lignes_inserees === 0) {
        echo("Requete SQL syntaxiquement correcte MAIS aucune ligne n’a
    été inseree en DB. Verifier la requete (table, colonnes...)");
    } elseif ($nb_lignes_inserees === FALSE) {
        echo("Requete SQL syntaxiquement incorrecte.");
    }
}
?>