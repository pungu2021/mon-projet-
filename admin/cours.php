<?php 
    session_start();
      require 'vue'.DIRECTORY_SEPARATOR.'header.php';
      require 'Controllers'.DIRECTORY_SEPARATOR.'ControFormationInsertion.php';
  
       ?>
         <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
        <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title display-2">Publiez des articles</h4>
                  <p class="card-description display-5">
                        Insertion des cours de la formation payant et non payant 
                  </p>
                  <form class="forms-sample" action="<?php echo $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Titre de contenus</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Titre de l'article" name="titre" value="<?php if(!empty($_GET["tabled"])and isset($_GET["tabled"])) echo $rec[0]['titre']; ?>" maxlength="60"> 
                    </div>
                
                    <div class="form-group">
                      <label for="exampleSelectGender">table</label>
                        <select class="form-control" id="exampleSelectGender" name="table" value="">
                          <option>html</option>
                          <option>php</option>
                          <option>algorithme</option>
                          <option>javascript</option>
                          <option>csharp</option>
                          <option>vuesjs</option>
                          <option>langage_c</option>
                          <option>python</option>
                          <?php if(!empty($rec)and isset($_GET["tabled"])){
                             echo'<option selected="selected">'.$_GET["tabled"].'</option>' ;
                          };?>
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Contenu du cours</label>
                      <textarea class="form-control jk" id="exampleTextarea1" rows="4" name="contenu" ><?php if(!empty($rec)and isset($_GET["tabled"])) echo $rec[0]['contenu'] ?></textarea>
                    </div>
                    <button  class="btn btn-primary mr-2"  name="publier">Publier</button>
                    <button class="btn btn-light" type="reset">Annuler</button>
                    <button class="btn btn-primary mr-2"  name="modifier_valide" value="modifier">modifier</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-12  stretch-card">
              <div class="card ">
                <div class="card-body ">
                  <p class="card-title">Article recents</p>
                  <div class="table-responsive ">
                     <form action="cours.php" method="post">
                      <div class="form-group">
                          <label for="exampleSelectGender">table</label>
                            <select class="form-control" id="exampleSelectGender" name="recu" value="<?php if(!empty($rec)) echo $rec[0]['categorie'] ?>">
                              <option>html</option>
                              <option>php</option>
                              <option>algorithme</option>
                              <option>javascript</option>
                              <option>csharp</option>
                              <option>vuesjs</option>
                              <option>langage_c</option>
                              <option>python</option>
                            </select>
                          </div>
                          <button  class="btn btn-primary mr-2"  name="recupera">recuperer</button>
                          </form>
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titre</th>
                            <th>modifier</th>
                            <th>supprimer</th>
                        </tr>
                      </thead>
                       <?php if(!empty($recuperation))
                       {foreach($recuperation as $toto){?>
                        <tr>
                            <td><?php echo$toto['id'];?></td>
                            <td><?php echo$toto['titre'];?></td>
                            <td><a href="cours.php?id=<?php echo $toto['id'];?>&tabled=<?php echo $_POST['recu'];?>"><button class="btn btn-primary btn-rounded" name="modifier">modifier</button></a></td>
                            <td><a href="cours.php?id=<?php echo $toto['id'];?>&tabled=<?php echo $_POST['recu'];?>&supprimer=ok"><button class="btn btn-danger btn-rounded supprimer" id="supprimer">supprimer</button></a></td>
                        </tr>
                        <?php } }?>
                        <tr>
                    </table>
                  </div>
                </div>
              </div>
              </div>
            </div>
            </div>

      
      
  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/afr.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  <script>
    tinymce.init({
      selector: '.jk',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name'
    });
  </script>
</body>
</html>
