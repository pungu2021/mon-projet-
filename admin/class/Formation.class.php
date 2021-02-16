<?php
  /**
   * creation de la classe  Afrikode
   */
  class Formation{
      // declaration des attributs
    private $_cnx="mysql:host=localhost;dbname=rlab";
    private  $_user="root";
    private $_pass="";
    private $_con;

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
    // Insertion des données dans la table correspondante
    function Insertion_données($titre,$contenus,$tables){
         $titre=htmlspecialchars(trim($titre));
         $tables=htmlspecialchars(trim($tables));
         /**
          * verification des information s'il existe
          */
         if(isset($titre)and !empty($titre)and isset($contenus)and !empty($contenus)and isset($tables)and !empty($tables))
         {
             $req=$this->_con->prepare("INSERT INTO $tables(titre,contenu) VALUES(?,?)");
             $req->execute(array($titre,$contenus));
         }
    }
    // recu^peration des données des formations
    function recuperation_des_donneées($tables){
      if(isset($tables)and !empty($tables))
        $req=$this->_con->query("SELECT * FROM $tables");
        return $req->fetchAll();
    }
    // recuperation pour modifier les données
    function recupe($id,$tables) {
      $id=(int)$id;
      $req=$this->_con->prepare("SELECT * FROM $tables WHERE id =?");
      $req->execute(array($id));
      return $req->fetchAll();
    }
    // modification dans la base de données
    function modification_dans_base_des_donneés($id,$titre,$contenus,$tables){
      if(isset($id)and !empty($id) and isset($titre)and !empty($titre) and isset($contenus)and !empty($contenus)and isset($tables)and !empty($tables))
      {
         $req=$this->_con->prepare("UPDATE $tables SET titre=?, contenu=? WHERE id =?");
         $req->execute(array($titre,$contenus,$id));
      }
    }
    function suppression($id, $tables){
      $req=$this->_con->prepare("DELETE FROM $tables WHERE id=?");
      $req->execute(array($id));
    }
}