<?php
date_default_timezone_set('Africa/Kinshasa');
function afrikode($class){
    require '../Models/'.$class.'.classe.php';
}
spl_autoload_register('afrikode');
$objet=new Afrikode;
$rec=null;
$afr=null;
if(isset( $_GET["table"])and !empty( $_GET["table"]) and isset( $_GET["id"])and !empty( $_GET["id"])){
     $rec=$objet->cours_recuperation($_GET["table"],$_GET["id"]);
     $afr=$objet->cours_id($_GET["id"],$_GET["table"]);
     $pag=$objet->pagi_cours($_GET["table"],$_GET["id"]);
}
else{
    header("location:../error.php");
}
function couper($tetx) {
    $cnx=trim($tetx);
    $cnx=str_replace("?"," ",$cnx);
    $cnx=trim($cnx);
    $cnx=str_replace(" ","-",$cnx);
      return $cnx;
}
function recuperetable($txt){
    $tab=explode("-",$txt);
    $nobre=count($tab);
    $val=$tab[$nobre-2];
    return $val;
}