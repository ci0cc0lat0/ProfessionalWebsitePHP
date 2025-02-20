<?php  
  include "includes/header.php";
  include "includes/db-connect.php";
  include "includes/functions.php";

  $url_query = $_GET['title'];
  $sql = 'select title, description, thumbnail, docs_link from article where url_slug = :url_slug;';
  $state = pdo($pdo,$sql,[ 'url_slug'=> $url_query]);
  $return = $state->fetch();
?>

<div class="post_wrapper">
  <div class="post_container">
    <img class="post_img" src="<?="./uploads/". $return['thumbnail'] ?>" alt="">
    <h2 class="post_title"><?= $return['title']?></h2>
    <p class="post_desc"><?= $return['description']?></p>
    <iframe class="post_iframe" src="<?= $return['docs_link'] ?>" class="post_iframe">
      
    </iframe>

  </div>

</div>

<style>
</style>
<?php include "includes/footer.php" ?>