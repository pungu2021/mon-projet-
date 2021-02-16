<?php
session_start();
date_default_timezone_set('Africa/Kinshasa');
function afrikode($class){
    require 'Models/'.$class.'.classe.php';
}
spl_autoload_register('afrikode');
$objet=new Afrikode;
$rec="";
if(isset($_POST["con"])){
$re=$objet->connecter($_POST["gmail"],$_POST["pass"]);
    if($re!=0){
    $_SESSION["accepte"]="ok";
    header("location:coding.php");
    }
    else{
    $rec='<span class="errop">compte non existant , veuillez vous inscrire</span>';
    }
}
else if(isset($_SESSION["accepte"])&& !empty($_SESSION["accepte"])){
    header("location:coding.php");
}
