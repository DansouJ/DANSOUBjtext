<?php 
session_start();
include('../../config.php');
include('../../modele/login.php');
	
if(isset($_POST['submit'])){
        if(isset($_POST['mail']) AND isset($_POST['mdp'])){
            $email = htmlspecialchars($_POST['mail']);
            $pass =htmlspecialchars(sha1($_POST['mdp']));
            $list=acceder($bdd, $email);
            $mot_de_pass_correct = false;        
           while($retour=$list->fetch()){
             if($retour['admin_email']==$email && $retour['admin_password']==$pass){
                $_SESSION['mdp']=$retour['admin_password'];
                $_SESSION['nom']=$retour['admin_nom'];
                $_SESSION['mail']=$retour['admin_email'];
                header("Location:index.php");
                $mot_de_pass_correct = true;
            }
            }
            if($mot_de_pass_correct == false){
                $error = "Invalide";
            }
        }
    }
    include ('../../vue/admin/connexion.php');
?>