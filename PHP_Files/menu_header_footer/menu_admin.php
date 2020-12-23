<nav class="navbar navbar-expand-sm navbar-1 navbar-dark " style="background-color: red;"  >
    <ul class="navbar-nav">
        <img src="images_console/mario.ico"/>
        <li class="nav-item">
            <a class="nav-link" href="index.php?choix=accueil" style="color: #004085" ><p class="font-weight-bold " ><i class="fab fa-fort-awesome"></i> Accueil</p></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?choix=liste_jeux"style="color: #004085"><p class="font-weight-bold " ><i class="fas fa-gamepad"></i> Liste des jeux</p></a>
        </li>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?choix=ajout_jeu_1_formulaire"style="color: #004085"><p class="font-weight-bold " ><i class="fas fa-puzzle-piece"></i> Ajouter un jeu</p></a>
        </li>
    </ul>
  <img class="form-control ml-auto" style="width:250px;margin-right:15%;" src="./images_console/Nom_site.png" />
    <form class="form-inline ml-auto"method="POST"  action="index.php?choix=authentification_stop">
        <button class="btn btn-success" type="submit">Se déconnecter</button>

    </form>
</nav>