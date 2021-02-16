<?php
session_start();
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
{
    $url = "https";
}
else
{
    $url = "http"; 
}  
$url .= "://"; 
$url .= $_SERVER['HTTP_HOST']; 
$url .= $_SERVER['REQUEST_URI']; 
$_SESSION["url"]=$url;
  require 'Controllers/Contro.php';
  require 'head.php';
  ?>
 <main id="main"><br>
 <div class="container top-top">
    <section class="row">
          <article class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <?php foreach ($lire as $salut) {?>
             <h3><?php echo $salut["titre"]?></h3>
              <div class="cap">
                 <figure>       
                   <img src="img_admin/<?php echo $hj[0]?>" alt="" class="pub"> 
                     <p class="place-droit">
                         <span ><?php echo $salut["auteur"]?></span><br>
                         <?php echo temps(date("Y-m-d H:i:s"),$salut['date_pub']);?>
                     </p>
                 </figure>
              </div>
              <figure>
                  <a href=""><img src="images/fb1.png" alt="" class="picture"></a>
                  <a href=""><img src="images/tw.jpg" alt="" class="picture"></a>
                  <a href=""><img src="images/wh.png" alt="" class="picture"></a>
              </figure>
              <figure>
                  <img src="img/<?php echo $salut["photo"]?>" alt="" class="pub-image">
              </figure>
              <p class="text"><?php echo $salut["contenu"]?></p>
          </article>
          <?php }?>
           <aside  class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="blog-recherche"> 
                    <div class="rec">Recherche</div>
                    <form class="form-inline" action="search.php" method="get">
                            <i class="fas fa-search" aria-hidden="true"></i>
                            <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                            aria-label="Search" name="q">
                    </form> 
                 </div>
                 <div class="bonus">
                      <p>rejoins vite nos 8 234 codeurs et reçois gratuitement le cours</p>
                      <figure>
                        <img src="images/af.png" alt="" class="bonus-image">
                      </figure>
                      <p id="rece">recevez directement</p>
                        <form id="my-form">
                          <input type="text" name="prenom" id="" placeholder="prénom" class="mo"><br>
                          <input type="email" name="gmai" id=""  placeholder="email"class="mo"> <br>
                            <button class="valide">Oui,Valide </button>
                        </form>
                 </div>
          </aside>
    </section>
    <span class="errow"></span>
    <?php if(isset($_SESSION["conf"])) echo $_SESSION ["conf"]; ?>
    <span class="com"><?php if($total>1)echo $total.'  commentaires'; else echo $total.'  commentaire';?></span>
    <form action="trait.php" method="post">
      <section class="row">
            <aside class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <label for="com">Pseudo</label><br>
                  <input type="text" name="pseudo" id="pseudo"class="bow <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark-color"; else echo"light-color";?>">
            </aside>
            <aside class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <label for="com">Email</label><br>
              <input type="email" name="gmail" id="gmail"class="bow <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark-color"; else echo"light-color";?>">
             </aside>
             <aside class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <label for="com">Message</label><br>
                 <textarea name="message" id="message" cols="30" rows="10" class="box1 <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark-color"; else echo"light-color";?>"></textarea>
             </aside>
      </section>
      <button class="commentaire-btn"  type="submit" name="art" value= "<?php echo $_GET["id"]?>" >Envoyer</button>
    </form>
        <div class="central">
        <?php  foreach($com as $co){?>
           <div class="premier-bloc ">
              <figure>
              <?php 
                $photo=$objet->controle_admin($co["auteur"]);
              
                if(isset($photo) && !empty($photo))
                  echo ' <img src="img_admin/'.$photo[3].'"alt="" class="pub">';          
                else 
                    echo'<img src="images/g.jpg" alt="" class="pub">';
              ?>
             </figure>
           </div>
           <div class="second-bloc">
                  <span class="a2">&nbsp;&nbsp;<?php if(!empty($co["auteur"])) echo $co["auteur"]; else echo $co["pseudo"]?></span>
                    &nbsp;&nbsp;<span class="a1 darkt <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark"; else echo"light0";?>"><?php echo temps(date("Y-m-d H:i:s"),$co['pub_mes']);?></span>
                 <a href="reply-<?php echo $co["id"] ?>"> <span class="a3 rep darkt <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark"; else echo"light0";?>"><img src="images/en.png" alt="" class="env">- Répondre</span></a>
                  <p class="toto ">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $co["mesage"];?></p>
           </div>
           <?php $repo=$objet->recupe_reponse($co["id"]);
                  foreach($repo as $re){
            ?>
            <div class="troisieme-bloc">
               <div class="premier-bloc ">
                  <figure>
                      <?php 
                        $pho=$objet->controle_admin($re["auteur"]);
                        if(isset($pho) && !empty($pho))
                          echo ' <img src="img_admin/'.$pho[3].'"alt="" class="pub">';          
                        else 
                            echo'<img src="images/g.jpg" alt="" class="pub">';
                      ?>
                  </figure>
               </div>
               <div class="second-bloc ">
               &nbsp;&nbsp; <span class="a2">&nbsp;&nbsp; <?php if(!empty($re["auteur"])) echo $re["auteur"]; else echo $re["pseudo"]?></span>
                      &nbsp;&nbsp;<span class="a1 darkt <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark"; else echo"light0";?>"><?php echo temps(date("Y-m-d H:i:s"),$re['pub_mes']);?></span>
                     <a href="reply-<?php echo $co["id"] ?>"><span class="a3 rep darkt <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark"; else echo"light0";?>"><img src="images/en.png" alt="" class="env">- Répondre</span></a>
                     <p class="toto ">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $re["mesage"] ?></p>
                </div>
                  <!-- FIN de troisieme bloc --> 
                </div>
                  <?php }?>
                <!-- formulaire de repondre -->
        
           <?php }?>
           <?php unset($_SESSION["conf"]) ?>
 </div>
 </div>
</main>
<?php include_once 'footer.php' ?>