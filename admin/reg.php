<?php
  include '../includes/session.php';
  include '../includes/db-connect.php';
  include '../includes/functions.php';
  include '../includes/header.php';
?>
<head>
  <link rel="stylesheet" href="../styles/style.css">
</head>
<?php
  if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $email = $_POST['email'];
    $pw = $_POST['password'];
    $hash = password_hash($pw,PASSWORD_BCRYPT);
    $sql = 'INSERT INTO admin (email, password_hash) VALUES (:email, :hash);';
    $statement = pdo($pdo, $sql,
    ['email'=>$email,
    ':hash'=>$hash]);
    echo "success";


  }
?>
<div class="signup_wrapper">
  <div>
    <form action="reg.php" method="post">
      <label for="email">Email</label>
      <input name="email" type="email">

      <label for="password">Password</label>
      <input name="password" type="password">

      <input type="submit" value="Submit">
    </form>
  </div>
</div>

<?php include '../includes/footer.php'; ?>