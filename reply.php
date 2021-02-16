<?php
session_start();
require 'head.php'; 
?>
<div class="container ">
<div class="rep padi"> 
                    <form action="trai.php" method="post">
                        <section class="row">
                              <aside class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                  <label for="com">Pseudo</label><br>
                                  <input type="text" name="pseudo1" id="pseudo1"class="bow <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark-color"; else echo"light-color";?>">
                            </aside>
                            <aside class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label for="com">Email</label><br>
                              <input type="email" name="gmail1" id="gmail1"class="bow <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark-color"; else echo"light-color";?>">
                            </aside>
                            <aside class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="com">Message</label><br>
                                <textarea name="message1" id="message1" cols="30" rows="10" class="box1 <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark-color"; else echo"light-color";?>"></textarea>
                            </aside>
                        </section>
                        <button class="commentaire-btn"  type="submit" name="id_com" value="<?php if(isset($_GET["id"]))echo $_GET["id"] ?>">Envoyer</button>
                    </form>
                 <!-- formulaire repondre -->
            </div>
    </div>
<?php
require 'footer.php'
?>