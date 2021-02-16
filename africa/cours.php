<?php 
   session_start();
   if(!isset($_SESSION["accepte"])){
       header("location:../login");
   }
    require '../Controllers/Contro_cours.php';
?>
<?php require('head.php');?>
<div class="container-fluid txto">
     <section class="primo">
                  <?php if(!empty($rec)){ ?>
                  <div class="cour-menu ">
                    
                      <ul>
                      <?php
                       define("table",recuperetable( basename($_SERVER["REQUEST_URI"])));
                            if(isset($rec)and !empty($rec)){
                                foreach($rec as $afficher){ ?>
                        <li>
                       <!-- <span class="lo1">Page </span> -->
                              <a href="<?php echo couper($afficher["titre"] ) ;?>-<?php echo table?>-<?php echo $afficher["id"] ?>"><span class="<?php if(isset($_COOKIE["dark"]) && !empty($_COOKIE["dark"])) echo "coll ";?> <?php if($afficher["id"]==$_GET["id"]) echo "ver"; else echo"vero";?>"><?php echo $afficher["titre"] ?></span></a>
                          </li>          
                                <?php
                                    }
                                }
                                ?>
                      </ul>
                  </div>
              <article class="laisser">
                <p>
                   <span> <?php if(!empty($afr))echo $afr[0]["titre"] ;?></span> <br>
                    <?php if(!empty($afr))echo $afr[0]["contenu"] ;?>
                </p>
                  <div class="belc"> <?php if(!empty($pag)) echo $pag; ?></div>
           </article>
     </section>
     <?php }
         else{
            echo '<p class="boom">Ce cours n\'est pas disponible pour l\'instant</p>';
        }?>
</div>
    <script src="../js/prism.js"></script>
    <script src="../js/Afrikode.js"></script>
    <script src="../js/dark.js"></script>
    <script src="../js/resp.js"></script>
    <script src="../js/formdark.js"></script>     
    </body>
</html>