<?php
  $contact_array = [
    'Name' => 'Anthony Ciocco',
    'Email' => 'anthonymciocco@gmail.com',
    'Phone' => '(832)-531-4100',
    'Address' => 'Houston, TX',
    'LinkedIn' => '<a href="https://www.linkedin.com/in/anthonymciocco/" target="_blank">https://www.linkedin.com/in/anthonymciocco/</a>',
    'Github' => '<a href="https://github.com/ci0cc0lat0" target="_blank"> https://github.com/ci0cc0lat0</a>'
  ]
?>


<h1>Contact</h1>
<div>
  <?php foreach($contact_array as $key => $val) { ?>
  <div class="contact_item">
    <p class="contact_title"><?= $key?>:</p>
    <p class="contact_text"><?= $val?></p>
  </div>
  <?php } ?>
</div>