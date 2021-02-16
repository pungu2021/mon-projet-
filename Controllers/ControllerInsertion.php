
  <?php 
 function afrikode($class){
       require '../Models/'.$class.'.classe.php';
  }
   spl_autoload_register('afrikode');
   $objet=new Afrikode;
   $rec="";
   $titre="";
  if(isset($_POST["valider"])){
     $objet->Insertion($_POST["titre"],$_POST["texte"],$_FILES["photo"]);
     $_SESSION["ok"]=true;
  }
  else if(isset($_POST["recuperer"])){
    $rec=$objet->recuperation($_POST["id"]);
    foreach($rec as $j)
    $titre=['titre'];
    $_SESSION["ok"]=true;
  }
  else if(isset($_POST["modifier"])){
      $objet->Modification($_POST["titre"],$_POST["texte"],$_POST["photo"],$_POST["id"]);
      $_SESSION["ok"]=true;
    }
   else if(isset($_POST["supprimer"])){
      $objet->Suppression($_POST["id"]);
      $_SESSION["ok"]=true;
  }
$tab=null;
?>