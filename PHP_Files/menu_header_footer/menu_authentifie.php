<?php
//Pour recupere l 'id du membre connecter


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
<nav class="navbar navbar-expand-md  navbar-dark bg-dark navbar-1" style="background-color: #040505;">
  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" >
        <li  class="navbar-brand " >
            <p>  <?php echo("<img class=\"img-responsive\" src=\"images/" . $le_membre['libre1'] . "\" alt=\"choisir photo\"  style=\"margin-top:10px;\" width=\"50px\" ?>"); ?></p>
        </li>
        <div class="form-inline">
        <li  class="nav-item active"  >
            <a class="nav-link" href="index.php?choix=accueil"> <i class="fab fa-fort-awesome-alt">Accueil</i>   </a>
        </li>
        </div>
        <div class="form-inline">
        <li class="nav-item" >
            <a class="nav-link" href="index.php?choix=liste_jeux"> <i class="fas fa-gamepad"></i> Jeux</a>
        </li>
        </div>
    </ul> 

        <img class="form-control ml-auto" style="width:250px;margin-right:35%;" src="./images_console/Nom_site.png" />
    <div  class="dropdown dropleft">
        <button type="button"  class="btn btn-primary dropdown-toggle " href="index.php" data-toggle="dropdown">
            <i class="fas fa-users-cog"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a href="index.php?choix=parametre-compte" class="dropdown-item "><i class="fas fa-cog"></i>Parametre de compte</a>
             <div class="dropdown-divider"></div>
            <a class="dropdown-item ">
                <form class="form-inline ml-auto" method="POST"  action="index.php?choix=authentification_stop">
                    <button class="btn btn-success" type="submit"> <i class="fas fa-user-slash"></i>Se déconnecter</button>

                </form>
            </a>
        </div>
    </div>
    

    

    </div>
</nav>