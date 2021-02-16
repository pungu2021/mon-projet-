<?php
date_default_timezone_set('Africa/Kinshasa');
function afrikode($class){
    require 'Models/'.$class.'.classe.php';
}
spl_autoload_register('afrikode');
$objet=new Afrikode;
$rec="";
if(isset($_POST["ins"])){
$rec=$objet->inscription($_POST["pseudo"],$_POST["gmail"],$_POST["pass"],$_POST["pass_conf"]);
}