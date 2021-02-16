<?php 
 session_start();
  date_default_timezone_set('Africa/Kinshasa');
 function afrikode($class){
       require './class/'.$class.'.classe.php';
  }
   spl_autoload_register('afrikode');
   $objet=new Afrikode;
   if(isset($_POST["login"])&& !empty($_POST["login"])&& isset($_POST["password"])&& !empty($_POST["password"])){
    $veri=$objet->validation_admin($_POST["login"],$_POST["password"]);
    if($veri==0){
    header("location:index.php");
    }
    else{
      $_SESSION["login"]=Afrikode::$login;
    }
   }
   else if(isset($_SESSION["login"]) && !empty($_SESSION["login"])){
        
   }
   else{
       header("location:index.php");
   }