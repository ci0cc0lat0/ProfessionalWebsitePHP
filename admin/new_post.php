<?php
  include '../includes/session.php';
  require_login($logged_in);
  include '../includes/db-connect.php';
  include '../includes/functions.php';
?>
<?php 
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'] ?? '';
    $desc = $_POST['description'] ?? '';
    $drive_post = $_POST['drive_post'] ?? '';
    $drive_post = edit_to_preview($drive_post);

    $temp_image = $_FILES['thumbnail']['tmp_name'];
    $image_name = $_FILES['thumbnail']['name'];
    $path = '../uploads/' . $image_name;
    $moved = move_uploaded_file($temp_image,  $path);
    if($moved === true){
      echo 'moved';
    }
    else{
      echo 'not moved';
    }
    $url_slug = str_replace(' ','_',strtolower($title));

    $sql = 'INSERT INTO article
    (title,description,thumbnail,docs_link,url_slug)
    VALUES (:title, :desc, :img, :link, :url_slug);';
    $result = pdo($pdo,$sql,[
      'title'=>$title,
      'desc'=>$desc,
      'img'=>$image_name,
      'link'=>$drive_post,
      'url_slug'=>$url_slug,
    ]);
    
  }
  #var_dump($_POST)

?>



<?php
  include '../includes/header.php';
  ?>
<head>
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="../styles/admin.css">
</head>


<div class="form_wrapper">
  
  <div class="form_container">
    <div class="return_page">
      <a href="/admin">Back to admin page</a>
    </div>
    <form action="new_post.php" method="post" enctype="multipart/form-data" onsubmit="reindexContent()">
      <div class="form_defaults">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
      </div>

      <div class="form_defaults">
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
      </div>

      <div class="form_defaults">
        <label for="thumbnail">Thumbnail image</label>
        <input type="file" name="thumbnail" id="thumbnail">
      </div>
      <div class="form_defaults">
      <label for="drive_post">Google drive post</label>
      <input type="url" name="drive_post" id="drive_post">
      </div>
      <div id="form_nodes">
      


      </div>
      <input type="submit" value="Submit post">
    </form>
  </div>
</div>


<style>

</style>
<?php 
  include '../includes/footer.php';
?>