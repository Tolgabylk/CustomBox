<?php


use Illuminate\Database\Capsule\Manager as DB;

require_once 'vendor/autoload.php';

require 'src/controler/controlleurconnexion.php';
require 'src/vues/vueconnexion.php';


session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = -1;
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
//new \CustomBox\controler\controlleuraffichage();

//new \CustomBox\models\Boite();
//new \CustomBox\vues\vueaccueil();

// Affichage de la landing page
$app->get('/home', \CustomBox\controler\controlleuraffichage::class . ':afficherAccueil')->setName('Accueil');

//Affichage de la liste de la liste de souhait
$app->get('/listes', '\CustomBox\controler\controlleraffichage:afficherListes')->setName('listeDesListes');


//Affichage de la page de connexion
$app->get('/connexion', '\CustomBox\controler\controlleurconnexion:afficherPageConnexion')->setName('connexion');

//affichage de la page d'inscription
$app->get('/inscription', '\CustomBox\controler\controlleurconnexion:afficherPageInscription')->setName('inscription');

//route verifiant l'inscription
$app->post('/inscription', '\CustomBox\controler\controlleurconnexion:verifierInscription')->setName('verifierInscription');

//route gerant la deconnexion
$app->any('/deconnexion', '\CustomBox\controler\controlleurconnexion:deconnexion')->setName('deconnexion');

//route verifiant la connexion
$app->post('/connexion', '\CustomBox\controler\controlleurconnexion:verifierConnexion')->setName('verifierConnexion');


$app->run();