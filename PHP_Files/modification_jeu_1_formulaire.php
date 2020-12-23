<?php
if (!isset($_SESSION['login']) || ($_SESSION['login']) !== 'anouar') {
    header('Location:index.php?choix=acces_non_autorise');
    exit();
}
?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM jeu" . " WHERE id=:id";
$sth = $dbh->prepare($sql);
$sth->bindvalue(':id', $id);
$requete_correcte = $sth->execute();
if ($requete_correcte === false) {
    echo("Erreur  : la requete SQL est incorrecte");
} else {
    $le_jeu = $sth->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="card" style='margin-bottom:30px; '>
    <div class="card-body bg-warning">


        <!--Remplacer le mot COMPLETER dans le code source ci-dessous-->
        <form method="POST" enctype="multipart/form-data" action="index.php?choix=modification_jeu_2_reception&id=<?php echo($le_jeu['id']); ?> ">
            <div class='form-group'>
                <label for="titre">Titre : </label> 
                <input id="titre" name="titre" type="text" class="form-control" value='<?php echo($le_jeu['titre']); ?>'>
            </div>

            <div class='form-group'>

                <label for="plateforme">Plateforme : </label> 
                <input id="plateforme" name="plateforme" type="text" class="form-control" placeholder="PS4,One...">
                <span id="error-message0" style="display:none">La console doit etre ecrit de la maniete suivante : PS4,Xbox one,PC,Nintendo Switch</span>
            </div> 
            <div class='form-group'>
                <label for="editeur">editeur : </label> 
                <input id="editeur" name="editeur" type="text" class="form-control" value='<?php echo($le_jeu['editeur']); ?>'> 
            </div>
            <div class='form-group'>
                <label for="date">Date : </label> 
                <input id="date" name="date" type="date" class="form-control" value='<?php echo($le_jeu['date_de_sortie']); ?>'> 
            </div>

            <div class='form-group'>
                <label for="prix">Prix : </label> 
                <input id="prix" name="prix"step=0.01 type="number" class="form-control" value='<?php echo($le_jeu['prix']); ?>'> 
            </div>

            <div class='form-group'>
                <p>
                    <label for="synopsis">Synopsis : </label> 
                    </br>
                    <textarea id="synopsis" name="synopsis" cols="60" rows="10" > 
                        <?php echo($le_jeu['synopsis']); ?>
                    </textarea> 
                </p>
            </div>
            <div class='form-group'>
                <label for="libre1">video : </label> 
                <input id="libre1" name="libre1"  type="text" class="form-control"value="<?php echo($le_jeu['libre1']); ?>" > 
            </div>
            <div class='form-group'>
                <label for="image">Entrer l'image avec le type d'extention : </label> 
                <input id="image" type="file" name="image"   > 
            </div>

            <input id="button_submit"  type="submit" value="modifier jeu" class='btn btn-success'> <br/>                  
        </form>
    </div>
</div>



