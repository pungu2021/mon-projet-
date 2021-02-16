<?php
  require 'head.php';
  require 'Controllers/ControllerRec.php';
?>
 <figure >
     <img src="img_jour/<?php echo $img[1]?>" alt="" class="book">
 </figure>
 <div class="container-fluid noir">
     <div class="row ">
         <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 tx">
              <p class="al">Apprendre des nouvelles choses</p><br>
              <p class="al1"></p>
              <p class="al2">Améliorez-vous et apprenez de nouvelles choses grâce à
                  nos formations en développement , programmation , . . .
               </p>
               <a href="inscription"><button class="btn10">Inscription</button></a>
               <a href="formation"><button class="btn20">Formation</button></a>
         </div>
         <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 visible">
          <!--  <figure class="centre">
                <img src="images/ordina.png" alt="" class="ordina">
                <img src="images/ra.png" alt="" class="para">
                <p class="belchi">Afri<span>kode</span></p>
             </figure>
             --> 
         </div>
     </div>
 </div>
 <div class="container">
     <span class="pan">Dernières publications</span>
     <section class="row">
        <?php foreach($recuperation as $toto){?>
         <aside class="col-lg-3 col-md-4 col-sm-6 col-xs-12 xl">
                      <a href="<?php echo separer($toto["titre"]).'-'.$toto["id"]?>">
                          <div class="crep">
                            <figure> 
                               <img src="img/<?php echo $toto["photo"]?>" alt="image-bloc" class="image-bloc">
                            </figure>
                            <div class="noir-image"></div>
                              <figure>
                                  <img src="images/codi.jpg" alt="" class="logo-afrikode">
                              </figure>
                             <h2 class="darkt <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark"; else echo"light";?>"><?php echo $toto["titre"]?></h2>
                            <span class="darkt <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark"; else echo"light";?>"> <?php echo temps(date("Y-m-d H:i:s"),$toto['date_pub']);?> | par <?php  $ex=explode(" ",$toto["auteur"]); echo $ex[0]?></span>
                        </div>
                        </a> 
          </aside>
          <?php }?>
     </section><br>
     <section class="row">
     <aside class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       <!--Partie pub de la site -->
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/pub.png" class="d-block w-100" alt="..." height="100px">
                </div>
                <div class="carousel-item">
                <img src="img/pub1.jpg" class="d-block w-100" alt="..."height="100px">
                </div>
                <div class="carousel-item">
                <img src="img/z.png" class="d-block w-100" alt="..." height="100px">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
            </div>
     </aside>
      <aside class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/pub1.jpg" class="d-block w-100" alt="..." height="100px">
                </div>
                <div class="carousel-item">
                <img src="img/z.png" class="d-block w-100" alt="..."height="100px">
                </div>
                <div class="carousel-item">
                <img src="img/pub.png" class="d-block w-100" alt="..." height="100px">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
            </div>
      </aside>
   </section>
   </div>
   <div class="rejoin">
       <p>Vous etes un développeur ou une développeuse  web résidant en Kinshasa , 
           Vous voulez rejoindre notre plateforme coding africa et dévenir membre ou formateur. 
            vous etes au bon endroit juste inscrivez vous en cliquant sur le button en dessous 
        </p>
         <a href="rejoindre"><button class="insco">Rejoindre</button></a>
   </div>
   <div class="go">
   <div class="container">
     <!--fin du blog pub -->
     <p class="confre">Voici ce que disent vos confrères...</p>
     <section class="row">
            <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Ceni">
                 <figure>
                     <img src="images/j.jpg" alt="" class="im-confre">
                 </figure>
                 <span>Christian Kalaki</span>
                 <p class="vote">
                 Je vous remercie vraiment pour tout. En peu de temps, 
                   j’ai compris plus de choses
                  avec vos cours qu’avec n’importe quel livre. 
                 </p>
            </aside>
            <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Ceni">
                  <figure>
                     <img src="images/t.jpg" alt="" class="im-confre">
                 </figure>
                 <span>Syntiche Mbelu</span>
                 <p class="vote">
                 Vous êtes le meilleur ! J'avais failli abandonner
                  la programmation et grâce à un ami qui m'a fait connaitre votre site,
                  je m'en sors maintenant. Merci à vous. Que Dieu vous bénisse.  
                 </p>
            </aside>
            <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Ceni">
                  <figure>
                     <img src="images/pu.jpg" alt="" class="im-confre">
                 </figure>
                 <span>Souley Man</span>
                 <p class="vote ">
                 Je tiens à vous remercier pour vos formations.
                  J'apprends beaucoup plus que ce que 
                 j'ai appris à l'université. Prenez soin de vous.   
                 </p>
            </aside>
     </section>
 </div>
 </div>
<?php
  require 'footer.php';
?>