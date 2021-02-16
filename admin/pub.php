<?php 
   session_start();
      require 'vue'.DIRECTORY_SEPARATOR.'header.php';
  ?>
       <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
        <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title display-2">Publiez des publicités</h4>
                  <form class="forms-sample" action="<?php echo $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                      <label for="exampleTextarea1">Article</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" name="contenu" ><?php if(!empty($rec)) echo $rec[0][2] ?></textarea>
                    </div>
                      <div class="form-group">
                          <label>Télécharger une photo</label>
                          <input type="file" name="img" class="form-control file-upload-info <?php if(isset($_GET["id"])) echo "visible-false"; else echo "visible-true"?>">
                          <input type="text" name="photo" class="form-control file-upload-info <?php if(isset($_GET["id"])) echo "visible-true"; else echo "visible-false"?> " value="<?php if(!empty($rec)) echo $rec[0][3] ?>">
                      </div>
                    <button  class="btn btn-primary mr-2"  name="pub">Publier</button>
                    <button  class="btn btn-primary mr-2"  name="modi">modifier</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-12  stretch-card">
              <div class="card ">
                <div class="card-body ">
                  <p class="card-title">Article recents</p>
                  <div class="table-responsive ">
                     <h4>Suppression des publicités </h4>
                      <table id="recent-purchases-listing" class="table">
                          <thead>
                            <tr>
                                <th>Id</th>
                                <th>Annonces</th>
                                <th>Images</th>
                            </tr>
                          </thead>
                          <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nous avons organiser une formation en developpement web</td>
                                    <td>Afrikode.jpg</td>
                                    <td><a href="blog.php?id="><button class="btn btn-primary btn-rounded" name="modifier">modifier</button></a></td>
                                    <td><a href="supprimer.php?id=&para=>"><button class="btn btn-danger btn-rounded supprimer" id="supprimer">supprimer</button></a></td>
                                </tr>
                          </tbody>
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
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
