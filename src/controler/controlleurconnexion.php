<?php

namespace CustomBox\controler;

use CustomBox\models\Utilisateurs;
use CustomBox\vues\vueaccueil;
use CustomBox\vues\vueconnexion;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class ControlleurConnexion
{
    /**
     * Controlleur appelant la vue Connexion afin d'afficher le formulaire de connexion d'un utilisateur
     */
    public function afficherPageConnexion(Request $requete, Response $reponse): Response
    {
        $vue = new \CustomBox\vues\vueconnexion(array($requete));
        $html = $vue->render(1);
        $reponse->getBody()->write($html);
        return $reponse;
    }

    /**
     * Controlleur appelant la vue Connexion afin d'afficher le formulaire d'inscription d'un utilisateur
     */
    public function afficherPageInscription(Request $requete, Response $reponse): Response
    {
        $vue = new \CustomBox\vues\vueconnexion(array($requete));
        $html = $vue->render(2);
        $reponse->getBody()->write($html);
        return $reponse;
    }

    public function afficherPageInscriptionRedirection(Request $requete, Response $reponse): Response
    {
        $vue = new \CustomBox\vues\vueconnexion(array(0));
        $html = $vue->render(3);
        $reponse->getBody()->write($html);
        return $reponse;
    }

    /**
     * Gestion du formulaire de connexion.
     * Échappe les balises HTML pour éviter les injections.
     * Redirige vers le profil si la création de la liste est réussie.
     */
    public function verifierConnexion(Request $rq, Response $rs): Response
    {
        session_start();
        if (!empty($_POST['email']) && !empty($_POST['password'])) // Si il existe les champs email, password et qu'il sont pas vident
        {
            // Patch XSS
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);


            $email = strtolower($email); // email transformé en minuscule

            // On regarde si l'utilisateur est inscrit dans la table utilisateurs

            $row = Utilisateurs::select('pseudo','email','password','token','id')->where('email', '=', $email)->first();

            // Si > à 0 alors l'utilisateur existe
            if ($row > 0) {
                // Si le mail est bon niveau format
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // Si le mot de passe est le bon
                    if (password_verify($password, $row['password'])) {
                        // On créer la session et on redirige sur landing.php
                        $_SESSION['user'] = $row['id'];
                        return $rs->withRedirect('../CustomBox/home');
                    } else {
                        return $rs->withRedirect('../CustomBox/connexion?res=mot de passe incorrect');
                    }
                } else {
                    return $rs->withRedirect('../CustomBox/connexion?res=Email incorrect');
                }
            } else {
                return $rs->withRedirect('../CustomBox/connexion?res=Veuillez vous inscrire');
            }
        } else {
            return $rs->withRedirect('../CustomBox/connexion?res=Veuillez renseignez tout les champs');
        }
    }

    /**
     * Gestion du formulaire de d'inscription.
     *
     * Redirige vers le profil si la création de la liste est réussie.
     */
    public function verifierInscription(Request $request, Response $rs): Response
    {
        // Si les variables existent et qu'elles ne sont pas vides
        if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype'])) {
            // Patch XSS
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $password_retype = htmlspecialchars($_POST['password_retype']);
            $tel= htmlspecialchars($_POST['tel']);

            // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
            $email = strtolower($email);

            // On vérifie si l'util isateur existe
            $row = Utilisateurs::where('email', 'LIKE', $email)->count();

            // Si la requete renvoie un 0 alors l'utilisateur n'existe pas
            if ($row == 0) {
                if (strlen($pseudo) <= 100) { // On verifie que la longueur du pseudo <= 100
                    if (strlen($email) <= 100) { // On verifie que la longueur du mail <= 100
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // Si l'email est de la bonne forme
                            if ($password === $password_retype) { // si les deux mdp saisis sont bon

                                // On hash le mot de passe avec Bcrypt, via un coût de 12
                                $cost = ['cost' => 12];
                                $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                                // On stock l'adresse IP
                                $ip = $_SERVER['REMOTE_ADDR'];

                                // On insère dans la base de données
                                $user = new Utilisateurs();
                                $user->pseudo = $pseudo;
                                $user->email = $email;
                                $user->password = $password;
                                $user->ip = $ip;
                                $user->token = bin2hex(openssl_random_pseudo_bytes(64));
                                $user->telephone=$tel;
                                $user->save();

                                // On redirige avec le message de succès
                                return $rs->withRedirect('../CustomBox/inscription?res=Inscription Reussi');
                            } else {
                                return $rs->withRedirect('../CustomBox/inscription?res=Mdp Pas Identique');
                            }
                        } else {
                            return $rs->withRedirect('../CustomBox/inscription?res=Format Mail Incorrect');
                        }
                    } else {
                        return $rs->withRedirect('../CustomBox/inscription?res=Email trop long');
                    }
                } else {
                    return $rs->withRedirect('../CustomBox/inscription?res=Pseudo trop long');
                }
            } else {
                return $rs->withRedirect('../CustomBox/inscription?res=Vous etes deja inscrit!');
            }
        }
        return $rs;
    }

    public function deconnexion(Request $request, Response $rs):Response
    {
        session_destroy(); // on détruit la/les session(s)
        unset($_SESSION);
        session_start();
        return $rs->withRedirect('../CustomBox/home');
    }

}

