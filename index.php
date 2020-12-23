<?php
session_start();
include("PHP_Files/db/connexion_db_local.php");
?>
<?php
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM membre" . " WHERE id=:id";
    $sth = $dbh->prepare($sql);
    $sth->bindvalue(':id', $id);
    $requete_correcte = $sth->execute();
    if ($requete_correcte === false) {
        echo("Erreur  : la requete SQL est incorrecte");
    } else {
        $le_membre = $sth->fetch(PDO::FETCH_ASSOC);
    }
}
?>
<?php
if (isset($_GET['choix'])) {
    $choix = $_GET['choix'];


    switch ($choix) {


        case "authentification_start" :
            include("./PHP_Files/authentification_start.php");
            break;
        case "authentification_stop" :
            include("./PHP_Files/authentification_stop.php");
            break;
        case "modification_mdp" :
            include ("./PHP_Files/modification_mdp.php");
            break;
        case "ajout_photo_profile" :
            include("./PHP_Files/ajout_photo_profile.php");
            break;
        case "inscription_2_reception" :
            include("./PHP_Files/inscription_2_reception.php");
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>game</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <link rel="stylesheet" href="css/style.css">
        <script src="jquery/jquery-3.3.1.min.js"></script>
        <script src="popper/popper.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>

    <body data-spy="scroll" data-target="#myScrollspy" data-offset="1">


        <div class="container-fluid" id="divbody">


            <div class="card imgnav">
                <div class="card-header">
                    <?php
                      include("./PHP_Files/menu_header_footer/header.php");
                            if (isset($_SESSION['login'])) {
                        if (($_SESSION['login']) === 'anouar') {
                            include("PHP_Files//menu_header_footer/menu_admin.php");
                        } else {
                            include("PHP_Files//menu_header_footer/menu_authentifie.php");
                        }
                    } else {
                        include("PHP_Files//menu_header_footer/menu_non_authentifie.php");
                    }
                    ?>
        
                </div>
            </div>
          
            <?php
            if (isset($_GET['choix'])) {
                $choix = $_GET['choix'];
            } else {
                $choix = "accueil";
            }

            switch ($choix) {
                case "acces_non_autorise" :
                    include("./PHP_Files/acces_non_autorise.php");
                    break;

                case "accueil" :
                    include("./PHP_Files/accueil.php");
                    break;
                case "inscription_1_formulaire" :
                    include("./PHP_Files/inscription_1_formulaire.php");
                    break;
                case "parametre-compte" :
                    include ("./PHP_Files/parametre_user.php");
                    break;

                case "ajout_jeu_1_formulaire" :
                    include("./PHP_Files/ajout_jeu_1_formulaire.php");
                    break;
                case "ajout_jeu_2_reception" :
                    include("./PHP_Files/ajout_jeu_2_reception.php");
                    break;


                case "liste_jeux" :
                    include("./PHP_Files/liste_jeux.php");
                    break;
                case "modification_jeu_1_formulaire" :
                    include("./PHP_Files/modification_jeu_1_formulaire.php");
                    break;
                case "modification_jeu_2_reception" :
                    include("./PHP_Files/modification_jeu_2_reception.php");
                    break;
                
                case "suppression_jeu" :
                    include("./PHP_Files/suppression_jeu.php");
                    break;
                case "sign" :
                    include("./PHP_Files/Sign.php");
                    break;



                default :
                    echo("<p>Valeur du parametre choix non prise en charge");
                    break;
            }
            ?>
        </div>
        <?php
        include("./PHP_Files/menu_header_footer/footer.php");
        ?>



        <script type="text/javascript">
            $(document).ready(function () { // NE PAS MODIFIER CETTE LIGNE
                $(".console").click(function () {
                    /*Cette partie permet de reafficher tout les element du tableau pour permettre de reffaire le trie */
                    $('*#plat').each(function () {
                        // each va parcourir chaque elements du tableau et le show va les affiché s'affiche
                        $(this).parent().show();
                    });
                });
                //filtrage PS4
                $(".ps4").click(function () {
                    $('*#plat').each(function () {
                        /* l'etoile permet de recuperer plusieurs element du tableau */
                        if ($(this).text() !== "PS4") {
                            $(this).parent().hide();
                        }
                    });
                });

                // filtrage Xbox One
                $(".xbox-one").click(function () {
                    $('*#plat').each(function () {

                        if ($(this).text() !== "Xbox one") {
                            $(this).parent().hide();
                        }
                    });
                });

                // filtrage PC
                $(".pc").click(function () {
                    $('*#plat').each(function () {

                        if ($(this).text() !== "PC") {
                            $(this).parent().hide();
                        }
                    });
                });
                //filtrage Nintendo Switch
                $(".Nintendo-Switch").click(function () {
                    $('*#plat').each(function () {

                        if ($(this).text() !== "Nintendo Switch") {

                            $(this).parent().hide();
                        }
                    });
                });



            });

        </script>
        <script type="text/javascript">
            $(document).ready(function () { // DEBUT DES SCRIPTS, NE PAS MODIFIER

                var form_completement_valide;

                $("#button_submit").click(function (evenement) {
                    form_completement_valide = true;

                    
                    //var regex0 = /^[A-Z][a-z]{5,}[1-9]{2}$/;
                    var regex0 = /^(PS4)$/;
                    var regex1 = /^(Xbox one)$/;
                    var regex2 = /^(PC)$/;
                    var regex3 = /^(Nintendo Switch)$/;
                    var phrase0 = $('#plateforme').val();
                    var resultat0 = regex0.test(phrase0);
                    var resultat1 = regex1.test(phrase0);
                    var resultat2 = regex2.test(phrase0);
                    var resultat3 = regex3.test(phrase0);
                    if (resultat0 === true || resultat1 === true || resultat2 === true || resultat3 === true ) {
                        // Coloration en vert
                        $('#plateforme').attr('class', 'form-control is-valid');
                        // Cacher le message d'erreur
                        $('#error-message0').hide();
                    } else {
                        // Lorsqu'un champ est non-valide, la valeur false sera définitivement écrite dans la variable
                        form_completement_valide = false;
                        // Coloration en rouge
                        $('#plateforme').attr('class', 'form-control is-invalid');
                        // Afficher le message d'erreur
                        $('#error-message0').show();
                    }




                    // Le formulaire sera seulement envoyé si toutes les validations réalisées ont réussi
                    console.log("Formulaire complètement valide : " + form_completement_valide);
                    if (form_completement_valide === false) {
                        evenement.preventDefault();
                    }



                });

            });
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>

            function echappement() {
                var login = document.getElementById("login");
                /*
                 * document.getElementById("login")permet de recuper le nom de l'id
                 */
                var password = document.getElementById("password");
                var c_password = document.getElementById("c_password");

                if (login.value.trim() == "") {
                    /*        
                     * value recuperer  dans le nom de l'id la valeur entrer
                     * S'il y a des espaces le trim va permetre de les supprimer.
                     *      
                     */
                    swal("Attention", "Votre Login est vide !", "warning");
                    login.style.border = "solid 3px red";
                    document.getElementById("loginerr").style.visibility = "visible";
                    return false;
                } else if (password.value.trim() == "") {
                    swal("Attention", "Votre Password est vide !", "error");
                    password.style.border = "solid 3px red";
                    document.getElementById("pswerr").style.visibility = "visible";
                    return false;
                } else if (c_password.value.trim() == "") {
                    swal("Attention", "Votre Password est vide !", "error");
                    password.style.border = "solid 3px red";
                    document.getElementById("cpswerr").style.visibility = "visible";
                    return false;
                } else {
                    return true;
                }
            }

        </script>
    </body>
</html>
