<!DOCTYPE html>
<html lang="fr">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Coding-Africa est une plateforme qui permet de booster les connaissances des informaticiens , grace à notre plateforme vous allez coder avec sourire">
    <meta name="author" content="afrikode.com">
    <meta name="copyright" content="afrikode">
    <meta property="og:title" content="coding-africa.com astuces , tutoriels développement web , cours en web ,programmation et autres">
    <title>Coding-Africa| developpement</title>
       <link rel="stylesheet" href="css/bootstrap.min.css">
       <link rel="stylesheet" href="css/style.css">
       <link rel="stylesheet" href="css/prism.css">
       <link rel="shortcut icon" href="images/codi.jpg"> 
</head>
<body class="darkt <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark"; else echo"light";?>"> 
<header>
              <a href="index"><span class="nom-afrikode">{Coding<span class="kod">-Africa}</span></span></a>
               <nav>
                    <ul>
                        <li><a href="blog">Tutoriels</a></li>
                        <li><a href="formation">Formations</a></li>
                        <li><a href="about">Apropos</a></li>
                        <li><a href="source">code source</a></li>
                        <li><a  class="dar ">mode_dark</a></li>
                    </ul>
               </nav>
               <div>
                  <form action="search.php" class="fom" method="get">
                      <button type="submit" class="im"><img src="images/j.png" alt=""class="im-rec"></button>
                      <input type="text" name="q" id="" class="reche" placeholder="Recherche">
                  </form>
                  <a href="inscription"><button class="btn1">S'inscrire</button></a>
                 <a href="login"><button class="btn2">Se connecter</button></a> 
               </div>
       </header>
       <div class="bnt-menu bnt-menus"><span></span></div>
       <div class="blog-respon ">
          <ul>
               <li><a href="blog">Tutoriels</a></li>
               <li><a href="formation">Formations</a></li>
               <li><a href="about">Apropos</a></li>
               <li><a href="source">Code source</a></li>
              <li><a  class="dar pungu">Mode_dark</a></li>
              <li><a href="inscription">Inscription</a></li>
              <li><a  href="login">Connecter</a></li>
              &nbsp;&nbsp;<form action="search.php" class="fom" method="get">
              <input type="text" name="q" id="" class="claire" placeholder="Recherche">
              </form>
           </ul>
       </div>