<?php

namespace CustomBox\vues;

class vueaccueil
{

    public array $tab;

    public function __construct(array $tab) {
        $this->tab=$tab;
    }

    private function afficherAccueil() : string{
        $content = '';
        if($_SESSION['user']!=-1){
            $content.='<form method="POST" action="/index.php/deconnexion">
                 <a class="deconnexion" href="/CustomBox/deconnexion">
                     <button type="submit" name="submit" class="neon" href="/index.php/home" >Deconnexion</button>         
                </a>
             </form> ';
        }else{
            $content.='
            <a class="connexion" href="../CustomBox/connexion">
                Connexion
            </a>    
            <a class="inscription" href="../CustomBox/inscription">
                Inscription
            </a>';
        }
        $content.='<br>        
            <a class="neon" href="../CustomBox/listes">
                Afficher Listes
            </a>
            <br>
            <a class="neon" href="../CustomBox/liste/1">
                Afficher Liste 1
            </a>
            <br>
            <a class="neon" href="../CustomBox/liste/2">
                Afficher Liste 2
            </a>
            <br>
            <a class="neon" href="../CustomBox/liste/3">
                Afficher Liste 3
            </a>
            <br>
            <a class="neon" href="../CustomBox/createItem">
                Cr&eacute;er un item
            </a>
            <br>
            <a class="neon" href="../CustomBox/createList">
                Cr&eacute;er une liste
            </a>
			<br>
            <a class="neon" href="../CustomBox/suppItem">
                Supprimer un item
            </a>';
        return $content;
    }


    public function render() {
        $content = $this->afficherAccueil();
        //$token=$this->tab[0]['token'];
        $html = <<<END
<!DOCTYPE html>
<html>
<body><head>
<link rel="stylesheet" href="/style/styleIndex0.css">
<h1>Bienvenue sur My<span style="color:rgb(79, 128, 235);">WishList</span></h1>
</head>
    $content
</body>
</html>
END ;
        return $html;
    }

}