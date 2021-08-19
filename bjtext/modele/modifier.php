<?php
    include('../../config.php');
    include('../../service.php');

    function modifier($bdd, $titre, $description, $contenu, $imag, $id){ //var_dump($image); var_dump($description);die();
        $mise = $bdd->prepare("UPDATE abw_news SET news_titre=?,  news_description=?,news_contenutext=?, news_image=?, slug=? WHERE news_id=?");
        $resultat=$mise->execute(array($titre, $description, $contenu, $imag, mettreslug($titre),$id));
        return $resultat;
    }

    function modifier1($bdd, $titre, $description, $contenu, $id){ //var_dump($titre); var_dump($description);die();
        $mise = $bdd->prepare("UPDATE abw_news SET news_titre=?,  news_description=?,news_contenutext=?, slug=? WHERE news_id=?");
        $resultat=$mise->execute(array($titre, $description, $contenu, mettreslug($titre),$id));
        return $resultat;
    }

    function afficher($bdd,$id)
    {
      $req = $bdd->prepare('SELECT * FROM abw_texte WHERE slug =?');
      $req->execute(array($id));
      return $req;
    }
      




    if(isset($_GET['news_id'])){
        $mod=$bdd->prepare("SELECT * FROM abw_news WHERE news_id=?");
        $mod->execute(array($_GET['news_id']));
        $resultat=$mod->fetch();
    }

?>