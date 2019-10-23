<?php
// tester la présence d'erreurs 
try
{
  $bdd = new PDO('mysql:localhost; dbname=becode', 'root','');
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}

  $req = $bdd->prepare('INSERT INTO student(username,email,password)VALUES(:username, :email, :password)');
  $req->execute (array(
  'username' => $username,
  'email' => $email,
  'password' => $password  
  ));
  
  header('location:index_post.php')

  ?>
