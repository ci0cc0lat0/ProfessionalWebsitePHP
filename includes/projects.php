<?php 
// name_of_project => [link,blurb]
$project_array = [
  "Off Record Media" => ['https://offrecord.blog/','A media publication where writers and photographers cover shows and media local to Houston and centeralized to Texas.'],
  "Sunsideup" => ['https://sunsideup.vercel.app/','A freelance website and repository for energy related matters in Texas and the surrounding markets.'],
  "Vigenère cipher" => ['https://cipher.anthonyciocco.com/','A vigenère cipher to encrypt text.'],
  "Dotabase" => ['https://dotabase.anthonyciocco.com/', 'A simple dashboard dedicated to the collection, viewing, and analysis of Dota 2 statistics.'],
  "Shroomp" => ['https://ci0cc0lat0.itch.io/shroomp','Play my game where you are Shroomp, a mushroom and you must fight back against the protaganost who is causing a stir in your kingdom'],
  'Theantpond' => ['https://pond.anthonyciocco.com','A personal portfolio I made to showcase art, music, and brain-to-paper thoughts'],
  'HR DASHBOARD' => ['https://github.com/ci0cc0lat0/NodeDatabaseDemo','A Human Resources dashboard constructed with NodeJS, ExpressJS and PostgreSQL.'],
  'Earthquake Geo-location' => ['https://github.com/ci0cc0lat0/Data-Science-Group-Work/blob/main/Final%20POIMAGIC.ipynb','Visualization and analysis of earthquakes in the U.S. and E.U. over a 10 year period.'],
  'Antgrep' => ['https://github.com/ci0cc0lat0/antGrepper','A CLI tool written in C++ for grepping all the specific filetypes in a given directory'],
  'anthonyciocco.com' => ['https://anthonyciocco.com','My professional portfolio created with Custom LAMP stack CMS']
]

?>

<h1>Projects</h1>
<?php foreach($project_array as $key => $val){?>
  <div class="project_item">
    <a href="<?= $val[0]?>" target="_blank"><?= $key?></a> - 
    <p><?= $val[1] ?></p>
  </div>
<?php
  }
?>