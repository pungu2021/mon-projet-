<?php require 'head.php' ;
       require 'Controllers/Controrejoin.php';
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
                         <label for="en">Telephone</label>
                         <input type="tel" name="tel" id="" class="form-control reduit"<?php if(isset($_POST["tel"])) echo'value="'.$_POST["tel"].'"'?>>
                         <button class="insc" name="rej">Rejoin-Nous</button>
                         
                    </form>
                </div>
          </div>
   </div>
<?php require 'footer.php' ?>