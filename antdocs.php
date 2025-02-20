<?php  
  include "includes/header.php";
  include "includes/db-connect.php";
  include "includes/functions.php";
  $sql = "SELECT title, description, thumbnail, url_slug FROM article;";
  $state = pdo($pdo, $sql);
  $return = $state->fetchAll();
      
?>
<div class="article_wrapper">
  <h1>I owe you an explaination...</h1>
  <div class="article_content">
    <div class="article search"></div>
    <div class="article_show">

      <?php foreach($return as $item){ ?>

        <div class="article_single" >
          
          <img class="article_img" src="./uploads/<?= $item['thumbnail']?>" >
          <a class="article_link" href="./post.php?title=<?= $item['url_slug'] ?>">
            <h2 class="article_title"><?= $item['title'] ?></h2>
          </a>
          <p class="article_description"><?= $item['description'] ?></p>
        </div>

      <?php } ?>
    </div>
  </div>
</div>



<?php include "includes/footer.php" ?>