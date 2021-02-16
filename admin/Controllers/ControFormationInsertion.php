<?php
//ControFormationInsertion.php
date_default_timezone_set('Africa/Kinshasa');
function afrikode($class){
     require './class/'.$class.'.class.php';
}
 spl_autoload_register('afrikode');
 $objet=new Formation;
  if(isset($_POST["table"]) and !empty($_POST["table"]) and isset($_POST["titre"])and isset($_POST["contenu"]))
  {
      if(isset($_POST["publier"]))
      $objet->Insertion_données($_POST["titre"],$_POST["contenu"],$_POST["table"]);
  }
  $recuperation=null;
  $rec=null;
  // recuperation des données pour afficher sur le tableau admin
  if(isset($_POST["recupera"]))
  {
        $recuperation=$objet->recuperation_des_donneées($_POST["recu"]);
  }
  // recuperation de données pour modifier
  if(isset($_GET["tabled"])and !empty($_GET["tabled"]))
  {
     $rec=$objet->recupe($_GET["id"],$_GET["tabled"]);
  }
  // confirmation de modification
  if(isset($_POST["modifier_valide"])){
      if(isset($_GET["tabled"])and !empty($_GET["tabled"])and isset($_GET["id"])){
            $objet->modification_dans_base_des_donneés($_GET["id"],$_POST["titre"],$_POST["contenu"],$_GET["tabled"]);
      }
  }
  if(isset($_GET["tabled"])and !empty($_GET["tabled"])and isset($_GET["id"])and isset($_GET["supprimer"])and !empty($_GET["supprimer"])){
        $objet->suppression($_GET["id"],$_GET["tabled"]);
  }
 


