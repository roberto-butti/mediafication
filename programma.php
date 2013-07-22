<?php

require_once './lib/Twig/Autoloader.php';
require_once('AppInfo.php');
require_once('utils.php');

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array(
    'cache' => FALSE,
));

$KEY_DEFAULT = "xfactor";
$o = idx($_GET, "o", $KEY_DEFAULT);


$pages = array(
  "xfactor" => array(
    "titolo" => "X-Factor 2013",
    "immagine" => "http://upload.wikimedia.org/wikipedia/it/5/50/Nuovo_logo_X_Factor.jpg",
    "descrizione" => "X Factor in esclusiva ogni giovedì alle 21.10 su Sky Uno HD! http://xfactor.sky.it",
    "videoid" => "iyP0U9LZb48",
  ),
  "amici" => array(
    "titolo" => "Amici (Maria de Filippi)",
    "immagine" => "http://upload.wikimedia.org/wikipedia/it/d/dc/Amici_Logo.PNG",
    "descrizione" => "Amici di Maria De Filippi (chiamato anche più semplicemente Amici) è un talent show italiano in onda dal 2001, prima su Italia 1 fino al 2002, per poi passare su Canale 5 con la conduzione di Maria De Filippi. È attualmente giunto alla dodicesima edizione. Per tutta la settimana va in onda la striscia quotidiana registrata (condotta da Luca Zanforlin, il quale è anche uno degli autori storici del programma), che mostra i momenti più importanti della giornata. Il sabato pomeriggio (nell'ottava edizione domenica pomeriggio) c'è la diretta televisiva, condotta dalla De Filippi.",
    "videoid" => "fmqSvOf7PZ0",
  )
);
$pages_current = array();
if (array_key_exists($o, $pages )) {
  $pages_current = $pages[$o];
} else {
  $pages_current = $pages[$KEY_DEFAULT];
}


$data = array(
  "fb_admin_id" => "1031294848,847680122",
  "fb_app_id" => AppInfo::appID(),
  "sito_titolo" => "Programmi TV",
  "url" => AppInfo::getUrl(),
  "url_assoluto" => AppInfo::getUrl()."programma.php?o=".$o,
);
$data = array_merge($data, $pages_current);



echo $twig->render('movie.twig', $data);