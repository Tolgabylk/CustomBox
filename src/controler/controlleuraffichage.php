<?php

namespace CustomBox\controler;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use \CustomBox\vues\VueReservation as VueReservation;

use \CustomBox\vues\VueCreationListe as VueCreationListe;


use \CustomBox\models\Commentaire as Commentaire;

use \CustomBox\models\Liste as liste;
use \CustomBox\models\Item as item;

use \slim\Container;

class controlleuraffichage
{

    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function afficherAccueil(Request $rq, Response $rs, $args): Response
    {
        $listes = \CustomBox\models\Boite::all();
        $vue = new \CustomBox\vues\vueaccueil($listes->toArray(), $rq);
        $html = $vue->render();
        $rs->getBody()->write($html);
        return $rs;
    }

    public function afficherListes(Request $rq, Response $rs, $args): Response
    {
        $boite = \CustomBox\models\Boite::all();
        $vue = new \CustomBox\vues\vueparticipant($boite->toArray(), $rq);
        $html = $vue->render(1);
        $rs->getBody()->write($html);
        return $rs;
    }

    public function afficherUneListe(Request $rq, Response $rs, $args): Response
    {
        $l = \CustomBox\models\Boite::find($args['token']);
        $items = $l->items()->get();
        $liste[0] = $l->toArray();
        $liste[1] = $items;
        $vue = new \CustomBox\vues\vueparticipant($liste);
        $html = $vue->render(2);
        $rs->getBody()->write($html);
        return $rs;
    }

    public function afficherUnItem(Request $rq, Response $rs, $args): Response
    {

        $item = \CustomBox\models\Item::find($args['id']);
        $vue = new \CustomBox\vues\vueparticipant([$item->toArray()]);
        $html = $vue->render(3);
        $rs->getBody()->write($html);
        return $rs;
    }

    public function reserverUnItem(Request $requete, Response $reponse): Response
    {
        $vue = new VueReservation(array(0));
        $html = $vue->render(1);
        $reponse->getBody()->write($html);
        return $reponse;
    }


 public function afficherProduits(Request $requete,Response $response){
     $vue = new VueProduit(array(0));
     $html = $vue->render(1);
     $response->getBody()->write($html);
     return $response;



 }


}

