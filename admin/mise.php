<?php 
    session_start();
      require 'vue'.DIRECTORY_SEPARATOR.'header.php';
      require 'Controllers'.DIRECTORY_SEPARATOR.'mise.php';
  
       ?>
       <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
        <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title display-2">Publiez une image accueil</h4>
                  <form class="forms-sample" action="<?php echo $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                      <label>Télécharger une photo</label>
                      <input type="file" name="img" class="form-control file-upload-info ">
                    </div>
                    <button  class="btn btn-primary mr-2"  name="valide">Publier</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-12  stretch-card">
              <div class="card ">
                <div class="card-body ">
                  <p class="card-title">Article recents</p>
                  <div class="table-responsive ">
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>date_publication</th>
                             
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($recuperation as $toto){?>
                        <tr>
                            <td><?php echo$toto['id'];?></td>
                            <td><?php echo$toto['photo'];?></td>
                             <td> <?php echo temps(date("Y-m-d H:i:s"),$toto['date_pub']);?></td>
                            <td><a href="mise.php?id=<?php echo $toto['id'];?>"><button class="btn btn-danger btn-rounded supprimer" id="supprimer">supprimer</button></a></td>
                        </tr>
                        <?php }?>
                        <tr>
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
  <script src="js/afr.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>