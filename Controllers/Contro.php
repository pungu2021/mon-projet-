<?php
date_default_timezone_set('Africa/Kinshasa');
function afrikode($class){
    require 'Models/'.$class.'.classe.php';
}
spl_autoload_register('afrikode');
$objet=new Afrikode;
$com=$objet->recupe_commentaire($_GET["id"]);
$lire=$objet->lire($_GET["id"]);
$total=0;
  foreach($com as $a){
    $reply=$objet->recupe_reponse($a["id"]);
      foreach($reply as $b){
           $total++;
      }
      $total++;
  }
// creation d'une fonction de temps , qui permet de calculer le temps
function temps($date_now,$date_enre){
    // declaration de deux variables date
   $date1=strtotime($date_now);
   $date2=strtotime($date_enre);
   // ici on a fait la difference de dates
   $date_difference=abs($date1-$date2);
   if($date_difference>=31536000){
        return 'il ya '.floor($date_difference/31536000).' ans';
    }
    else if($date_difference!=0 and $date_difference>=2592000){
        return 'il ya '.floor($date_difference/2592000).' mois';
    }
    else if( $date_difference>=604800 and $date_difference<2592000){
          if(floor($date_difference/604800) >=2)
            return 'il ya '.floor($date_difference/604800).' semaines';
        else
            return 'il ya '.floor($date_difference/604800).' semaine';
    }
    else if($date_difference >=86400 and $date_difference<2592000){
        if(floor($date_difference/86400) >=2)
        return 'il ya '.floor($date_difference/86400).' jours';
        else
        return 'il ya '.floor($date_difference/86400).' jour';
     }  
    else if($date_difference>=3600 and $date_difference<86400){ 
        return 'il ya '.floor($date_difference/3600).' h';
    }
    else if($date_difference<3600){
        return 'il ya '.floor($date_difference/60).' min';
    }
}
$hj=$objet->photo($lire[0]["auteur"]);