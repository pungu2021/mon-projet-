<?php
session_start();
   try{
    // connexion avec la base de donnée
      $con= new PDO('mysql:host=localhost;dbname=rlab','root','');
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  // si la connexion à echouer
  catch(PDOException $e){
    // message d'erreur
  $ms='Erreur de connexion avec la base de donnée '.$e->getMessage();
        die($ms);
  }
if(isset($_POST['pseudo1']) and !empty($_POST['pseudo1']) and isset($_POST['gmail1'])and !empty($_POST['gmail1']) and isset($_POST["message1"])and !empty($_POST['message1']) and isset($_POST["id_com"])and !empty($_POST["id_com"]) )
{
  $pseud=htmlspecialchars(strip_tags($_POST["pseudo1"]));
  $gmail=$_POST['gmail1'];
  $message=htmlspecialchars(strip_tags($_POST["message1"]));
  $art=(int)$_POST["id_com"];
  if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$gmail)){
    $req=$con->prepare("INSERT INTO repondre(id,pseudo,gmail,mesage,pub_mes,auteur) VALUES(?,?,?,?,NOW(),?)");
    $req->execute(array($art,$pseud,$gmail,$message,$_SESSION["login"]));
    $url=$_SESSION["url"];
    $_SESSION["conf"]='<span class="cool">Votre message a été  envoyé</span> ';
    header("location:$url");
  }
  else {
    $url=$_SESSION["url"];
    $_SESSION["conf"]=' <span class="erro">votre gmail est invalid</span>';
    header("location:$url");
   } 
    
}
else{
$url=$_SESSION["url"];
$_SESSION["conf"]= '<span class="erro">Votre message n\'a été  envoyé veuillez verifier vos champs </span>';
header("location:$url");
}


 