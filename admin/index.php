<?php
  include '../includes/session.php';
  if($logged_in){
    header('Location: view.php');
    exit;
  }
  include '../includes/db-connect.php';
  include '../includes/functions.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = 'SELECT password_hash from admin where email = :email;';
    $statement = pdo($pdo,$sql,['email'=>$email]);
    $result = $statement->fetch();
    $hash = $result['password_hash'];

    if ($hash && password_verify($password, $hash)){
      login();
      header('Location: view.php');
      exit;
    }
    else{
      echo 'Failure';
    }
  }
?>
<?php
  include '../includes/header.php';
?>
<head>
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="../styles/admin.css">

</head>

<?= $logged_in ?>
<div class="signin_wrapper">
  <div class="signin_container">
    <form action="./" method="post">
      <label for="email">Email</label>
      <input name="email" type="email">

      <label for="password">Password</label>
      <input name="password" type="password">
      <input type="submit" value="Submit">
    </form>
  </div>
</div>

<?php
  include '../includes/footer.php';
?>