<?php
  $root_path = dirname(__DIR__);
  $env_path = $root_path . '/.envphp';
  $env = parse_ini_file($env_path);
  $type     = $env['DB_TYPE'];
  $server   = $env['DB_SERVERS'];
  $db       = $env['DB'];
  $port     = $env['DB_PORT'];
  $charset  = $env['DB_CHARSET'];

  $username = $env['DB_USER'];
  $password = $env['DB_PW'];

  $options = [
    PDO::ATTR_ERRMODE   => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ];

  $dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset";
  try {
    $pdo = new PDO($dsn, $username, $password, $options);
  }
  catch(PDOException $e){
    throw new PDOException($e->getMessage(),$e->getCode());
  }
?>
