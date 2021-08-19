<?php


function acceder($bdd, $email){
$req = $bdd->prepare('SELECT * FROM abw_admin WHERE admin_email = ? ');
$req ->execute(array($email));
return $req;
}

?>