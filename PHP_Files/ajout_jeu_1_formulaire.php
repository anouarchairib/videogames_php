<?php
if (!isset($_SESSION['login']) || ($_SESSION['login']) !== 'anouar') {
    header('Location:index.php?choix=acces_non_autorise');
    exit();
}
?>


<div class="card" style='margin-bottom:30px;'>
    <div class="card-body bg-warning">
        <form method="POST" action="index.php?choix=ajout_jeu_2_reception" enctype="multipart/form-data">
            <div class='form-group'>

                <label for="titre">Titre : </label> 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                    </div>
                    <input id="titre" name="titre" type="text" class="form-control" value='Red dead redemption 2'>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                    </div>
                </div>
            </div>
            <div class='form-group'>

                <label for="plateforme">Plateforme : </label>
                <span id="error-message0" style="display:none">La console doit etre ecrite de la maniere suivante : PS4,Xbox one,PC,Nintendo Switch</span>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fab fa-playstation"></i></span>
                    </div>
                    <input id="plateforme" name="plateforme" type="text" class="form-control" placeholder="PS4,One...">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fab fa-xbox"></i></span>
                    </div>
                </div>

            </div> 
             
            <div class='form-group'>
                <label for="editeur">editeur : </label> 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">    <i class="fab fa-critical-role"></i></span>
                    </div>
                <input id="editeur" name="editeur" type="text" class="form-control" value='Ubisoft'> 
                  <div class="input-group-append">
                        <span class="input-group-text">   <i class="fab fa-critical-role"></i></span>
                    </div>
                </div>
            </div>
        
            <div class='form-group'>
                <label for="date">Date : </label> 
                  <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">    <i class="far fa-calendar"></i></span>
                    </div>
                <input id="date" name="date" type="date" class="form-control" value='2030-12-01'> 
                <div class="input-group-append">
                        <span class="input-group-text">   <i class="far fa-calendar"></i></span>
                    </div>
                  </div>
            </div>

            <div class='form-group'>
                <label for="prix">Prix : </label> 
                  <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                <input id="prix" name="prix" min="0" step=0.01 type="number" class="form-control" value='10,99'> 
                 <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
            </div>
            </div>

            <div class='form-group'>
                <label for="synopsis">Synopsis : </label> 
                <br/>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">  <i class="fas fa-edit"></i></span>
                    </div>
                <textarea id="synopsis" name="synopsis" class="form-control" cols="60" rows="10"> 
            
                </textarea> 
                     <div class="input-group-append">
                        <span class="input-group-text">  <i class="fas fa-edit"></i></span>
                    </div>
                 </div>
            </div>
            
            <div class='form-group'>
                <label for="libre1">entrer la video plus l'extention : </label> 
                  <br/>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">  <i class="fas fa-file-video"></i></span>
                    </div>
              
                <input id="libre1" name="libre1"  type="text" class="form-control"  > 
                  <div class="input-group-append">
                        <span class="input-group-text">  <i class="fas fa-file-video"></i></span>
                    </div>
                </div>
            </div>
            <div class='form-group'>
                <label for="image">Entrer l'image avec le type d'extention : </label> 
                <input id="image" type="file" name="image" > 
            </div>

            <input id="button_submit" type="submit" value="Ajouter ce jeu" class='btn btn-success'> <br/>          
        </form>
    </div>
</div>
<br/>
