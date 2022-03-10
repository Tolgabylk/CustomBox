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
        $vue = new \CustomBox\vues\vueaccueil($listes->toArray());
        $html = $vue->render();
        $rs->getBody()->write($html);
        return $rs;
    }

    public function afficherListes(Request $rq, Response $rs, $args): Response
    {
        $boite = \CustomBox\models\Boite::all();
        $vue = new \CustomBox\vues\vueparticipant($boite->toArray());
        $html = $vue->render(1);
        $rs->getBody()->write($html);
        return $rs;
    }

    public function afficherUneListe(Request $rq, Response $rs, $args): Response
    {
        $l = \CustomBox\models\Liste::find($args['token']);
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

    public function creerMessage(Request $rq, Response $rs, $args) : Response
    {
        $vue = new VueCreationListe([], $this->container);

        // recuperation du commentaire dans le POST
        $commFromPOST = $_POST["Message"];

        $numListeFromPOST = $args['token'];


        // creation d'un nv commentaire a inserer dans la database
        $comm = new Commentaire();
        $comm->dateCom = date('Y-m-d h:i:s', time());

        $comm->no = $numListeFromPOST;
        $comm->commentaire = $commFromPOST;
        // insere le nouveau com dans la bdd
        $comm->save();

        return $this->afficherUneListe($rq,$rs,$args);
    }

    public function verifierReservation(Request $request, Response $response, $args)
    {
        if (empty($_SESSION['user'])|| $_SESSION['user']==-1) {
            print_r("salut");
            return $response->withRedirect('/index.php/connexion?res=Vous devez vous connecter');

        }

        $item = Item::where('id', '=', $args['id'])->first();
        $list = Liste::where('no', '=', $item['liste_id'])->first();

        $item->reservations = $_SESSION['user'];

        $item->save();
        $args['id'] = $item->id;

        return $response->withRedirect('/index.php/item/' . $item['id'] . '?res=reservation%20Effectué');

    }


}

