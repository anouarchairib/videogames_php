<?php
if (isset($_SESSION['login'])) {
    header('Location:index.php?choix=acces_non_autorise');
    exit();
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-6">
                <div class="card-body" >
                    <h5 class="card-title text-center">Inscription</h5>
                    <form class="form-signin" method="POST" onsubmit="return echappement()" action="index.php?choix=inscription_2_reception">
                        <!--onsubmit permet lors du clic du submit de renvoyer vers la foncrtion echappement qui renvoie true ou false 
                           True= la formulaire redirige vers une autre page
                           False=Le formulaire reste sur la meme page et envoie les erreur.
                        --> 
                        <?php
                        if (isset($_GET['mssg'])) {
                            $mssg = $_GET['mssg'];
                            switch ($mssg) {

                                case 'err_mdp' :
                                    echo("Les mot de passe ne corresponde pas");
                                    break;
                                case 'err_login' :
                                    echo("Le login existe deja");
                                    break;
                                     case 'reussite' :
                                    echo("Vous êtes desormais inscrit");
                                    break;
                                default :
                                    echo ("<p>Msg d'erreur non pris en charge.</p> \r\n");
                                    break;
                            }
                        }
                        ?>
                        <label id="loginerr" style="color:red; visibility: hidden">Remplissez le champ login (sans espaces) !</label>
                        <div class="form-label-group">

                            <input id="login" name="login" type="text" class="form-control" placeholder="isfce1040" required="">
                            <label for="login">Choisissez un login : </label> 

                        </div>

                        <label id="pswerr" style="color:red; visibility: hidden">Remplissez le champ password (sans espaces) !</label>
                        <div class="form-label-group">

                            <input id="password" name="password" type="password" class="form-control" placeholder="******" required="">
                            <label for="password"> mot de passe : </label>

                        </div>  

                        <label id="cpswerr" style="color:red; visibility: hidden"> Remplissez le champ password(sans espaces) !</label>
                        <div class="form-label-group">

                            <input id="c_password" name="c_password" type="password" class="form-control" placeholder="******" required="">
                            <label for="c_password">Condirmer le mot de passe : </label> 
                        </div>  

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
