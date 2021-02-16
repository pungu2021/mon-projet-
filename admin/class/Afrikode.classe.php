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
    private const APRES_AVANT=4;
    private $reche;
    public static $rayan;
    public static $login=null;
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
    public function Insertion($titre,$contenu,$photo,$categorie,$auteur){
      // suppression de caractere illegaux
        $titre=htmlspecialchars(trim($titre));
        $contenu_photo=$photo['name'];
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
                $prepare_requete=$this->_con->prepare('INSERT INTO articles(titre,contenu,photo,categorie,date_pub,auteur) VALUES(?,?,?,?,NOW(),?)');
                $prepare_requete->execute(array($titre,$contenu,$contenu_photo,$categorie,$auteur));
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
     public function  Modification($titre,$contenu,$photo,$categorie,$id){
        // suppression de caractere illegaux
      $titre=htmlspecialchars($titre);
      $id=(int)$id;
      $temporaire=$photo['tmp_name'];
      $photo=$photo['name'];
      // modification de donnée dans la base de donnée
      move_uploaded_file($temporaire,'../img/'.$photo);
      // verification si les parametre passer existe et ils ne sont pas nuls
      if(isset($titre) and !empty($titre) and isset($contenu) and !empty($contenu) and isset($photo) and !empty($photo)and is_numeric($id) and !empty($id)){
         // modification de donnée dans la base de donnée
              $prepare_requete=$this->_con->prepare('UPDATE articles SET titre=?,contenu=?,photo=?,categorie=?,date_pub=NOW() WHERE id=?');
              $prepare_requete->execute(array($titre,$contenu,$photo,$categorie,$id));
      }
     }
      /**
       *suppression des de données dans la base de données
       */
    public  function Suppression($id,$img){
      if(isset($id) and is_numeric($id) and !empty($id)){
        $id=(int)$id;
        // Suppression de donnée dans la base de donnée
               $fichier='/img/'.$img;
               if(file_exists($fichier))
                  unlink($fichier);
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
      $req=$this->_con->prepare('SELECT * from commentaire WHERE id_article=?');
      $req->execute(array($id));
      return $req->fetchAll();
    }
    public function recupe_reponse($id){
      $id=(int)$id;
      $req=$this->_con->prepare('SELECT * from repondre WHERE id=?');
      $req->execute(array($id));
      return $req->fetchAll();
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

         $this->_reche=htmlspecialchars(strip_tags($key));
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
    function recuperation_newsletter(){
      $pre=$this->_con->query("SELECT * FROM newsletter ORDER BY id DESC");
      return $pre->fetchAll();
    }
    function suppression_newsletter($id){
      $id=(int)$id;
      $pre=$this->_con->prepare("DELETE FROM newsletter WHERE id=:id");
     $pre->bindParam(":id",$id);
      $pre->execute();
    }
    public function rec_commentaire(){
      $req=$this->_con->query('SELECT * from commentaire ORDER BY id DESC LIMIT 0,10');
      return $req->fetchAll();
    }
    public function rec_reponse(){
      $req=$this->_con->query('SELECT * from repondre ORDER BY id_auto DESC LIMIT 0,10');
      return $req->fetchAll();
    }
    function approuver_commentaire($id){
      $num=1;
      $prepare_requete=$this->_con->prepare('UPDATE commentaire SET approuver=? WHERE id=?');
      $prepare_requete->execute(array($num,$id));

    }
    function approuver_repondre($id){
      $num=1;
     $prepare_requete=$this->_con->prepare('UPDATE repondre SET approuver=? WHERE id_auto=?');
      $prepare_requete->execute(array($num,$id));

    }
    function supprimer_repondre($id){
      $prepare_requete=$this->_con->prepare('DELETE FROM repondre WHERE id_auto=?');
      $prepare_requete->execute(array($id));

    }
    function supprimer_commentaire($id){
      $prepare_requete=$this->_con->prepare('DELETE FROM commentaire WHERE id=?');
      $prepare_requete->execute(array($id));

    }
    function validation_admin($login,$password){
       $logino=htmlspecialchars(strip_tags($login));
       $password=htmlspecialchars(strip_tags($password));
       $prepare_requete=$this->_con->prepare('SELECT * FROM admin_compte WHERE login_ad=? and password_ad=?');
       $prepare_requete->execute(array($logino,$password)); 
       if($prepare_requete->rowCount()==0){
          return 0;
       }
        else{ 
            self::$login=$logino;
            return 1; 
        }
    }
    function Modification_admin($login,$password,$id){
     // modification de donnée dans la base de donnée
       if(isset($login)&& !empty($login) && isset($password)&& !empty($password)){
        $prepare_requete=$this->_con->prepare('UPDATE admin_compte SET login_ad=?,password_ad=? WHERE id=?');
        $prepare_requete->execute(array($login,$password,$id));
       }
    }
    function Suppression_admin($id){
      $prepare_requete=$this->_con->prepare('DELETE FROM admin_compte WHERE id=?');
      $prepare_requete->execute(array($id));
    }
    // ajout des administrateur

  function ajout_admin($login,$pass,$img){
         $login=htmlspecialchars(trim($login));
         $pass=htmlspecialchars(trim($pass));
        $contenu_photo=htmlspecialchars(trim($img['name']));
        $temporaire=$img['tmp_name'];
        $tab=explode(".",$contenu_photo);
      if(isset($login)&& !empty($login)&&isset($pass)&& !empty($pass)&&isset($img)&& !empty($img)){
        if(preg_match('#.jpg$|.png$#i',$contenu_photo)){
          $mag=explode(" ",$login);
          $contenu_photo=$mag[0].$mag[1].'.'.end($tab);
          move_uploaded_file($temporaire,'../img_admin/'.$contenu_photo);
          $prepare_requete=$this->_con->prepare('INSERT INTO admin_compte(login_ad,password_ad,photo,ordinaire) VALUES(?,?,?,?)');
          $prepare_requete->execute(array($login,$pass,$contenu_photo,0));
        }
      }
      }
      // recuperation des administrateurs
      function recuperation_admin(){
        $req=$this->_con->query('SELECT * from admin_compte ORDER BY id DESC ');
        return $req->fetchAll();
      }
      function connaitre($nom){
        $ordi=1;
        $prepare_requete=$this->_con->prepare('SELECT * FROM admin_compte WHERE login_ad=? and ordinaire=?');
        $prepare_requete->execute(array($nom,$ordi)); 
        if($prepare_requete->rowCount()==0){
           return 0;
        }
         else{ 
             return 1; 
         }
      }
      // recupation des donneés admin
      function Recupara_admin($id){
        $prepare_requete=$this->_con->prepare('SELECT * FROM admin_compte WHERE id=? ');
        $prepare_requete->execute(array($id));
          return $prepare_requete->fetchAll();
      }
      function Modification_admin2($login,$password,$photo,$id){
        $login=htmlspecialchars(trim($login));
        $password=htmlspecialchars(trim($password)); 
        $temporaire=$photo['tmp_name'];
        $photo=$photo['name'];
        $tab=explode(".",$photo);
        $mag=explode(" ",$login);
        $photo=$mag[0].$mag[1].'.'.end($tab);
        // modification de donnée dans la base de donnée
        move_uploaded_file($temporaire,'../img_admin/'.$photo);
          if(isset($login)&& !empty($login) && isset($password)&& !empty($password)&& isset($photo)&& !empty($photo) ){
           $prepare_requete=$this->_con->prepare('UPDATE admin_compte SET login_ad=?,password_ad=? ,photo=? WHERE id=?');
           $prepare_requete->execute(array($login,$password,$photo,$id));
          }
       }
       // votra compte unique
       function votre_admin($login){
        $req=$this->_con->prepare('SELECT * from admin_compte WHERE login_ad=? ');
       $req->execute(array($login));
        return $req->fetch();
      
  }
  function mise_en_jour_de_image_index($photo){
    $temporaire=$photo['tmp_name'];
    $photo_contenu=$photo['name'];
    if(isset($photo_contenu)&& !empty($photo_contenu)){
         $tab=explode(".",$photo_contenu);
         $extension=end($tab);
         $photo_contenu='mise.'.$extension;
        move_uploaded_file($temporaire,'../img_jour/'.$photo_contenu);
      $req=$this->_con->prepare('UPDATE mise SET photo=?,date_pub =NOW() WHERE id=1');
      $req->execute(array($photo_contenu));
    }
  }
  function recuperation_mise_en_jour_image_index(){
    $req=$this->_con->query('SELECT * from mise ORDER BY id DESC');
     return $req->fetchAll();
  }
  function suppression_mise_en_jour_image_index($id){
    $id=(int)$id;
    $req=$this->_con->prepare('DELETE FROM mise WHERE id=?');
      $req->execute(array($id));
  }
  function recuperation_inscription(){
    $req=$this->_con->query('SELECT * from inscription ORDER BY id DESC');
    return $req->fetchAll();
  }
  function sup_inscription(){
    $this->_con->query('TRUNCATE TABLE inscription');
  }
  function suppression_inscription($id){
    $id=(int)$id;
    $req=$this->_con->prepare('DELETE FROM inscription WHERE id=?');
      $req->execute(array($id));
  }
  // insertion de pdf dans notre site
  function pdf_insertion($decription,$poid,$fichier){
    $temporaire=$fichier['tmp_name'];
    $photo_contenu=$fichier['name'];
       if(isset($decription)&& !empty($decription) && isset($poid)&& !empty($poid) && isset($photo_contenu)&& !empty($photo_contenu)){
            move_uploaded_file($temporaire,'../pdf/'.$photo_contenu);
          $req=$this->_con->prepare('INSERT INTO pdf(descriptio,poid,file_namo,date_pub) VALUES(?,?,?,NOW())');
          $req->execute(array($decription,$poid,$photo_contenu));
        
        //fin de la condition  
       }
  }
  //recuperation de avec id les pdf
  function pdf_rec($id){
    $req=$this->_con->prepare('SELECT * FROM pdf WHERE id=?');
    $req->execute(array($id));
    return $req->fetchAll();
  }
  // suppression grace id un pdf 
  function pdf_suppression($id){
    $req=$this->_con->prepare('DELETE FROM pdf WHERE id=?');
    $req->execute(array($id));
  }
  // Modification pdf grace a id 
  function pdf_modifier($decription,$poid,$fichier,$id){
    $temporaire=$fichier['tmp_name'];
    $photo_contenu=$fichier['name'];
    if(isset($decription)&& !empty($decription) && isset($poid)&& !empty($poid) && isset($id)&& !empty($id)){
      if(isset($photo_contenu)&& !empty($photo_contenu)){
            move_uploaded_file($temporaire,'../pdf/'.$photo_contenu);
          $req=$this->_con->prepare('UPDATE pdf SET descriptio=?,poid=?,file_namo=?,date_pub =NOW() WHERE id=?');
          $req->execute(array($decription,$poid,$photo_contenu,$id));
      }
      else{
        $req=$this->_con->prepare('UPDATE pdf SET descriptio=?,poid=?,date_pub =NOW() WHERE id=?');
        $req->execute(array($decription,$poid,$id));
      }
    }
  }
  // recuperation pdfs
  function pdf_recuperation(){
    $req=$this->_con->query('SELECT * FROM pdf');
    return $req->fetchAll();
  }
  function pdf_code_source($decription,$poid,$fichier){
    $temporaire=$fichier['tmp_name'];
    $photo_contenu=$fichier['name'];
       if(isset($decription)&& !empty($decription) && isset($poid)&& !empty($poid) && isset($photo_contenu)&& !empty($photo_contenu)){
            move_uploaded_file($temporaire,'../pdf/'.$photo_contenu);
          $req=$this->_con->prepare('INSERT INTO pdf_code(descriptio,poid,file_namo,date_pub) VALUES(?,?,?,NOW())');
          $req->execute(array($decription,$poid,$photo_contenu));
        
        //fin de la condition  
       }
  }

  function pdf_source_rec($id){
    $req=$this->_con->prepare('SELECT * FROM pdf_code WHERE id=?');
    $req->execute(array($id));
    return $req->fetchAll();
  }
  // suppression grace id un pdf 
  function pdf_source_suppression($id){
    $req=$this->_con->prepare('DELETE FROM pdf_code WHERE id=?');
    $req->execute(array($id));
  }
  // Modification pdf grace a id 
  function pdf_source_modifier($decription,$poid,$fichier,$id){
    $temporaire=$fichier['tmp_name'];
    $photo_contenu=$fichier['name'];
    if(isset($decription)&& !empty($decription) && isset($poid)&& !empty($poid) && isset($id)&& !empty($id)){
      if(isset($photo_contenu)&& !empty($photo_contenu)){
            move_uploaded_file($temporaire,'../pdf/'.$photo_contenu);
          $req=$this->_con->prepare('UPDATE pdf_code SET descriptio=?,poid=?,file_namo=?,date_pub =NOW() WHERE id=?');
          $req->execute(array($decription,$poid,$photo_contenu,$id));
      }
      else{
        $req=$this->_con->prepare('UPDATE pdf_code SET descriptio=?,poid=?,date_pub =NOW() WHERE id=?');
        $req->execute(array($decription,$poid,$id));
      }
    }
  }
  // recuperation pdfs
  function pdf_source_recuperation(){
    $req=$this->_con->query('SELECT * FROM pdf_code');
    return $req->fetchAll();
  }
 }
