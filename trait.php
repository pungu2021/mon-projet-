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

if(isset($_POST['pseudo']) and !empty($_POST['pseudo']) and isset($_POST['gmail']) and !empty($_POST['gmail']) and isset($_POST["message"]) and !empty($_POST['message']) and isset($_POST["art"])and !empty($_POST['art']) )
{
  $pseud=htmlspecialchars(strip_tags($_POST["pseudo"]));
  $gmail=$_POST['gmail'];
  $message=htmlspecialchars(strip_tags($_POST["message"]));
  $art=(int)$_POST["art"];
  if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$gmail)){
    $req=$con->prepare("INSERT INTO commentaire(pseudo,gmail,mesage,id_article,pub_mes,auteur) VALUES(?,?,?,?,NOW(),?)");
    $req->execute(array($pseud,$gmail,$message,$art, $_SESSION["login"]));
    $url=$_SESSION["url"];
    $_SESSION["conf"]='<span class="cool">Votre message a été  envoyé </span>';
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
$_SESSION["conf"]=' <span class="erro">Votre message n\'a été  envoyé veuillez verifier vos champs </span>';
header("location:$url");
}

 