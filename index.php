<?php


use Illuminate\Database\Capsule\Manager as DB;
require_once 'vendor/autoload.php';

session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user']=-1;
}

$c = [
    'settings' => [
        'displayErrorDetails' => true]
];
$cc = new \Slim\Container($c);
$app = new \Slim\App($cc);
$db = new DB();
$db->addConnection(parse_ini_file('src/conf/db.conf.ini'));

$db->setAsGlobal();
$db->bootEloquent();

// Affichage de la landing page
$app->get('/home', \mywishlist\controleur\ControlleurAffichage::class.':afficherAccueil')->setName('Accueil');