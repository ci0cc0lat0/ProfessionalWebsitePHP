<?php
  /*
  Accepts a PDO object and sql string and returns a PDOStatement
  */
  function pdo(PDO $pdo, string $sql,array $args = null): PDOStatement{
    if (!$args){
      return $pdo->query($sql);
    }
    $statement = $pdo->prepare($sql);
    $statement->execute($args);
    return $statement;
  }
  function edit_to_preview($link){
    return preg_replace('/\/edit\?usp=sharing$/', '/preview', $link);
  }
?>