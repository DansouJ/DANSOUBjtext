<?php
include('../../config.php');
include('../../service.php');
/*
function ajouter($bdd){
$requete = $bdd->prepare("INSERT INTO abw_news (news_titre, news_description, news_contenutext, news_image, news_date,slug) VALUES (?,?,?,?,?,?)");
$resultat = $requete->execute( array(htmlspecialchars($_POST['titre']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['contenu']), htmlspecialchars($_POST['image']),date("Y-m-d H:i:s"), mettreslug($_POST['titre'])));
  }
  */

  //$last_id = $bdd->lastInsertId();
  function ajouter($bdd, $titre, $description, $contenu, $imag){
  $requete = $bdd->prepare("INSERT INTO abw_news (news_titre, news_description, news_contenutext, news_image, news_date,slug) VALUES (?,?,?,?,?,?)");
  $resultat = $requete->execute(array($titre, $description, $contenu, $imag, date("Y-m-d H:i:s"), mettreslug($titre)));
  return $resultat;
  }
?>