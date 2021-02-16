<?php

  /**
   * creation de la classe  Afrikode
   */
  class Afrikode{
      // declaration des attributs
    private $_cnx="mysql:host=localhost;dbname=rlab";
    private  $_user="root";
    private $_pass="";
    private $_con;
    public static $paginate="";
    public static $pagi=null;
    private const APRES_AVANT=4;
    private $reche;
    public static $rayan;
    // declaration du construteur 
    public function __construct(){
      /**
       * Gestion d'erreur , elle permet d'afficher un message en cas d'echec
       */
        try{
          // connexion avec la base de donnée
            $this->_con= new PDO($this->_cnx,$this->_user,$this->_pass);
            $this->_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        // si la connexion à echouer
        catch(PDOException $e){
          // message d'erreur
        $msg='Erreur de connexion avec la base de donnée '.$e->getMessage();
              die($msg);
        }
    }
    /**
     * insertion de données dans la base de données rlab
     *
     * @param [type] $titre
     * @param [type] $contenu
     * @param [type] $photo
     * @return void
     */
    public function Insertion($titre,$contenu,$photo){
      // suppression de caractere illegaux
        $titre=htmlspecialchars($titre);
        $contenu_photo=htmlspecialchars(trim($photo['name']));
        $temporaire=$photo['tmp_name'];
        // verification si les parametre passer existe et ils ne sont pas nuls
        if(isset($titre) and !empty($titre) and isset($contenu) and !empty($contenu) and isset($contenu_photo) and !empty($contenu_photo)){
            // verification de format de fichier envoyé avec regex 
          if(preg_match('#.jpg$|.png$#i',$contenu_photo)){
            // requete pour resortir les données
                $req=$this->_con->query('SELECT id from articles');
                // connaitre les nombre d'enregistrement
                $nbre_enregistrement= $req->rowCount();
                $i=$nbre_enregistrement+1;
                // remplacer le point par le dernier numero id et concatener avec le point
                $contenu_photo=str_replace('.',$i.'.',$contenu_photo);
                // deplacement de l'image vers notre projet dans le dossier image
                  move_uploaded_file($temporaire,'../img/'.$contenu_photo);
                // prepation d'insertion de données
                $prepare_requete=$this->_con->prepare('INSERT INTO articles(titre,contenu,photo,date_pub) VALUES(?,?,?,NOW())');
                $prepare_requete->execute(array($titre,$contenu,$contenu_photo));
             }
        }
         }
     /**
      * modification de donnée dans la base de données
      *
      * @param [type] $titre
      * @param [type] $contenu
      * @param [type] $photo
      * @param [type] $id
      * @return void
      */
     public function  Modification($titre,$contenu,$photo,$id){
        // suppression de caractere illegaux
      $titre=htmlspecialchars($titre);
      $contenu_photo=htmlspecialchars(trim($photo));
      $id=(int)$id;
      // verification si les parametre passer existe et ils ne sont pas nuls
      if(isset($titre) and !empty($titre) and isset($contenu) and !empty($contenu) and isset($contenu_photo) and !empty($contenu_photo)and is_numeric($id) and !empty($id)){
         // modification de donnée dans la base de donnée
              $prepare_requete=$this->_con->prepare('UPDATE articles SET titre=?,contenu=?,photo=?,date_pub=NOW() WHERE id=?');
              $prepare_requete->execute(array($titre,$contenu,$contenu_photo,$id));
      }
     }
      /**
       *suppression des de données dans la base de données
       */
    public  function Suppression($id){
      if(isset($id) and is_numeric($id) and !empty($id)){
        $id=(int)$id;
        // Suppression de donnée dans la base de donnée
             $prepare_requete=$this->_con->prepare('DELETE FROM articles WHERE id=?');
             $prepare_requete->execute(array($id));
     }
    }
    //recuperation pour la modification
    public function recuperation($id){
      $id=(int)$id;
      $req=$this->_con->prepare('SELECT * from articles WHERE id=?');
      $req->execute(array($id));
      return $req->fetchAll();
    }
    // affichage des elements
    public function Affichage(){
      $req=$this->_con->query('SELECT * from articles');
        return $req->fetchAll();
    }
    // la fonction de pagination du site
    public  function pagination($nombre,$nombre_par_page){
      $nombre=(int)$nombre;
      $req=$this->_con->query('SELECT * from articles');
      // compter les nombres dess enregistrement
      $nombre_enregistrement=$req->rowCount();
      // recuperation de la partie entierer de resultat de la division 
      $last_page=ceil($nombre_enregistrement/$nombre_par_page);
      $num=1;
      if(isset($nombre) and is_numeric($nombre)){
               if($nombre<=0){
                 $num=1;
               }
                 else if($nombre>=$last_page){
                    $num=$last_page;
                 } 
                 else
                 $num=$nombre;
              if(!is_numeric($nombre))
                    $num=1;
      }
      else{
        $num=1;
      }
      // la formule pour trouver la limite qui av sortir
      $limit='LIMIT '.(($num*$nombre_par_page)-$nombre_par_page).','.$nombre_par_page ;
      $pre=$this->_con->query("SELECT * FROM articles ORDER BY id DESC $limit");
       self::$paginate='';
       // creation de pagination 
      if($last_page>1){
        // verification de liens precedents
            if($num>1){
              $precedent=$num-1; 
              self::$paginate.='<a href="page-'.$precedent.'"><span class="next">precedent</span></a>';
               for($i=$num-self::APRES_AVANT;$i<$num;$i++){
                 if($i>0){
                  self::$paginate.='<a href="page-'.$i.'"><span class="lien">'.$i.'</span></a>';
                 }
               }
            }
            // lien du milieu du pagination
            self::$paginate.='<span>'.$num.'</span>';
           // verification de liens suivants
           if($num<$last_page){
             $suivant=$num+1;
             for($i=$num+1;$i<$num+self::APRES_AVANT;$i++){
               if($i>=$last_page){
                     break;
                  }
                self::$paginate.='<a href="page-'.$i.'"><span class="lien">'.$i.'</span></a>';
               }
               self::$paginate.='<a href="page-'.$suivant.'"><span class="next">suivant</span></a>'; 
             }
         // fin condition last_page
           }

      return $pre->fetchAll();    
    }
    public function recupe_commentaire($id){
      $id=(int)$id;
      $num=1;
      if(isset($id) && !empty($id)){
      $req=$this->_con->prepare('SELECT * from commentaire WHERE id_article=? and approuver=?');
      $req->execute(array($id,$num));
      return $req->fetchAll();
      }
    }
    public function recupe_reponse($id){
      $id=(int)$id;
      $num=1;
      if(isset($id) && !empty($id)){
      $req=$this->_con->prepare('SELECT * from repondre WHERE id=? and approuver=?');
      $req->execute(array($id,$num));
      return $req->fetchAll();
    }
    }
    public function derniers_articles(){
      $req=$this->_con->query("SELECT * FROM articles ORDER BY id DESC limit 0,12 ");
      return $req->fetchAll();
    }
    public function lire($id){
      $id=(int)$id;
      if(isset($id)and !empty($id)and is_numeric($id)){
        $req=$this->_con->prepare('SELECT * from articles WHERE id=?');
        $req->execute(array($id));
        if($req->rowCount()==0){
          header("location:../afri/error.php");
        }
        else{
          return $req->fetchAll();
        }
      }
      else{
        header("location:../afri/error.php");
      }
    }
    public function Recherche($key,$nombre,$nombre_par_page){
       if(isset($key) and !empty($key)){
          $key=htmlspecialchars(strip_tags( strip_tags($key)));
         $this->_reche=htmlspecialchars(strip_tags( strip_tags($key)));
        $req=$this->_con->query ('SELECT * from articles WHERE CONCAT(titre,contenu) LIKE "%'.$key.'%" ORDER BY id DESC ');
        // pagination de recherche 
        $nombre=(int)$nombre;
        // compter les nombres dess enregistrement
        $nombre_enregistrement=$req->rowCount();
        self::$rayan= $nombre_enregistrement;
        // recuperation de la partie entierer de resultat de la division 
        $last_page=ceil($nombre_enregistrement/$nombre_par_page);
        $num=1;
        if(isset($nombre) and is_numeric($nombre)){
                 if($nombre<=0){
                   $num=1;
                 }
                   else if($nombre>=$last_page and $last_page>0){
                      $num=$last_page;
                   } 
                   else{
                   $num=$nombre;
                   }
                if(!is_numeric($nombre))
                      $num=1;      
        }
        else{
          $num=1;
        }
        // la formule pour trouver la limite qui av sortir
        $limit='LIMIT '.(($num*$nombre_par_page)-$nombre_par_page).','.$nombre_par_page ;
        $pre=$this->_con->prepare("SELECT id,titre,contenu,photo,date_pub FROM articles  WHERE CONCAT(titre,contenu) LIKE ? ORDER BY id DESC $limit  ");
        $pre->execute(array('%'.$this->_reche.'%'));
        self::$paginate='';
         // creation de pagination 
        if($last_page>1){
          // verification de liens precedents
              if($num>1){
                $precedent=$num-1; 
                self::$paginate.='<a href="search.php?q='.$_GET["q"].'&page='.$precedent.'"><span class="next">precedent</span></a>';
                 for($i=$num-self::APRES_AVANT;$i<$num;$i++){
                   if($i>0){
                    self::$paginate.='<a href="search.php?q='.$_GET["q"].'&page='.$i.'"><span class="lien">'.$i.'</span></a>';
                   }
                 }
              }
              // lien du milieu du pagination
              self::$paginate.='<span>'.$num.'</span>';
             // verification de liens suivants
             if($num<$last_page){
               $suivant=$num+1;
               for($i=$num+1;$i<$num+self::APRES_AVANT;$i++){
                 if($i>=$last_page){
                       break;
                    }
                  self::$paginate.='<a href="search.php?q='.$_GET["q"].'&page='.$i.'"><span class="lien">'.$i.'</span></a>';
                 }
                 self::$paginate.='<a href="search.php?q='.$_GET["q"].'&page='.$suivant.'"><span class="next">suivant</span></a>'; 
               }
           // fin condition last_page
             }
             return $pre->fetchAll();
       }
    }
    function newsletter($p){
      $gmail=filter_var($p,FILTER_VALIDATE_EMAIL);
      if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$gmail)){
        $pre=$this->_con->prepare("INSERT INTO newsletter(gmail,date_pub) VALUES(?,NOW())");
        $pre->execute(array($gmail));
        return'<span id="su">votre message à été envoyé avec succes</span>';
      }
      else{
        return "votre gmail n'est pas correct";
      }
    }
    function recuperation_newsletter(){
      $pre=$this->_con->query("SELECT * FROM newsletter ORDER BY id DESC");
      return $pre->fetchAll();
    }
    function photo($login){
      $prepare_requete=$this->_con->prepare('SELECT photo FROM admin_compte WHERE login_ad=? ');
      $prepare_requete->execute(array($login));
        return $prepare_requete->fetch();
    }
    // controle de l'admin dens le commentaire
    function controle_admin($nom){
      $prepare_requete=$this->_con->prepare('SELECT * FROM admin_compte WHERE login_ad=? ');
      $prepare_requete->execute(array($nom));
        return $prepare_requete->fetch(); 
    }
    //bonus livre pour apprentissage
     function bonus_livre($prenom,$gmail){
       $prenom=htmlspecialchars($prenom);
       if(isset($prenom)&& !empty($prenom)&& isset($gmail)&& !empty($gmail)){
        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$gmail)){
          $pre=$this->_con->prepare("INSERT INTO bonus_livre(prenom,gmail,date_pub) VALUES(?,?,NOW())");
          $pre->execute(array($prenom,$gmail));
          return'<span id="su">votre message à été envoyé avec succes</span>';
           }
        else
          return'<span class="errop">votre gmail n\'est pas correct</span>';
         }
       else
           return '<span class="errop">Veuillez remplir ces champs</span>'; 
     }
     function inscription($pseudo,$gmail,$pass,$pass2){
         if(isset($pseudo)&& !empty($pseudo)&&isset($gmail)&& !empty($gmail)&& isset($pass)&& !empty($pass)){
             if($pass!=$pass2)
              return '<span class="errop">Erreur les deux mot de passes sont different </span>';  
              else if(strlen($pass)<8)
                 return '<span class="errop">Erreur les mots de passe ne peuvent pas avoir moins de 8 caracteres </span>';  
             else {
                      //verification email
                  if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$gmail)){
                        $ca=$this->_con->prepare("SELECT * FROM  inscription WHERE gmail=?");
                        $ca->execute(array($gmail));
                        if($ca->rowCount()!=0){
                          return '<span class="errop">gmail saisie est déjà  utiliser </span>';
                        }
                        else{
                          $pre=$this->_con->prepare("INSERT INTO inscription(pseudo,gmail,pass,date_pub) VALUES(?,?,?,NOW())");
                          $pre->execute(array($pseudo,$gmail,$pass));
                            return'<span id="su">votre message à été envoyé avec succes</span>';
                        }
                    }
                    else{
                      return '<span class="errop">votre gmail est invalide</span>'; 
                    }
                }
         }
         else{
              return '<span class="errop">veuillez remplir tous les champs</span>'; 
         }
     }
     function recuperation_mise_en_jour_image_index_affichage(){
      $req=$this->_con->query('SELECT * from mise ORDER BY id DESC LIMIT 1');
       return $req->fetch();
    }
    function connecter($gmail,$pass){
      $ca=$this->_con->prepare("SELECT * FROM  inscription WHERE gmail=? AND pass=?");
      $ca->execute(array($gmail,$pass));
         return $ca->rowCount();
    }
    function rejoindre_coding_africa($pseudo,$gmail,$tel){
      if(isset($pseudo)&& !empty($pseudo)&&isset($gmail)&& !empty($gmail)&& isset($tel)&& !empty($tel)){ 
         if(strlen($tel)<10)
            return '<span class="errop">Erreur le numero ne peuvent pas avoir moins de 10 chiffres </span>';  
        else {
                 //verification email
             if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$gmail)){
                   $ca=$this->_con->prepare("SELECT * FROM  rejoin WHERE gmail=?");
                   $ca->execute(array($gmail));
                   if($ca->rowCount()!=0){
                     return '<span class="errop">gmail saisie est déjà  utiliser </span>';
                   }
                   else{
                     
                     $pre=$this->_con->prepare("INSERT INTO rejoin(pseudo,gmail,telephone,date_pub) VALUES(?,?,?,NOW())");
                     $pre->execute(array($pseudo,$gmail,$tel));
                       return'<span id="su">votre message à été envoyé avec succes</span>';
                   }
               }
               else{
                 return '<span class="errop">votre gmail est invalide</span>'; 
               }
           }
    }
    else{
         return '<span class="errop">veuillez remplir tous les champs</span>'; 
    }
    }
    function pdf_recu(){
      $ca=$this->_con->query("SELECT * FROM pdf");
       return $ca->fetchAll();
    }
    function pdf_source_recu(){
      $ca=$this->_con->query("SELECT * FROM pdf_code");
       return $ca->fetchAll();
    }

    //recuperation cours 

    function cours_recuperation($tables,$id){
      $id=(int)$id;
      if($id>8){
        $id=8;
      }
      if($id<1){
        $id=1;
      }
      //on a mis  les tables dans un tableau pour bien se reperer 
      $tab=["html","php","javascript","vuejs","csharp","langage_c","algorithme","python"];
      // verification des tables
      if(isset($tables)and !empty($tables) and is_numeric($tables) and isset($id)and !empty($id)and is_numeric($id)){
            $tables=$tables-1;
            if( $tables>=count($tab)){
               $tables=count($tab)-1;
            }
            $rec=$tab[$tables];
            $compter=$this->_con->query("SELECT * FROM $rec");
            if($id>$compter->rowCount()){
              $id=$compter->rowCount();
            }
            $req=$this->_con->query("SELECT * FROM $rec ");
            return $req->fetchAll();
      }
    }
  function cours_id($id,$tables){
    $id=(int)$id;
    if($id<1){
      $id=1;
       }
       $tables=(int)$tables;
        //on a mis  les tables dans un tableau pour bien se reperer 
      $tab=["html","php","javascript","vuejs","csharp","langage_c","algorithme","python"];
       if(isset($id)and !empty($id)and is_numeric($id)and isset($tables)and !empty($tables)){
        $tables=$tables-1;
        if( $tables>=count($tab)){
          $tables=count($tab)-1;
       }
        $rec=$tab[$tables];
        $compter=$this->_con->query("SELECT * FROM $rec");
        if($id>$compter->rowCount()){
          $id=$compter->rowCount();
        }
        $req=$this->_con->prepare("SELECT * FROM $rec WHERE id=?");
        $req->execute(array($id));
        return $req->fetchAll();
       }
     }
     // fonction de pagination de cours 
     function pagi_cours($tables,$id){
       $table=(int)$tables;
      $id=(int)$id;
      if($id<1){
        $id=1;
         }
         $tables=(int)$tables;
          //on a mis  les tables dans un tableau pour bien se reperer 
        $tab=["html","php","javascript","vuejs","csharp","langage_c","algorithme","python"];
         if(isset($id)and !empty($id)and is_numeric($id)and isset($tables)and !empty($tables)){
          $tables=$tables-1;
          if( $tables>=count($tab)){
            $tables=count($tab)-1;
         }
          $rec=$tab[$tables];
          $compter=$this->_con->query("SELECT * FROM $rec");
          $last=$compter->rowCount();
          if($id>$last){
            $id=$last;
          }
          if($id<=0){
            $id=1;
          }
          self::$pagi="";
          if($last>=2){
             if($id>1){
               $precedent=$id;
               $precedent=(int)$precedent-1;
               $req=$this->_con->prepare("SELECT * FROM $rec WHERE id=?");
               $req->execute(array($precedent));
               $re=$req->fetchAll();
               //remplace les espace par des tirets 
               $ur=str_replace("?"," ", trim($re[0]["titre"]));
               $url=str_replace(" ","-",trim($ur)) .'-'.$table.'-'.$precedent;
               self::$pagi.='<a href="'.$url.'"><span class="pa-precedent">Precedent</span></a>';
             }
             if($id==1){
              self::$pagi.='<a href="../coding.php"><span class="pa-precedent">Home</span></a>';
             }
             // verification du suivant ou de boutton suivant 
             if($id<$last){
                  $suivant=$id;
                  $suivant=(int)$suivant+1;
                  $req1=$this->_con->prepare("SELECT * FROM $rec WHERE id=?");
                  $req1->execute(array($suivant));
                  $re1=$req1->fetchAll();
                  //remplace les espace par des tirets 
                  $ur1=str_replace("?"," ", trim($re1[0]["titre"]));
                  $url1=(str_replace(" ","-", $ur1)).'-'.$table.'-'.$suivant;
                 self::$pagi.='<a href="'.$url1.'"><span class="pa-suivant">Suivant</span></a>'; 
             }
          }
     }
     return self::$pagi;
  }
}
