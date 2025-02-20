<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB test doc</title>
  <link rel="stylesheet" href="styles/style.css"></style>

</head>
<style>
  .logout_container{
    position: absolute;
    top: 58px;
    left: 0;
  }
  .logout_container > a{
    color: black !important;
  }
</style>
<body>

<div class="nav_wrapper">
  <div class="nav_container">
    <div class="nav_name">
      <h1>
        <a id="nav_links" href="/">Anthony Ciocco</a>
      </h1>
      <?php
      if (isset($logged_in)){
        if($logged_in){
          echo "<div class='logout_container' ><a href='./logout.php'> Log Out </a></div>";
        }
      }
      else{
        echo "";
      }
      ?>
      </div>
    <div class="nav_item">
      <h3><a id="nav_links" href="/">Home</a></h3>
      </div>
    <div class="nav_item">
      <h3><a id="nav_links" href="/antdocs.php">[Antdocs]</a></h3>
      </div>
      
  </div>
</div>