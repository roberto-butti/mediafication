<?php

require_once './lib/Twig/Autoloader.php';
require_once('AppInfo.php');
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array(
    'cache' => FALSE,
));
$o = "xfactor";

$data = array(
  "fb_admin_id" => "1031294848,847680122",
  "fb_app_id" => AppInfo::appID(),
  "sito_titolo" => "Programmi TV",
  "url" => AppInfo::getUrl(),
  "url_assoluto" => AppInfo::getUrl()."programma.php?o=".$o,
  "titolo" => "X-Factor 2013",
  "immagine" => "http://upload.wikimedia.org/wikipedia/it/5/50/Nuovo_logo_X_Factor.jpg",
  "descrizione" => "X Factor in esclusiva ogni giovedì alle 21.10 su Sky Uno HD! http://xfactor.sky.it",
  "videoid" => "iyP0U9LZb48",

);



echo $twig->render('movie.twig', $data);