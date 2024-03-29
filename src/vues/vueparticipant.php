<?php

namespace CustomBox\vues;

use Illuminate\Contracts\Validation\Validator;
use CustomBox\models\Boite;
use CustomBox\controler\controlleuraffichage;


class vueparticipant
{

    public array $tab;

    public function __construct(array $tab) {
        $this->tab=$tab;
    }

    private function htmlListes() : string{
        $content='';
        foreach($this->tab as $l){
            $content .="<article>$l[no]: $l[user_id],<a href=/index.php/boite/$l[no]>$l[titre]</a>, $l[description], $l[expiration], $l[token]</article>
                ";

        }
        return "<section>$content</section>";
    }

    private function htmlUneListe() : string {
        $content='';
        $l = $this->tab[0];
        $content .="<article>$l[no]: $l[user_id], $l[titre], $l[description], $l[expiration], $l[token]</article>";
        $content.="<ul>";
        $items = $this->tab[1];
        foreach ($items as $item) {
            $url = "/images/produits".$item['img'];
            $content .="<li>$item[id]: <a href=/index.php/item/".$item['id'].">$item[nom]</a> ,$item[descr], $item[tarif] €, <br> <img src=".$url."></li>";
        }
        $content.="</ul>";
        $content.='<a href="/index.php/modifList/$token" class="btn btn-primary">Modifier</a>';
        $content.="<br><p>Insérer un message</p>";
        $content.='<form method="POST" action="/index.php/liste/'.$l['no'].'">
        <div id = "message">
                <input type"text" name="Message" placeholder="Message" required/>
        </div>
        <button type="submit" class="creerMessage" value="creerMessage" >Envoyer le message</button>
        </form>';

        $content.='<br>Commentaires :';
        $row = Commentaire::select('auteur','commentaire','dateCom')->where('no', '=', $l['no'])->get();

        foreach($row as $com){
            $content .="<article>Auteur : $com[auteur] a écrit : $com[commentaire] | $com[dateCom]</article>";
        }
        return $content;
    }

    private function htmlUnItem() : string {
        $nom = null;
        $nom2 = htmlentities($nom);
        $affichage='';
        foreach($this->tab as $item){
            if($nom){
                $affichage = '
                            <h2> //ce qui est insert dans la bdd  </h2>
                         ';
            } else {
                $affichage = '
                             <form method="POST" action="/index.php/item/'.$item['id'].'/reserver">                                
                                    <button class="btn btn-primary">Réserver</button>
                                </form>
                            ';
            }
            $url = "/img/".$item['img'];
            $affichage .="<article>$item[id]: $item[descr], $item[tarif] €, <br> <img src=".$url."></article>";
        }

        return $affichage;

    }

    public function render($selecteur) {
        switch ($selecteur) {
            case 1 : {
                $content = $this->htmlListes();
                break;
            }
            case 2 : {
                $content = $this->htmlUneListe();
                break;
            }
            case 3 : {
                $content = $this->htmlUnItem();
                break;
            }
        }
        $token=$this->tab[0]['token'];
        $html = <<<END
            <!DOCTYPE html>
            <html>
            <body><head>
            <link rel="stylesheet" href="/style/style.css">
            <h1>My<span style="color:rgb(79, 128, 235);">Wishlist</span></h1>
            </head>
                <div class="content">
                    $content
                </div>
            </body>
            </html>
            END ;
        return $html;
    }






}