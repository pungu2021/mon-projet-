<?php 
        include 'Controllers'.DIRECTORY_SEPARATOR.'cont.php' ;
      require 'vue'.DIRECTORY_SEPARATOR.'header.php';
?>
  
   <table class="table table-striped table-bordered bidon">
       <caption>Approbation des reponses</caption>
       <thead>
           <tr>
               <th>id</th>
               <th>pseudo</th>
               <th>gmail</th>
               <th>message</th>
               <th>date_pub</th>
               <th>Approuver</th>
           </tr>
       </thead>
       <tbody>
           <?php foreach($rep as $co){ ?>
           <tr>
               <td><?= $co["id_auto"]?></td>
               <td><?= $co["pseudo"]?></td>
               <td><?= $co["gmail"]?></td>
               <td><?= $co["mesage"]?></td>
               <td><?php echo temps(date("Y-m-d H:i:s"),$co['pub_mes']);?></td>
               <td><a href="approuver.php?id=<?= $co["id_auto"]?>&para=approuver_rep"><button class="bt1 app">approuver</button></a>&nbsp;<a href="approuver.php?id=<?= $co["id_auto"]?>&para=supprimer_rep"><button class="bt sup">Supprimer</button></a></td>
           </tr>
           <?php }?>
       </tbody>
   </table>
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