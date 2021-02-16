<?php 
  date_default_timezone_set('Africa/Kinshasa');
 function afrikode($class){
       require './class/'.$class.'.classe.php';
  }
   spl_autoload_register('afrikode');
   $objet=new Afrikode;
   if(isset($_GET["id"])){
   $objet->Suppression($_GET["id"], $_GET["para"]);
}
header("location:blog.php");