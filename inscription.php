<?php require 'head.php' ;
       require 'Controllers/Controinscrip.php';
?>
   <div class="container txto">
          <div class="enregistrement">
              <figure>
                  <img src="images/codi.jpg" alt="" class="codis">
                  <figcaption>Bienvenue chez Coding-Africa</figcaption>
                  <span>rejoins-nous </span>
              </figure>
                <div class="enre">
                      <?php echo $rec ?>
                    <form action=" <?php echo $_SERVER["PHP_SELF"]?>" method="post">
                        <label for="en">Nom ou Pseudo</label>
                        <input type="text" name="pseudo" id="" class="form-control reduit" <?php if(isset($_POST["pseudo"])) echo'value="'.$_POST["pseudo"].'"'?>>
                        <label for="en">Email</label>
                        <input type="email" name="gmail" id="" class="form-control reduit"<?php if(isset($_POST["gmail"])) echo'value="'.$_POST["gmail"].'"'?>>
                        <label for="en">Mot de passe</label>
                        <input type="password" name="pass" id="" class="form-control reduit" <?php if(isset($_POST["pass"])) echo'value="'.$_POST["pass"].'"'?>>
                        <label for="en">Confirmez votre mot de passe</label>
                        <input type="password" name="pass_conf" id="" class="form-control reduit" <?php if(isset($_POST["pass_conf"])) echo'value="'.$_POST["pass_conf"].'"'?>>
                         <button class="insc" name="ins">inscription</button>
                         <a href="login.php">Déjà un compte ?</a>
                    </form>
                </div>
          </div>
   </div>
<?php require 'footer.php' ?>