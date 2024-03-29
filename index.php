  <?php
   
   // pour tester et pouvoir imprimer mes données en forme d'array
   //var_dump($_POST);

  //Connexion à la BDD
  if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
    // tester la présence d'erreurs et connexion à la base de donées
    try
    {
    $bdd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root','');
    }
    catch (Exception $e)
    {
    die('Erreur : ' . $e->getMessage());  
    }
    //declaration des variables
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //verification du password
      // si les passwords coincident, un message de validation s'affiche
      if($_POST['password'] == $_POST['cpassword'])
      {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      include ("confirmation.php");
      } 
      // si les passwords sont différents le formulaire ne s'envoie pas, et redirige vers une page d'erreur
      if ($_POST['password'] != $_POST['cpassword']) 
      {
      header ('location:wrongpass.php');
      }
    //si tous les champs sont remplis et les passwords sont corrects, on envoi les données vers la BDD
      else {
        echo 'ok';
          $req = $bdd->prepare('INSERT INTO student(username,email,password) VALUES(:username, :email, :password)');
          $req->execute(array(
          'username' => $username,
          'email' => $email,
          'password' => $password)); 
      }
    }     
  ?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Registration form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>

    <div class="container">
      <div class="row">
        <div class="col-9">

          <form action="index.php" method="post">

            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Enter username" name="username">
              <small id="emailHelp" class="form-text text-muted">Be original and write a funy one.</small>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>


            <div class="form-group">
              <label for="inputPassword6">Password</label>
              <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" name="password">
              <small id="passwordHelpInline" class="text-muted">
                Must be 8-20 characters long.
              </small>
            </div>

            <div class="form-group">
              <label for="inputPassword6">Confirm your password</label>
              <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" name="cpassword">
              <small id="passwordHelpInline" class="text-muted">
                Must be 8-20 characters long.
              </small>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

  </html>
