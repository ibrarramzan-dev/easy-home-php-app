<?php
session_start();
$private_pages = ['/cere_oferta.php', '/lucrarile_mele.php', '/lucrari_anterioare.php', '/my_account.php'];
$request_uri = $_SERVER['REQUEST_URI'];

$request_uri = explode('?', $request_uri);
$route = $request_uri[0];

if (isset($_COOKIE['my_account_info'])) {
  $data = json_decode($_COOKIE['my_account_info'], true);
  $_SESSION['my_account_info'] = $data;
} else if(!isset($_SESSION['my_account_info'])) {
  if(in_array($route, $private_pages)) {
    header("Location:./login.php");
  }
}

?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="./styles/main.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<script src="./scripts/main.js" defer></script>
<script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>