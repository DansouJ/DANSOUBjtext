<?php 	
    include('../../config.php');
  //include('../../vue/admin/index.php');
            // $monfichier = $resultat['news_image';

// $id=$_GET['news_id']; // On récupére le ID dans l'url par exemple
// $del=mysqli_query($bdd, "DELETE FROM abw_news WHERE id='$id'");

// if(!$SupprimerSQL){
//     echo "<p class='alert alert-danger'>L'enregistrement n'a pas été supprimé</p>";
// }
// else {
//     echo "<p class='alert alert-success'>Le disque ".$_GET['ID']." a bien été supprimé</p>";
// }
   
     function selectionner($bdd,$id){
         $aff = $bdd->prepare("SELECT * FROM abw_news WHERE news_id=?");
                $aff->execute(array($id));
         return $aff;
     }

     function supprimer($bdd){
        
		$del=$bdd->prepare("DELETE  FROM abw_news WHERE news_id=?");
		$del->execute(array($_GET['news_id']));
     }
      
      
?>