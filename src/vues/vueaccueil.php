<?php

namespace CustomBox\vues;

use \Psr\Http\Message\ServerRequestInterface as Request;

class vueaccueil
{

    public array $tab;

    public function __construct(array $tab, Request $rq)
    {
        $this->tab = $tab;
        $this->rq = $rq;
    }

    private function afficherAccueil(): string
    {
        $content = '';
        $token = $this->tab[0]['token'];

        if ($_SESSION['user'] != -1) {
            $content .= '<html style="font-size: 16px;">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
      <meta name="keywords" content="Branding Concepts, Graphic Design, About Us, ​Website Development Company, Our Features &amp;amp; Services, Strategic Planning, Awards, ​Our Design Services, Nam ultrices ultrices nec tortor pulvinar esteras loremips est orem., Follow us, Contact us">
      <meta name="description" content="">
      <meta name="page_type" content="np-template-header-footer-from-plugin">
      <title>Accueil</title>
  <link rel="stylesheet" href="../CustomBox/web/css/Accueil.css" media="screen">
  <link rel="stylesheet" href="../CustomBox/web/css/nicepage.css" media="screen">
      <script class="u-script" type="text/javascript" src="../CustomBox/web/js/jquery.js" defer=""></script>
      <script class="u-script" type="text/javascript" src="../CustomBox/web/js/nicepage.js" defer=""></script>
      <meta name="generator" content="Nicepage 4.6.5, nicepage.com">
      
      <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
      
      
      
      <script type="application/ld+json">{
          "@context": "http://schema.org",
          "@type": "Organization",
          "name": "",
          "logo": "images/logogrand.png"
  }</script>
      <meta name="theme-color" content="#291569">
      <meta property="og:title" content="Accueil">
      <meta property="og:type" content="website">
    </head>
    <body class="u-body u-xl-mode"><header class="u-clearfix u-header u-header" id="sec-3d90"><div class="u-clearfix u-sheet u-sheet-1">
          <a href="#" class="u-image u-logo u-image-1" data-image-width="2146" data-image-height="1908">
            <img src="images/logogrand.png" class="u-logo-image u-logo-image-1">
          </a>
          <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-responsive-from="XL">
            <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
              <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#" style="padding: 3px 40px; font-size: calc(1em + 6px);">
                <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
                <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
  </g></svg>
              </a>
            </div>
            <div class="u-nav-container">
              <ul class="u-nav u-spacing-30 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" href="#" style="padding: 10px 0px;">Accueil</a>
  </li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" href="#" style="padding: 10px 0px;">About</a>
  </li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" href="#" style="padding: 10px 0px;">Contact</a>
  </li></ul>
            </div>
            <div class="u-nav-container-collapse">
              <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                <div class="u-inner-container-layout u-sidenav-overflow">
                  <div class="u-menu-close"></div>
                  <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="#" style="padding: 10px 0px;">Accueil</a>
  </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="#" style="padding: 10px 0px;">About</a>
  </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="#" style="padding: 10px 0px;">Contact</a>
  <form method="POST" action="../CustomBox/deconnexion">
 <a class="deconnexion" href="../CustomBox/deconnexion">
     <button type="submit" name="submit" class="u-button-style u-nav-link" href="../CustomBox/home" >Deconnexion</button>           
</a>
</form>
</li></ul>
                </div>
              </div>
              <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
          </nav>
        </div></header>
      <section class="u-clearfix u-image u-section-1" id="carousel_4b49">
        <div class="u-clearfix u-sheet u-sheet-1">
          <div id="carousel-ee08" data-interval="5000" data-u-ride="carousel" class="u-carousel u-slider u-slider-1">
            <ol class="u-carousel-indicators u-opacity u-opacity-55 u-carousel-indicators-1">
              <li data-u-target="#carousel-ee08" class="u-active u-border-1 u-border-white u-shape-circle u-white" data-u-slide-to="0" style="height: 10px; width: 10px;"></li>
            </ol>
            <div class="u-carousel-inner" role="listbox">
              <div class="u-active u-align-left u-carousel-item u-container-style u-shape-rectangle u-slide">
                <div class="u-container-layout u-valign-top u-container-layout-1">
                  <h2 class="u-color-scheme-u10 u-color-style-multicolor-1 u-custom-font u-text u-text-1">
                    <span class="u-text-custom-color-1">L\'Atelier 17.91 </span>
                    <br>
                  </h2>
                  <p class="u-large-text u-text u-text-body-alt-color u-text-variant u-text-2">Création de lien&nbsp;</p>
                  <a href="Accueil.html#carousel_d0ab" data-page-id="815918998" class="u-border-2 u-border-palette-3-base u-btn u-btn-round u-button-style u-hover-palette-3-base u-none u-radius-7 u-text-body-alt-color u-text-hover-white u-btn-1">&nbsp;En savoir plus<br>
                  </a>
                </div>
              </div>
            </div>
            <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-hidden-sm u-hidden-xs u-spacing-10 u-text-palette-3-base u-carousel-control-1" href="#carousel-ee08" role="button" data-u-slide="prev">
              <span aria-hidden="true">
                <svg viewBox="0 0 256 256"><g><polygon points="207.093,30.187 176.907,0 48.907,128 176.907,256 207.093,225.813 109.28,128"></polygon>
  </g></svg>
              </span>
              <span class="sr-only">
                <svg viewBox="0 0 256 256"><g><polygon points="207.093,30.187 176.907,0 48.907,128 176.907,256 207.093,225.813 109.28,128"></polygon>
  </g></svg>
              </span>
            </a>
            <a class="u-carousel-control u-carousel-control-next u-hidden-sm u-hidden-xs u-spacing-10 u-text-palette-3-base u-carousel-control-2" href="#carousel-ee08" role="button" data-u-slide="next">
              <span aria-hidden="true">
                <svg viewBox="0 0 306 306"><g id="chevron-right"><polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153"></polygon>
  </g></svg>
              </span>
              <span class="sr-only">
                <svg viewBox="0 0 306 306"><g id="chevron-right"><polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153"></polygon>
  </g></svg>
              </span>
            </a>
          </div>
        </div>
      </section>
      <section class="u-clearfix u-grey-10 u-section-2" id="carousel_d0ab">
        <div class="u-clearfix u-sheet u-sheet-1">
          <div class="u-clearfix u-expanded-width u-gutter-20 u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
              <div class="u-layout-row">
                <div class="u-size-30 u-size-60-md">
                  <div class="u-layout-col">
                    <div class="u-align-center u-container-style u-layout-cell u-left-cell u-size-60 u-layout-cell-1">
                      <div class="u-container-layout u-container-layout-1">
                        <img class="u-expanded-width u-image u-image-1" src="images/im1.png" data-image-width="1440" data-image-height="1440">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="u-size-30 u-size-60-md">
                  <div class="u-layout-col">
                    <div class="u-size-40">
                      <div class="u-layout-row">
                        <div class="u-container-style u-layout-cell u-right-cell u-size-60 u-layout-cell-2">
                          <div class="u-container-layout u-valign-bottom u-container-layout-2">
                            <h2 class="u-text u-text-palette-1-base u-text-1">A propos&nbsp;</h2>
                            <p class="u-text u-text-palette-1-base u-text-2">Contribue à des solutions créatives &amp; solidaires,&nbsp;en toute confiance.&nbsp;<br>Nous proposons des ateliers itinérants dans toute la Lorraine.<br>- Upcycling&nbsp;<br>- Beauté inclusive&nbsp;<br>- Décoration&nbsp;<br>- Produits ménagers&nbsp;<br>- Bijoux recyclés
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="u-size-20">
                      <div class="u-layout-row">
                        <div class="u-container-style u-hidden-md u-hidden-sm u-hidden-xs u-layout-cell u-size-60 u-layout-cell-3">
                          <div class="u-container-layout u-container-layout-3">
                            <a href="Accueil.html#carousel_56cf" data-page-id="815918998" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-1">Nos Services</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      
     
      </section>
    </body>
  </html>';
        } else {
            $content .= '<html style="font-size: 16px;">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
      <meta name="keywords" content="Branding Concepts, Graphic Design, About Us, ​Website Development Company, Our Features &amp;amp; Services, Strategic Planning, Awards, ​Our Design Services, Nam ultrices ultrices nec tortor pulvinar esteras loremips est orem., Follow us, Contact us">
      <meta name="description" content="">
      <meta name="page_type" content="np-template-header-footer-from-plugin">
      <title>Accueil</title>
  <link rel="stylesheet" href="../CustomBox/web/css/Accueil.css" media="screen">
  <link rel="stylesheet" href="../CustomBox/web/css/nicepage.css" media="screen">
      <script class="u-script" type="text/javascript" src="../CustomBox/web/js/jquery.js" defer=""></script>
      <script class="u-script" type="text/javascript" src="../CustomBox/web/js/nicepage.js" defer=""></script>
      <meta name="generator" content="Nicepage 4.6.5, nicepage.com">
      
      <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
      
      
      
      <script type="application/ld+json">{
          "@context": "http://schema.org",
          "@type": "Organization",
          "name": "",
          "logo": "images/logogrand.png"
  }</script>
      <meta name="theme-color" content="#291569">
      <meta property="og:title" content="Accueil">
      <meta property="og:type" content="website">
    </head>
    <body class="u-body u-xl-mode"><header class="u-clearfix u-header u-header" id="sec-3d90"><div class="u-clearfix u-sheet u-sheet-1">
          <a href="#" class="u-image u-logo u-image-1" data-image-width="2146" data-image-height="1908">
            <img src="images/logogrand.png" class="u-logo-image u-logo-image-1">
          </a>
          <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-responsive-from="XL">
            <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
              <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#" style="padding: 3px 40px; font-size: calc(1em + 6px);">
                <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
                <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
  </g></svg>
              </a>
            </div>
            <div class="u-nav-container">
              <ul class="u-nav u-spacing-30 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" href="#" style="padding: 10px 0px;">Accueil</a>
  </li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" href="#" style="padding: 10px 0px;">About</a>
  </li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" href="#" style="padding: 10px 0px;">Contact</a>
  </li></ul>
            </div>
            <div class="u-nav-container-collapse">
              <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                <div class="u-inner-container-layout u-sidenav-overflow">
                  <div class="u-menu-close"></div>
                  <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="#" style="padding: 10px 0px;">Accueil</a>
  </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="#" style="padding: 10px 0px;">About</a>
  </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="#" style="padding: 10px 0px;">Contact</a>
  <a class="u-button-style u-nav-link" href="../CustomBox/connexion">
            Connexion
        </a>    
        <a class="u-button-style u-nav-link" href="../CustomBox/inscription">
            Inscription
        </a>
</li></ul>
                </div>
              </div>
              <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
          </nav>
        </div></header>
      <section class="u-clearfix u-image u-section-1" id="carousel_4b49">
        <div class="u-clearfix u-sheet u-sheet-1">
          <div id="carousel-ee08" data-interval="5000" data-u-ride="carousel" class="u-carousel u-slider u-slider-1">
            <ol class="u-carousel-indicators u-opacity u-opacity-55 u-carousel-indicators-1">
              <li data-u-target="#carousel-ee08" class="u-active u-border-1 u-border-white u-shape-circle u-white" data-u-slide-to="0" style="height: 10px; width: 10px;"></li>
            </ol>
            <div class="u-carousel-inner" role="listbox">
              <div class="u-active u-align-left u-carousel-item u-container-style u-shape-rectangle u-slide">
                <div class="u-container-layout u-valign-top u-container-layout-1">
                  <h2 class="u-color-scheme-u10 u-color-style-multicolor-1 u-custom-font u-text u-text-1">
                    <span class="u-text-custom-color-1">L\'Atelier 17.91 </span>
                    <br>
                  </h2>
                  <p class="u-large-text u-text u-text-body-alt-color u-text-variant u-text-2">Création de lien&nbsp;</p>
                  <a href="Accueil.html#carousel_d0ab" data-page-id="815918998" class="u-border-2 u-border-palette-3-base u-btn u-btn-round u-button-style u-hover-palette-3-base u-none u-radius-7 u-text-body-alt-color u-text-hover-white u-btn-1">&nbsp;En savoir plus<br>
                  </a>
                </div>
              </div>
            </div>
            <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-hidden-sm u-hidden-xs u-spacing-10 u-text-palette-3-base u-carousel-control-1" href="#carousel-ee08" role="button" data-u-slide="prev">
              <span aria-hidden="true">
                <svg viewBox="0 0 256 256"><g><polygon points="207.093,30.187 176.907,0 48.907,128 176.907,256 207.093,225.813 109.28,128"></polygon>
  </g></svg>
              </span>
              <span class="sr-only">
                <svg viewBox="0 0 256 256"><g><polygon points="207.093,30.187 176.907,0 48.907,128 176.907,256 207.093,225.813 109.28,128"></polygon>
  </g></svg>
              </span>
            </a>
            <a class="u-carousel-control u-carousel-control-next u-hidden-sm u-hidden-xs u-spacing-10 u-text-palette-3-base u-carousel-control-2" href="#carousel-ee08" role="button" data-u-slide="next">
              <span aria-hidden="true">
                <svg viewBox="0 0 306 306"><g id="chevron-right"><polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153"></polygon>
  </g></svg>
              </span>
              <span class="sr-only">
                <svg viewBox="0 0 306 306"><g id="chevron-right"><polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153"></polygon>
  </g></svg>
              </span>
            </a>
          </div>
        </div>
      </section>
      <section class="u-clearfix u-grey-10 u-section-2" id="carousel_d0ab">
        <div class="u-clearfix u-sheet u-sheet-1">
          <div class="u-clearfix u-expanded-width u-gutter-20 u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
              <div class="u-layout-row">
                <div class="u-size-30 u-size-60-md">
                  <div class="u-layout-col">
                    <div class="u-align-center u-container-style u-layout-cell u-left-cell u-size-60 u-layout-cell-1">
                      <div class="u-container-layout u-container-layout-1">
                        <img class="u-expanded-width u-image u-image-1" src="images/im1.png" data-image-width="1440" data-image-height="1440">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="u-size-30 u-size-60-md">
                  <div class="u-layout-col">
                    <div class="u-size-40">
                      <div class="u-layout-row">
                        <div class="u-container-style u-layout-cell u-right-cell u-size-60 u-layout-cell-2">
                          <div class="u-container-layout u-valign-bottom u-container-layout-2">
                            <h2 class="u-text u-text-palette-1-base u-text-1">A propos&nbsp;</h2>
                            <p class="u-text u-text-palette-1-base u-text-2">Contribue à des solutions créatives &amp; solidaires,&nbsp;en toute confiance.&nbsp;<br>Nous proposons des ateliers itinérants dans toute la Lorraine.<br>- Upcycling&nbsp;<br>- Beauté inclusive&nbsp;<br>- Décoration&nbsp;<br>- Produits ménagers&nbsp;<br>- Bijoux recyclés
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="u-size-20">
                      <div class="u-layout-row">
                        <div class="u-container-style u-hidden-md u-hidden-sm u-hidden-xs u-layout-cell u-size-60 u-layout-cell-3">
                          <div class="u-container-layout u-container-layout-3">
                            <a href="Accueil.html#carousel_56cf" data-page-id="815918998" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-1">Nos Services</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      
     
      </section>
    </body>
  </html>';


        }


        $content .= '<br>                   
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


    public function render()
    {

        $content = $this->afficherAccueil();
        //$token=$this->tab[0]['token'];
        $base = $this->rq->getUri()->getBasePath();
        $css = $base . '/web/css/Accueil.css';
        $html = <<<END
<!DOCTYPE html>
<html>
<body><head>
<link rel="stylesheet" href='${css}'>
</head>
$content
</body>
</html>
END;
        return $html;
    }

}