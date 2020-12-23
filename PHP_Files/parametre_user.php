<?php
if (!isset($_SESSION['login']) || ($_SESSION['login']) === 'anouar') {
    header('Location:index.php?choix=acces_non_autorise');
    exit();
}
?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-sm-3 col-4" id="myScrollspy">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#section1">Modifier mot de passe </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#section2">Modifier l'image</a>
                </li>


            </ul>
        </nav>
        <div class="col-sm-9 col-8">
            <div id="section1" class="bg-success">    
                <h1>Modification du mot de passe</h1>
                <?php
                $id = $_SESSION['id'];
                ;
                $sql = "SELECT * FROM membre" . " WHERE id=:id";
                $sth = $dbh->prepare($sql);
                $sth->bindvalue(':id', $id);
                $requete_correcte = $sth->execute();
                if ($requete_correcte === false) {
                    echo("Erreur  : la requete SQL est incorrecte");
                } else {
                    $le_membre = $sth->fetch(PDO::FETCH_ASSOC);
                }
                ?>     

                <?php
                ?>

                <form method="POST"  action="index.php?choix=modification_mdp&id=<?php echo($le_membre['id']); ?> ">
                    <?php
                    if (isset($_GET['msssg'])) {
                        $msssg = $_GET['msssg'];
                        switch ($msssg) {

                            case 'err_nmdp' :
                                echo("Les mot de passe ne corresponde pas");
                                break;
                            case 'err_mdp' :
                                echo("Le mot de passe actuel est pas mauvais");
                                break;
                            case 'reussite' :
                                echo("votre mot de passe a été modifié");
                                break;
                            default :
                                echo ("<p>Msg d'erreur non pris en charge.</p> \r\n");
                                break;
                        }
                    }
                    ?>

                    <div class='form-group'>
                        <label for="mdp">Entrer votre mot de passe : </label> 
                        <input id="mdp" name="mdp" type="password" class="form-control" value='********' required>
                    </div>

                    <div  class='form-group'>
                        <label for="nmdp">Entrer nouveau mot de passe : </label> 
                        <input  id="nmdp" name="nmdp" type="password" class="form-control" required >
                    </div> 
                    <div  class='form-group'>

                        <label for="cmdp">confirmer nouveau mot de passe : </label> 
                        <input id="cmdp" name="cmdp" type="password" class="form-control" required >
                    </div>
                    <input  type="submit" value="changer mot de passe" class='btn btn-success'/><br/>     
                </form>

            </div>
            <?php
            ?>


            <div id="section2" class="bg-warning" style="margin-bottom:25px; "> 
                <h1>Ajouter/modifier photo profile</h1>
                <p>  <?php echo("<img class=\"img-responsive\" src=\"images/" . $le_membre['libre1'] . "\" alt=\"pas encore d'image\" width=\"100px\" ?>"); ?></p>

                <form method="POST" enctype="multipart/form-data" action="index.php?choix=ajout_photo_profile&id=<?php echo($le_membre['id']); ?> ">
                       <?php
                    if (isset($_GET['msg1'])) {
                        $msg1 = $_GET['msg1'];
                        switch ($msg1) {

                            case 'img' :
                                echo("L'image est pareil");
                                break;
                         
                        }
                    }
                    ?>
                    <div class='form-group'>
                        <label for="libre1">Entrer l'image avec le type d'extention : </label> 
                        <input id="libre1" type="file" name="libre1"   > 
                    </div>

                    <input style="margin-bottom:40px; " type="submit" value="Ajouter ce jeu" class='btn btn-success'> <br/>  
                </form>
            </div>  


        </div>
    </div>
</div>

