<?php
        include('../../config.php');
        include('../../modele/ajouter.php');
        
        $erreur= "";

if(isset($_POST['submit1'])){
        $titre= verifierInput($_POST['titre']);
        $description= verifierInput($_POST['description']);
        $contenu= verifierInput($_POST['contenu']);
        $imag = verifierInput($_FILES['image']['name']);
        $imagePath = '../../asset/images/'.uniqID().basename($imag);
        $image_ext = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));


        if(empty($description)){
                $erreur = "Veillez entrez la description";
        }
        elseif(empty($contenu)){
            $erreur = "Veillez entrez le contenu";
        }
        elseif(empty($imag)){
            $erreur = "Veillez insérer une image";
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
                ajouter($bdd, $titre, $description, $contenu, $modnam);
                
                 $copierImage = move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
                 header('Location:index.php');
         }


}
Include('../../vue/admin/actualite.php');
?>