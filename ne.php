<?php
date_default_timezone_set('Africa/Kinshasa');
function afrikode($class){
    require 'Models/'.$class.'.classe.php';
}
spl_autoload_register('afrikode');
$objet=new Afrikode;
$rep=$objet->bonus_livre($_POST["prenom"] ,$_POST["gmai"] );
echo $rep;
 