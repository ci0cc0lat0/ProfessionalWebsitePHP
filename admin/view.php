<?php
  include '../includes/session.php';
  require_login($logged_in);
  include '../includes/header.php';
  include '../includes/db-connect.php';
  include '../includes/functions.php';
  ?>
<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    try{
      if($_POST['article_url_slug'])
      // Article delete
      $pdo->beginTransaction();
      $sql = "DELETE FROM article WHERE url_slug = :url_slug;";
      pdo($pdo,$sql,['url_slug'=>$_POST['article_url_slug']]);
      
      // Image delete
      $img_path = '../uploads/' . $_POST['article_tn'];
      if(file_exists($img_path) && $_POST['article_tn']){
        $unlink = unlink($img_path);
      }
      $pdo->commit();
    }
    catch (PDOException $e){
      $pdo->rollBack();
      throw $e;
    }
    
  }

  $sql = 'select * from article;';
  $statement = pdo($pdo,$sql);
  $return = $statement->fetchAll();

?>

<head>
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="../styles/admin.css">
</head>
<div class="main_view_wrapper">
  <div class="main_view_container">
    <a href="./new_post.php">Create article</a>
    <div class="main_view_articles">
      <?php
        foreach($return as $item){?>
        
        <a class="article_item" href="article_edit.php?article=<?= $item['url_slug'] ?>" >
          <div class="article_delete">
            <form action="./view.php" method="POST" onsubmit="return confirm_del(this)">
              <input type="hidden" name="article_tn" value="<?= $item['thumbnail']?>">
              <input type="hidden" name="article_url_slug" value="<?= $item['url_slug']?>">
              <input type="submit" name= "delete" value="Delete">
            </form>
          </div>
            <h2><?= $item['title'] ?></h2>
            <p><?= $item['description'] ?></p>
            <img src="../uploads/<?= $item['thumbnail'] ?>" alt="">
          </a>
        <?php
        }
      ?>
    </div>
  </div>
  
</div>

<script>
  function confirm_del(form){
    return confirm("Are you sure you want to delete this post?");
  }
</script>
<?php 
  include '../includes/footer.php';
?>