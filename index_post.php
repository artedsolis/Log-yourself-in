<?php

try
{
  $bdd = new PDO('mysql:localhost; dbname=becode', 'root','');
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());  
}

  if(isset ($_POST['username'], $_POST['email'], $_POST['password']))
  {
  $req = $bdd->prepare('INSERT INTO student(username,email,password) VALUES(:username, :email, :password)');
  $req->execute(array(
  'username' => $username,
  'email' => $email,
  'password' => $password  
  ));  
  } 

header('Location:index.php');

?>
