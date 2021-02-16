<?php 
        include 'Controllers'.DIRECTORY_SEPARATOR.'pdfs.php' ;
      require 'vue'.DIRECTORY_SEPARATOR.'header.php';
?>

<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
        <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title display-2">Publiez des articles</h4>
                  <p class="card-description display-5">
                   notre insertion de pdf du site 
                  </p>
                  <form class="forms-sample" action="<?php echo $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">description de  pdf </label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Titre de l'article" name="desc" value="<?php if(!empty($mod)) echo $mod[0]['descriptio'] ?>" maxlength="60"> 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">poid de  pdf </label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Titre de l'article" name="poid" value="<?php if(!empty($mod)) echo $mod[0]['poid'] ?>" maxlength="60"> 
                    </div>
                    <div class="form-group">
                      <label>Télécharger un pdf </label>
                      <input type="file" name="fichier" class="form-control file-upload-info ">
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
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                            <th>Id</th>
                            <th>description</th>
                            <th>poid</th>
                            <th>fichier</th>
                            <th>date_publication</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(isset($recuperation)&& !empty($recuperation)){
                           foreach($recuperation as $toto){?>
                        <tr>
                            <td><?php echo$toto['id'];?></td>
                            <td><?php echo$toto['descriptio'];?></td>
                            <td><?php echo$toto['poid'];?></td>
                            <td><?php echo$toto['file_namo'];?></td>
                             <td> <?php echo temps(date("Y-m-d H:i:s"),$toto['date_pub']);?></td>
                            <td><a href="pdf.php?id=<?php echo $toto['id'];?>"><button class="btn btn-primary btn-rounded" name="modifier">modifier</button></a></td>
                            <td><a href="pdf.php?id=<?php echo $toto['id'];?>&para=<?php echo$toto['file_namo'];?>"><button class="btn btn-danger btn-rounded supprimer" id="supprimer">supprimer</button></a></td>
                        </tr>
                        <?php } }?>
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