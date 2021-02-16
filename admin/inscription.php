<?php 
      require 'Controllers/ins.php';
      require 'vue'.DIRECTORY_SEPARATOR.'header.php';
 ?>
        <div class="tableau">
         <table class=" table table table-bordered table-striped table-hover">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>pseudo</th>
                      <th>gmail</th>
                      <th>mot de passe </th>
                      <th>supprimer</th>
                  </tr>
              </thead>
               <tbody>
                 <?php if(isset($rec)) {
                       foreach($rec as $tab){
                  ?>
                 <tr>
                    <td> <?php echo $tab["id"]?> </td>
                    <td><?php echo $tab["pseudo"]?> </td>
                    <td> <?php echo $tab["gmail"]?> </td>
                    <td> <?php echo $tab["pass"]?> </td>
                    <td><?php echo temps(date("Y-m-d H:i:s"),$tab['date_pub']);?></td>
                    <td><a href="inscription.php?id=<?php echo $tab["id"]?>"><button class="bt">Supprimer</button></a></td>
                  </tr>
                 <?php }}?>
               </tbody>
         </table><br>
         <a href="inscription.php?all=sup"><button class="bt">Supprimer_tout</button></a>
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
