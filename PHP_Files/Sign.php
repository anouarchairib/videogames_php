<?php
if (isset($_SESSION['login'])) {
    header('Location:index.php?choix=acces_non_autorise');
    exit();
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <form class="form-signin" action="index.php?choix=authentification_start" method="POST">
                        <?php
                        if (isset($_GET['msg'])) {
                            $msg = $_GET['msg'];
                            switch ($msg) {

                                case 'err_mdp' :
                                    echo("Les mot de passe ne corresponde pas");
                                    break;

                                default :
                                    echo ("<p>Le Login n 'existe pas.</p> \r\n");
                                    break;
                            }
                        }
                        ?>
                        <div class="form-label-group">
                            <input type="text" id="login" name="login" class="form-control" placeholder="login" required autofocus>
                            <label for="login">login</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>


                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
