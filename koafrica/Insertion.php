
  <?php
  session_start();
  require '../Controllers/ControllerInsertion.php';
  if(isset($_POST["login"]) and !empty($_POST["login"]) and isset($_POST["pass"]) and !empty($_POST["pass"])){
    if($_POST["login"]!="Afrikode" or $_POST["pass"]!="Afrikode-student"){
        header("location:authentification.php"); 
    }
  }
  else{
      if(!isset($_SESSION["ok"] )and $_SESSION["ok"]!=true)
        header("location:authentification.php");
  }
  $title='formation' ;
  include_once 'head.php';
  ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Bienvenue chez Afrikode insertion des données</h2>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

     <div class="container-fluid">
         <section class="row">
                <aside class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="in">
                    <div>Inserer les données</div>
                    <form action="Insertion.php"method="post" enctype="multipart/form-data">
                        <label for="au">Titre</label>
                        <input type="text" name="titre" id="" class="textbox">
                        <label for="au">Photo</label>
                        <input type="file" name="photo" id="">
                        <label for="au">Contenu</label>
                        <textarea name="texte" id="" cols="30" rows="10"></textarea><br>
                        <button class="btn-authentification"name="valider">Valider</button>
                    </form>
                    </div>
                </aside>
                <aside class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="in">
                    <div>Modification des données</div>
                    <form action="Insertion.php"method="post">
                        <?php if(isset($rec) and !empty($rec)){ foreach($rec as $t){ $tab=$t;}}?>
                    <label for="au">Id_Article</label>
                        <input type="text" name="id" id="" class="textbox" value=<?php 
                                                                                    if(isset($t["id"]))
                                                                                  echo $t["id"] ?>>
                        <label for="au">Titre</label>
                        <textarea name="titre" id="texte" cols="30" rows="1"><?php 
                                                                                    if(isset($t["titre"]))
                                                                                  echo $t["titre"] ?></textarea><br>
                        <label for="au">Photo</label>
                        <input type="text" name="photo" id="" class="textbox"value=<?php 
                                                                                    if(isset($t["photo"]))
                                                                                  echo $t["photo"] ?>>
                        <label for="au">Contenu</label>
                        <textarea name="texte" id="texte" cols="30" rows="10"><?php 
                                                                            if(isset($t["contenu"]))
                                                                               echo $t["contenu"]?></textarea><br>
                        <button class="btn-authentification"name="recuperer">Recuperer</button>
                        <button class="btn-authentification" name="modifier">Modifier</button>
                    </form>
                    </div>
                </aside>
                <aside class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="in">
                    <div>Suppression des données</div>
                    <form action="Insertion.php"method="post">
                        <label for="au">Id_Article</label>
                        <input type="text" name="id" id="" class="textbox">
                        <button class="btn-authentification" name="supprimer">Supprimer</button>
                    </form>
                    </div>
                </aside>
         </section>
     </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include_once '../footer.php' ?>


