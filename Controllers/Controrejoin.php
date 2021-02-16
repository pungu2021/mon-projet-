<?php
date_default_timezone_set('Africa/Kinshasa');
function afrikode($class){
    require 'Models/'.$class.'.classe.php';
}
spl_autoload_register('afrikode');
$objet=new Afrikode;
$rec="";
if(isset($_POST["rej"])){
$rec=$objet->rejoindre_coding_africa($_POST["pseudo"],$_POST["gmail"],$_POST["tel"]);
}