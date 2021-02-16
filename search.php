<?php
require 'Controllers/Controllecherche.php';
require 'head.php';
?>
<div class="container txto">
<p class="trou"><?php if($total!=0)echo 'Recherhe trouver pour '; ?><span><?php if($total!=0)echo $_GET["q"]?></span></p>
<p class="colo"> <?php if($total!=0)echo $total.' Tutoriels'?></p>
 <?php
   if(isset($_GET["q"]) && !empty($_GET["q"])){
   if($total==0 or empty($toko)) 
      echo '
      <p class="pas"> Aucun contenu ne correspond à <span>'.$_GET["q"].' </span></p>
      <p class="mai">Mais vous pouvez retenter votre chance avec d\'autres termes</p>
      ';
   }
   else {
     header("location:index.php");
   }
 ?>
<section class="row espace-top">
                    <?php if(isset($toko) && !empty($toko)){foreach($toko as $tokos){?>
                    <aside class="col-lg-3 col-md-4 col-sm-6 col-xs-12 xl">
                      <a href="<?php echo separer($tokos["titre"]).'-'.$tokos["id"]?>">
                          <div class="crep">
                            <figure> 
                               <img src="img/<?php echo $tokos["photo"]?>" alt="image-bloc" class="image-bloc">
                            </figure>
                            <div class="noir-image"></div>
                              <figure>
                                  <img src="images/codi.jpg" alt="" class="logo-afrikode">
                              </figure>
                            <p class="darkt <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark"; else echo"light";?>"><?php echo $tokos["titre"]?></p>
                            <span class="darkt <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark"; else echo"light";?>"> <?php echo temps(date("Y-m-d H:i:s"),$tokos['date_pub']);?> | par carlos</span>
                        </div>
                        </a>  
                   </aside>
                    <?php } }?>
                </section>  
               <div class="paginate"> <p class="pagi"> <?=$pagina?> </p></div>       
         </div>
<?php
require 'footer.php';
?>