<?php
//$_GET['de']=="detruit" 
if(isset($_COOKIE["dark"]) && !empty($_COOKIE["dark"])){
    setcookie("dark","",time()-4200);
    unset($_COOKIE["dark"]);
    echo 'supprimer';
}
else {
    setcookie("dark","nuit",time()+365*24*3600,null , null ,false,true);
    echo'creer';
}