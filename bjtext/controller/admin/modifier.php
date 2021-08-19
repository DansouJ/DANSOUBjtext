<?php
include('../../config.php');
include('../../modele/modifier.php');
$erreur = "";

if(isset($resultat['news_id'])){
    

    // $_POST['id']=$resultat['news_id'];
    // $titre=$resultat['news_titre'];
    // $_POST['description']=$resultat['news_description'];
    //  $_POST['contenu']=$resultat['news_contenutext'];
    //  $_POST['image']=$resultat['news_image'];
    $id         = $resultat['news_id'];
    $titre      = $resultat['news_titre'];
    $description =$resultat['news_description'];
    $contenu    =$resultat['news_contenutext'];
    $monfichier = $resultat['news_image'];
}
//die($monfichier);
if(isset($_POST['submit1'])){
    $titre= verifierInput($_POST['titre']);
    $description= verifierInput($_POST['description']);
    $contenu= verifierInput($_POST['contenu']);
    $imag = verifierInput($_FILES['image']['name']);
    $imagePath = '../../asset/images/'.uniqID().basename($imag);
    $image_ext = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
    if(empty($titre)){
        $erreur = "Veillez entrez le titre";
    }
    if(empty($description)){
            $erreur = "Veillez entrez la description";
    }
    elseif(empty($contenu)){
        $erreur = "Veillez entrez le contenu";
    }
    elseif(empty($imag)){
       modifier1($bdd, $titre, $description, $contenu, $id);
       header('Location:index.php');
    }

    elseif($image_ext !="png" && $image_ext !="jpg" && $image_ext !="jpeg" && $image_ext !="gif")
    {
            $erreur = "Les fichiers autorisés sont : .png, .jpeg, .gif, .jpg";
    }
    elseif(file_exists($imagePath))
    {
            $erreur = "L'image existe dejà";
    }
    elseif($_FILES["image"]["size"] > 500000)
    {
            $erreur = "La taille de l'image dépasse 5Mo";
    }
    elseif(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath))
            {
                    $erreur= "il y a eu une erreur lors de téléchargement";
            }
    else{
            $modnam = substr($imagePath, 19, 20).'.'.$image_ext;
            rename($imagePath,'../../asset/images/'.$modnam);
            $copierImage = move_uploaded_file($_FILES['image']['tmp_name'], $modnam);
            modifier($bdd, $titre, $description, $contenu,$modnam, $id);
            unlink($monfichier);
          // die("modification éffectuer avec succès");
            header('Location:index.php');
    }
}



include('../../vue/admin/modifier.php');