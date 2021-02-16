
  <?php 
  date_default_timezone_set('Africa/Kinshasa');
 function afrikode($class){
       require './class/'.$class.'.classe.php';
  }
   spl_autoload_register('afrikode');
   $objet=new Afrikode;
   // approuver un commentaire
if($_GET["para"]=="approuver_com"){
   $objet->approuver_commentaire($_GET["id"]);
   header("location:commentaire.php");
}
//approuver reponse d'un commentaire
if($_GET["para"]=="approuver_rep"){
    $objet->approuver_repondre($_GET["id"]);
    header("location:repondre.php");
}
//suppression commentaire
if($_GET["para"]=="supprimer_com"){
    $objet->supprimer_commentaire($_GET["id"]);
    header("location:commentaire.php");
 }
 // suppression reponse 
 if($_GET["para"]=="supprimer_rep"){
    $objet->supprimer_repondre($_GET["id"]);
    header("location:repondre.php");
}

