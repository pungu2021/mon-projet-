<?php 
require 'head.php' ;
 require 'Controllers/ControConnecter.php';

?>

   <div class="container txto">
          <div class="enregistrement">
              <figure>
                  <img src="images/codi.jpg" alt="" class="codis">
                  <figcaption>Bienvenue chez Coding-Africa</figcaption>
                  <span>Conneter-vous </span>
              </figure>
                <div class="enre">
                      <?php echo $rec ?>
                    <form action=" <?php echo $_SERVER["PHP_SELF"]?>" method="post" class="v-bi">
                        <label for="en">Email</label>
                        <input type="email" name="gmail" id="" class="form-control reduit"<?php if(isset($_POST["gmail"])) echo'value="'.$_POST["gmail"].'"'?>>
                        <label for="en">Mot de passe</label>
                        <input type="password" name="pass" id="" class="form-control reduit"<?php if(isset($_POST["pass"])) echo'value="'.$_POST["pass"].'"'?>>
                         <button class="insc" name="con">Conneter</button>
                    </form>
                </div>
          </div>
   </div>
<?php require 'footer.php' ?>