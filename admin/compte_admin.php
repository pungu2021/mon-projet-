<?php  
 require 'Controllers/ad_cont.php';
 require 'vue'.DIRECTORY_SEPARATOR.'header.php';
 ?>
  <div class="main-panel"> 
  <div class="content-wrapper">
          <div class="row">
        <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title display-2">Gerer les administrateurs</h4>
                  <form class="forms-sample" action="<?php echo $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                      <label for="exampleInputName1">login d'admin</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="login" name="login" value=" <?php if(isset($rec)) echo $rec[0]["login_ad"]; ?>" maxlength="60">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Password</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="mot de passe" name="pass" value=" <?php if(isset($rec)) echo $rec[0]["password_ad"]; ?>" maxlength="60"> 
                    </div>
                      <div class="form-group">
                          <label>Télécharger une photo</label>
                          <input type="file" name="img" class="form-control file-upload-info "value="">
                      </div>
                    <button  class="btn btn-primary mr-2"  name="valider">Valider</button>
                    <button class="btn btn-primary mr-2"  name="modifier_valide" value="modifier">modifier</button>
                </form>
                </div>
              </div>
            </div>
            <div class="col-md-12  stretch-card">
              <div class="card ">
                <div class="card-body ">
                  <p class="card-title">les administrateur</p>
                  <div class="table-responsive ">
                     <h4>Suppression des administrateur</h4>
                      <table id="recent-purchases-listing" class="table">
                          <thead>
                            <tr>
                                <th>Id</th>
                                <th>login</th>
                                <th>Password</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php foreach($admin as $ad){
                                  if($vrai!=0){
                                  ?>
                                <tr> 
                                    <td> <?php echo $ad["id"]?> </td>
                                    <td><?php echo $ad["login_ad"]?></td>
                                    <td><?php echo $ad["password_ad"]?></td>
                                    <td><a href='compte_admin.php?id=<?php echo  $ad["id"]?>&param=modif'><button class="btn btn-primary btn-rounded" name="modifier">modifier</button></a></td>
                                    <td><a href='compte_admin.php?id=<?php echo  $ad["id"]?>&para=supp'><button class="btn btn-danger btn-rounded supprimer" id="supprimer">supprimer</button></a></td>
                                </tr>
                                <?php } }?>
                                <?php if($vrai==0){?>
                                  <tr> 
                                  
                                    <td> <?php echo $votre_ad[0]?> </td>
                                    <td><?php echo $votre_ad[1]?></td>
                                    <td><?php echo $votre_ad[2]?></td>
                                    <td><a href='compte_admin.php?id=<?php echo $votre_ad[0]?>&param=modif'><button class="btn btn-primary btn-rounded" name="modifier">modifier</button></a></td>
                                    <td><a href='compte_admin.php?id=<?php echo $votre_ad[0]?>&para=supp'><button class="btn btn-danger btn-rounded supprimer" id="supprimer">supprimer</button></a></td>
                                </tr>
                                <?php } ?>
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
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/afr.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
</body>
</html>