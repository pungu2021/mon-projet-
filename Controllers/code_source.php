<?php
date_default_timezone_set('Africa/Kinshasa');
function afrikode($class){
    require 'Models/'.$class.'.classe.php';
}
spl_autoload_register('afrikode');
$objet=new Afrikode;
$code_source=$objet->pdf_source_recu();
$pdf=$objet->pdf_recu();