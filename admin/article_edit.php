<?php
  include '../includes/session.php';
  require_login($logged_in);
  include '../includes/db-connect.php';
  include '../includes/functions.php';
  include '../includes/header.php';
?>
<?php
  $slug = $_POST['updated_slug'] ?? $_GET['article'] ?? '';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

      // getting PK from current article
      $sql = 'SELECT * FROM article WHERE url_slug = :url_slug;';
      $result = pdo($pdo,$sql,['url_slug'=>$slug])->fetch();
      $id = $result['id'];
      // updating with PK
      if(!empty($_FILES['thumbnail']['name'])){
        $temp_image = $_FILES['thumbnail']['tmp_name'];
        $new_image = $_FILES['thumbnail']['name'];
        $path = '../uploads/' . $new_image;
        $moved = move_uploaded_file($temp_image,  $path);
        $image_update = $new_image;
        if($moved){echo "Moved";}
        else{echo "not moved";}

        echo "made it here";
      }
      else{
        $image_update = $result['thumbnail'];
      }
      $url_slug = str_replace(' ','_',strtolower($_POST['title']));
      $sql = 'UPDATE article
        SET title = :title,
        url_slug = :url_slug,
        description = :desc,
        thumbnail = :thumbnail,
        docs_link = :docs_link 
        WHERE id = :id;';
      $result = pdo($pdo,$sql,
        [
        'id'=>$id,
        'title'=>$_POST['title'],
        'desc'=>$_POST['description'],
        'url_slug'=>$url_slug,
        'thumbnail'=>$image_update,
        'docs_link'=>edit_to_preview($_POST['docs_link']),
        ]);
        



      // loading new data
      $sql = 'SELECT * from article where id = :result;';
      $statement = pdo($pdo,$sql,['result'=>$id]);
      $result = $statement->fetch();
      $slug = $url_slug;
      

  }
  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $slug = $_GET['article'] ?? '';
    $sql = 'SELECT * from article where url_slug = :result;';
    $statement = pdo($pdo,$sql,['result'=>$_GET['article']]);
    $result = $statement->fetch();
    #var_dump($result['description']);

  }
 
?>
<head>
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="../styles/admin.css">
</head>
<div class="edit_wrapper">
<a href="./view.php">Back to view page</a>

  <div class="edit_container">
    <input type="hidden" name='slug' value="<?= $slug ?>">
    <form class="edit_form" action="<?="./article_edit.php?article=".$slug?>" method="POST" enctype="multipart/form-data">
    <label for="title">Title</label>
    <input type="text" name="title" value="<?= $result['title'] ?>" >

    <label for="description">Title</label>
    <textarea name="description"><?= $result['description'] ?></textarea>

    <label for="thumbnail">Thumbnail</label>
    <label for="thumbnail"><?= $result['thumbnail'] ?></label>

    <input type="file" name="thumbnail" >

  
    
    <div>
    <a href="<?=$result['docs_link']?>">Drive Link</a>
    </div>
    <input type="url" name="docs_link" value="<?= $result['docs_link'] ?>" >

    <input type="submit" value="submit">
    <div>
    <iframe src="<?= $result['docs_link'] ?>"></iframe>

    


    </div>
    </form>
  </div>
</div>
<style>
  iframe{

    width: 100%;
    height:600px;
  }
</style>
<?php 
  include '../includes/footer.php';
?>