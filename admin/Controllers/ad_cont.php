<?php 
 session_start();
  date_default_timezone_set('Africa/Kinshasa');
 function afrikode($class){
       require './class/'.$class.'.classe.php';
  }
   spl_autoload_register('afrikode');
   $objet=new Afrikode;
   if(isset($_POST["valider"])){
       $objet->ajout_admin($_POST["login"],$_POST["pass"],$_FILES["img"]);
   }
   if(isset($_GET["para"])){
    $objet->Suppression_admin($_GET["id"]);
   }
   if(isset($_GET["param"])){
    $rec=$objet->Recupara_admin($_GET["id"]);
   }
   if(isset($_POST["modifier_valide"])){
    $objet->Modification_admin2($_POST["login"],$_POST["pass"],$_FILES["img"],$_GET["id"]);
   }
   $admin=$objet->recuperation_admin();
   $votre_ad=$objet->votre_admin($_SESSION["login"]);
   $vrai=$objet->connaitre($_SESSION["login"]);
  