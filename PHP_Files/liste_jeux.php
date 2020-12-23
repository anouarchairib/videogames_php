<?php
if (!isset($_SESSION['login'])) {
    header('Location:index.php?choix=acces_non_autorise');
    exit();
}
?>
<?php
$sql = "SELECT  id, titre, plateforme, editeur, date_de_sortie, prix,synopsis,libre1,libre2 FROM jeu";
$sth = $dbh->prepare($sql);
$requete_correcte = $sth->execute();
//var_dump(nb) ;
if ($requete_correcte === FALSE) {
    echo("Erreur : la requete SQL est incorrecte. <br/>");
} else {
    $les_jeux = $sth->fetchAll(PDO::FETCH_ASSOC);
    ?> 
  <div class="card" style="background-color: #white;">
        <div class="card-body">
    <div class="dropdown">
        <button type="button"  class="btn btn-primary dropdown-toggle console" href="index.php?choix=liste_jeux#" data-toggle="dropdown">
            console
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item ps4 "><img width="75px" src="./images_console/ps4.png"/></a>
            <a class="dropdown-item xbox-one"><img width="75px" src="./images_console/xbox.jpg"/></a>
            <a class="dropdown-item pc" ><img width="75px" src="./images_console/pc.png"/></a>
            <a class="dropdown-item Nintendo-Switch" ><img width="75px" src="./images_console/nintendos.jpg"/></a>
        </div>
    </div>   
            <div class="table-responsive-lg">
                <table class="table table-striped table-bordered">
                    <caption><h2>Liste des jeux</h2></caption>
                    <thead class="thead-dark">
                        <tr>
                            <th style="text-align: center"><p>Titre</p></th>
                            <th style="text-align: center"><p>image</p></th>
                            <th style="text-align: center"><p>Synopsis</p></th>
                            <th style="text-align: center"><p>plateforme</p></th>
                            <th style="text-align: center"><p>editeur</p></th>
                            <th style="text-align: center"><p>date de sortie</p></th>
                            <th style="text-align: center"><p>prix</p></th>
                            <th style="text-align: center"><p>video</p></th>
                            <?php
                            if (isset($_SESSION['login'])) {
                                if (($_SESSION['login']) === 'anouar') {
                                    ?>
                                    <th style="text-align: center"><p>modifier</p></th>
                                    <th style="text-align: center"><p>supprimer</p></th>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($les_jeux as $un_jeu) {
                            ?>
                            <tr>
                                <td ><p style='text-align: center ; margin-top:50px;'><?php echo($un_jeu['titre']); ?></p></td>
                                <td style='text-align: center'><p>  <?php echo("<img class=\"img-responsive\" src=\"images/" . $un_jeu['libre2'] . "\" alt=\"Pas d'image disponible\" width=\"100px\" ?>"); ?></p></td>
                                <td style='text-align: center'><p style='text-align: center ; margin-top:50px;'><?php echo($un_jeu['synopsis']); ?></p></td>
                                <td style='text-align: center' id="plat"><p style='text-align: center ; margin-top:50px;'><?php echo($un_jeu['plateforme']); ?></p></td>

                                <td  style='text-align: center'><p style='text-align: center ; margin-top:50px;'> <?php echo($un_jeu['editeur']); ?></p></td>
                                <td  style='text-align: center'> <p style='text-align: center ; margin-top:50px;'> <?php echo($un_jeu['date_de_sortie']); ?></p></td>
                                <td  style='text-align: center'><p style='text-align: center ; margin-top:50px;'><?php echo($un_jeu['prix']); ?></p></td>
                                <td  style='text-align: center'> <button style='text-align: center ; margin-top:50px;' type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#id<?php echo($un_jeu['id']); ?>"><i class="fas fa-pause-circle"></i>Voir video</button></td>

                        <div id="id<?php echo($un_jeu['id']); ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header ">

                                        <h4 class="modal-title bd" >Bande-annonce</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p> <?php echo("<video class='video'  controls><source src='video/" . $un_jeu['libre1']) . "' type='video/mp4'></video>"; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <p><?php echo($un_jeu['synopsis']); ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['login'])) {
                            if (($_SESSION['login']) === 'anouar') {
                                
                                
                                
                                

                                echo("<td style='text-align:center; margin-bottom:20px'><a href='index.php?choix=modification_jeu_1_formulaire&id=" . $un_jeu['id'] . "'><p style='text-align: center ; margin-top:50px;'><i  class='fas fa-tools'></i></p></a></td>");
                                echo("<td  style='text-align: center'><a href='index.php?choix=suppression_jeu&id=" . $un_jeu['id'] . "'><p style='text-align: center ; margin-top:50px;'><i class='far fa-trash-alt'></i></p> </a></td>");
                            }
                        }
                        ?>
                        </tr> 
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br/>

    <?php
}
?>

