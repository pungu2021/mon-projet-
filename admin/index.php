<?php 
 session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Afrikode est une plateforme qui permet de booster les connaissances des informaticiens">
    <meta name="author" content="afrikode.com">
    <meta name="copyright" content="afrikode">
    <title>Afrikode | developpement</title>
       <link rel="stylesheet" href="../css/bootstrap.min.css">
       <link rel="stylesheet" href="../css/style.css">
       <link rel="stylesheet" href="../css/prism.css">
       <link rel="shortcut icon" href="../images/afro.png">
       <header>
              <a href="../index.php"> <span class="nom-afrikode">{Afri<span class="kod">kode}</span></span></a>
               <nav>
                    <ul>
                        <li><a href="../blog">Tutoriels</a></li>
                        <li><a href="../formation">Formations</a></li>
                        <li><a href="../about">Apropos</a></li>
                        <li><a href="../source">code source</a></li>
                    </ul>
               </nav>
               <div>
                  <form action="../search.php" class="fom" method="get">
                      <button type="submit" class="im"><img src="../images/j.png" alt=""class="im-rec"></button>
                      <input type="text" name="q" id="" class="reche" placeholder="Recherche">
                  </form>
                  <button class="btn1">S'inscrire</button>
                  <button class="btn2">Se connecter</button>
               </div>
       </header>
</head>
<body>
      <div class="container top">
          <p class="miha">Partie Administrative du site Vous devez vous Connecter grace à votre login et mot de passe 
            cette partie est reserver pour les administrateurs , si vous n'etes pas administrateur veuillez quitter plus vite  sinon vous allez regretter d'avoir essayer .
          </p>
      </div>
      <div class="container">
           <div class="row">
                <div class="col-lg-12">
                       <div class="connect">
                       <div class="connecter-form">Authentification</div>
                             <form action="accueil.php" method="post">
                                  <label for="com">Login</label> 
                                  <input type="text" name="login" id="" class="bow">
                                  <label for="com">Password</label>
                                  <input type="password" name="password" id="" class="bow"> 
                                  <button class="commentaire-btn"  type="submit">Valider</button>
                             </form>
                       </div>
                </div>
           </div>
      </div>
<div class="taxe">
   <footer class="container-fluid">
   <section class="row">
       <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
            <p><span class="nom-afrikode">{Afri<span class="kod">kode}</span></span></p>
            <p class="vop10">
            Afrikode est une entreprise web dynamique , qui a pour but
            de mettre en adéquation la technique et la complexité de l
            'informatique , du graphisme et du community 
                , nous sommes passionné par le web 
                depuis un peu plus longtemps nous aimons partager 
                nos compétences et nos découvertes avec les personnes qui 
                ont cette même passion pour le web 
            </p>
            <figure>
                <img src="../images/fb1.png" alt="" class="fist">
                <img src="../images/wh.png" alt="" class="fist">
                <img src="../images/in.png" alt="" class="fist">
                <img src="../images/tw.jpg" alt="" class="fist">
            </figure>
       </aside>
       <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
       <span class="titre">Notre adresse et contact</span>
       <p class="vop1">37 bis , lomami Commune de kintambo , quartier itimbiri <br>
           phone :+243823039778 <br>+243829317615 <br>
           Email : ContactAfrikode@gmail.com <br>
           facebook: <br>
           whatsapp : <br>
       </p>
       </aside>
       <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
              <span class="titre">Newsletter</span>
              <p class="vop1"><input type="checkbox" name="" id="" checked> Voulez-vous vous abonner à notre newsletter et recevez nos emails ?</p>
              <span class="email">Email</span>
              <form id="news">
                  <input type="email" name="newsletter" id="new" class="yup"placeholder="votre email ici" ><br>
                  <span id="toto"></span>
                  <button class="new ne" >Envoyer</button>
              </form>
        </aside>
      </section>
    </footer>
    </div>
    <div class="bork"><p class="">&copy Copyright  <span> <?php echo date("Y")?> afrikode</span> tous droits reservés. </p></div>
    <script src="js/prism.js"></script>
    <script src="js/Afrikode.js"></script>
</body>
</html>
</body>
</html>