<?php
  require 'head.php';
  require 'Controllers/code_source.php';
?>
<div class="container txto">
 <div class="gris"><p class="apropos-titre"><span class="nom-afrikode">{Coding<span class="kod">-Africa}</span></span> CODE SOURCE </p></div> 
  <p class="apropos-contenu">
      Vous etes nombreux a demandé les codes sources de ceci ,
       de celà sur les Réseaux sociaux  dans des groupes,sur Whatsapp , 
        Instagram meme dans le commentaire de notre site . ce pourquoi la 
        plateforme Coding-Africa vous offres cette page extraordinaire
         pour télecharger les codes sources des differents projets 
         réaliser par le team ou par les apprenants de la plateforme 
         Coding-Africa et autres.
   </p>
   <table class="table table-striped table-bordered ">
       <thead class="darkt <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark"; else echo"light";?>">
           <tr>
               <th scope="col">Description du  Code </th>
               <th>Poids </th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody class="darkt <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark"; else echo"light";?>">
           <?php if(isset($code_source)){foreach($code_source as $code){?>
            <tr>
               <td><?php echo $code["descriptio"] ?></td>
               <td><?php echo $code["poid"] ?></td>
               <td><a href="pdf_code/<?php echo $code["file_namo"] ?>">Télecharger</a></td>
           </tr>
           <?php } }?>
       </tbody>
   </table><br>
   <div class="gris"><p class="apropos-titre"> <span class="nom-afrikode">{Coding<span class="kod">-Africa}</span></span> PDF</p></div>
   <p class="apropos-contenu">
      Vous etes nombreux a demandé les pdfs ou livres pour apprendre sans lacunes  ,
       les differents technologies . ce pourquoi la 
        plateforme Coding Africa vous offres cette page extraordinaire
         pour télecharger les pdf gratuitement.
   </p>
   <table class="table table-striped table-bordered ">
       <thead class="darkt <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark"; else echo"light";?>">
           <tr>
               <th scope="col">Description du pdf </th>
               <th>Poids </th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody class="darkt <?php if(isset($_COOKIE["dark"])&& !empty($_COOKIE["dark"])) echo"dark"; else echo"light";?>">
       <?php if(isset($pdf)){foreach($pdf as $pd){?>
            <tr>
               <td><?php echo $pd["descriptio"] ?></td>
               <td><?php echo $pd["poid"] ?></td>
               <td><a href="pdf/<?php echo $pd["file_namo"] ?>">Télecharger</a></td>
           </tr>
           <?php } }?>
       </tbody>
   </table><br>
</div>
<?php
  require 'footer.php';
?>