<?php 

class Admin
{

  private $bd;
  private $id ;
  private $nom ;
  private $email ;
  private $message ;
  
  public function __construct()
  {
     try
     {
         $this->bd = new PDO ("mysql:host=localhost;dbname=afrikode",'root','');
     } catch (PDOException $e)
     {
      die($e->getMessage()) ;
     }
  }

  public function afficherMessage() 
  {  
      $tab=[];
    $requete=$this->bd->query("SELECT * FROM contact ORDER BY id DESC") ;
    $tab=$requete->fetchAll();
     
    foreach($tab as $valeur) 
    {
     echo 
          "<tr>
            <td>{$valeur['nom']}</td>
            <td>{$valeur['email']}</td>
            <td>{$valeur['messages']}</td>
        </tr> \n" ;     
    }
    
     
  }

  public function nbreMessage()
  {
    $tab=[];
    $requete=$this->bd->query("SELECT * FROM contact ORDER BY nom") ;
    $tab=$requete->fetchAll();

    echo count($tab) ;

  }


}


