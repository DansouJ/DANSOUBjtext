<?php
include('../../modele/supprimer.php');
$id=$_GET['news_id'];
      $select = selectionner($bdd,$id);
      while($donnee = $select->fetch())
      {
        $imagede='../../asset/images/'.$donnee['news_image'];
      }
      supprimer($bdd);
      unlink($imagede);
      print_r($imagede,unlink($imagede),$id);
header('Location:index.php');


//if (isset($)),
