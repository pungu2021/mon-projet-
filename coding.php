<?php
session_start();
if(!isset($_SESSION["accepte"])){
 header("location:../login.php");
}
require 'head.php';
?>
<div class="container txto">
     <p class="texte-form">Vous etes connecter grace à votre compte coding africa et merci de
      nous faire confiance votre développement est notre pririorité . 
       Que voulez vous apprendre sur notre site web. 
     </p>
      <section class="row">
         <aside class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
             <a href="africa/cours-html-et-css-1-1">
                    <figure class="pap">
                        <img src="images/html.png" alt="" class="image-cours">
                        <figcaption>Apprendre  html et css </figcaption>
                    </figure>
              </a>
         </aside>
         <aside class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
             <a href="africa/Apprendre-php-et-mysql-2-1">
                    <figure class="pap">
                        <img src="images/pppp.png" alt="" class="image-cours">
                        <figcaption>Apprendre php et mysql</figcaption>
                    </figure>
              </a>
         </aside>
         <aside class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
             <a href="africa/Apprendre-javascript-3-1">
                    <figure class="pap">
                        <img src="images/js.png" alt="" class="image-cours">
                        <figcaption>Apprendre  javascript</figcaption>
                    </figure>
              </a>
         </aside>
         <aside class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
             <a href="africa/Apprendre-vuejs-4-1">
                    <figure class="pap">
                        <img src="images/v.png" alt="" class="image-cours">
                        <figcaption>Apprendre vue.js</figcaption>
                    </figure>
              </a>
              </aside>
              <aside class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
             <a href="africa/apprendre-csharp-5-1">
                    <figure class="pap">
                        <img src="images/csh.png" alt="" class="image-cours">
                        <figcaption>Apprendre c#(sharp)</figcaption>
                    </figure>
              </a>
              </aside>
              <aside class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
             <a href="africa/apprendre-langage-c-6-1">
                    <figure class="pap">
                        <img src="images/c.png" alt="" class="image-cours">
                        <figcaption>Apprendre Langage C</figcaption>
                    </figure>
              </a>
              </aside>
              <aside class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
             <a href="africa/apprendre-algorithmique-7-1">
                    <figure class="pap">
                        <img src="images/al.jpg" alt="" class="image-cours">
                        <figcaption>Apprendre algorithmique</figcaption>
                    </figure>
              </a>
         </aside>
         <aside class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
             <a href="africa/apprendre-python-8-1">
                    <figure class="pap">
                        <img src="images/Pyt.png" alt="" class="image-cours">
                        <figcaption>Apprendre python</figcaption>
                    </figure>
              </a>
         </aside>
      </section>
</div>
<?php require 'footer.php';?>