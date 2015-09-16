<?php

$view = Brainsum\App::getConfig();

?><!DOCTYPE html>

<html id="root" xmlns="http://www.w3.org/1999/xhtml" xml:lang="cz" lang="cz" prefix="og: http://ogp.me/ns#">
<head>
    <!--[if (IE 9)&!(IEMobile)]><meta http-equiv="X-UA-Compatible" content="IE=9"/><![endif]-->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=900"/>
    <base href="<?= Brainsum\App::getUrl('assets') ?>/"/>

    <title><?= $view->get('seo.title') ?></title>

    <meta name="description" content="<?= $view->get('seo.description') ?>"/>
    <meta name="keywords" content="<?= implode(',', $view->get('seo.keywords', [])) ?>"/>
    <meta name="robots" content="all"/>
    <meta name="revisit-after" content="7 days"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE"/>

    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="<?= $view->get('seo.title') ?>"/>
    <meta property="og:description" content="<?= $view->get('seo.description') ?>"/>
    <meta property="og:url" content="<?= Brainsum\App::getUrl() ?>"/>
    <meta property="og:image" content=""/>

    <link type="image/x-icon" rel="icon" href="/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,300&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">

    <!--[if (IE 10)&(IEMobile)]><style>@-ms-viewport{width:auto!important}</style><![endif]-->

    <link type="text/css" rel="stylesheet" href="css/xs.css" media="all"/>
</head>

<body vocab="http://schema.org/" typeof="WebPage">
<meta property="name" content="<?= $view->get('seo.title') ?>"/>
<meta property="isFamilyFriendly" content="true"/>

<!-- [MAIN] HEADER -->

<header id="header" class="clearfix">
    <div class="container">

        <!-- [MAIN.HEADER] LOGO -->

        <a id="logo" class="inline link" href="/">
            <object data="img/fornetti-minit-logo.svg" type="image/svg+xml" width="93" height="40">
                <img src="img/fornetti-minit-logo.png" alt="" width="93" height="40"/>
            </object>
        </a>

        <!-- [MAIN.HEADER] NAVIGATION -->

        <nav id="menu-wrapper" class="inline">
            <ul id="menu" class="inline-container">
                <li class="inline item active"><a class="link" href="/#o-nas">O nás</a></li>
                <li class="inline item"><a class="link" href="/#pro-partnery">Pro partnery</a></li>
                <li class="inline item"><a class="link" href="/#kontakty">Kontakty</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- [MAIN] CONTENT -->

<article id="main" role="main">
    <div id="main-container">

        <!-- [MAIN.NODE-ITEM] MARKETING LEAD -->

        <section class="block block-dark view" id="splash" data-component="parallax" role="presentation">
            <div class="inline-container view layer">
                <div class="inline container">
                    <h1 class="main">Zastavte se na minutku.</h1>
                    <h2 class="text">Zastavte se na fornetti.</h2>
                </div>
            </div>
        </section>

        <!-- [MAIN.NODE-ITEM] SLIDER -->

        <section class="block block-lead slider">
            <input id="slider-0-0" class="hidden" name="x-slider" type="radio" checked=""/>
            <input id="slider-0-1" class="hidden" name="x-slider" type="radio"/>
            <input id="slider-0-2" class="hidden" name="x-slider" type="radio"/>

            <div class="page">
                <ul class="inline-container list">
                    <li class="inline item"><label class="selector" for="slider-0-0"></label></li>
                    <li class="inline item"><label class="selector" for="slider-0-1"></label></li>
                    <li class="inline item"><label class="selector" for="slider-0-2"></label></li>
                </ul>
            </div>
            <ul class="inline-container view module">
                <li class="inline-container view item">
                    <div class="inline">
                        <h3 class="title">Odteď bude špenát chutnat každému!</h3>
                        <figure class="inline-container container">
                            <img class="inline xs-6 image" src="img/spenat.png" alt="špenát"/>
                            <figcaption class="inline xs-6 text">
                                <p>Novinka, které je souzeno, aby nám všem chutnala. Lahodnou chuť špenátové náplně podtrhuje sýr niva a povrch je posypaný zlatým a křupavým sýrem.</p>
                                <strong>Od teď je špenát nejen zdravý, ale také chutný!</strong>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="inline-container view item">
                    <div class="inline">
                        <h3 class="title">MINIT má novou prodejnu v Českých Budějovicích</h3>
                        <figure class="inline-container container">
                            <img class="inline xs-6 image" src="img/cola.png" alt="Cola"/>
                            <figcaption class="inline xs-6 text">
                                <p>Otevřeli jsme zbrusu novou prodejnu v Mercury centru v Českých Budějovicích. Kompletně nový styl, příjemné prostředí a stále stejně chutné a kvalitní produkty.</p>
                                <strong>Těšíme se na vaši návštěvu!</strong>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="inline-container view item">
                    <div class="inline">
                        <h3 class="title">Vychutnejte si novinku – makové Rollo</h3>
                        <figure class="inline-container container">
                            <img class="inline xs-6 image" src="img/nugat.png" alt="Nugát"/>
                            <figcaption class="inline xs-6 text">
                                <p>Mák patří k naší zemi stejně jako špagety k Itálii. Vaše velká poptávka po makových produktech nám vnukla skvělý nápad. Stávajícímu skořicovému Rollu tak přibyl makový bratr!</p>
                                <strong>Vychutnat si ho můžete již teď na všech prodejnách.</strong>
                            </figcaption>
                        </figure>
                    </div>
                </li>
            </ul>
        </section>

        <!-- [MAIN.NODE-LIST] -->

        <div class="block block-fade" id="lead" role="presentation">
            <ul class="inline-container container">
                <li class="inline xs-4">
                    <strong class="count">150</strong><em class="text">prodejních míst</em>
                </li>
                <li class="inline xs-4">
                    <strong class="count">50</strong><em class="text">různých druhů</em>
                </li>
                <li class="inline xs-4">
                    <strong class="count">15</strong><em class="text">let na trhu</em>
                </li>
            </ul>
        </div>

        <!-- [MAIN.NODE-TEXT] CONTENT -->

        <section class="block block-lead content">
            <div class="container">
                <h2 class="title">Naše historie</h2>
                <p>Máte „minitku“? Příběh, který stojí za každým kouskem našeho pečiva, totiž stojí za přečtení. Už v roce 2000 jste si ve Znojmě mohli vychutnat první kousky křupavého a lahodného pečiva. Ušli jsme od té doby dlouhou cestu, začínali jsme se základními produkty v pár prodejnách. Jenže jsme si uvědomili, že český jazýček není úplně jednoduché uspokojit a začali jsme vyvíjet chutě ušité na míru vašim chuťovým pohárkům.</p>
                <p>Maecenas imperdiet ligula vitae augue cursus, in imperdiet est dapibus. Cras in orci lacinia, tincidunt nibh vel, tempus leo. Suspendisse ligula ex, pulvinar non rhoncus non, lacinia non justo. Fusce justo lacus, dapibus a vehicula eget, bibendum quis felis. Aliquam interdum non felis ut laoreet. Cras eget faucibus ligula, et sodales tortor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed consectetur, velit sed pulvinar bibendum, nibh sapien pharetra ante, vitae cursus lectus ligula nec ex. Pellentesque massa enim, accumsan vitae mollis id, tempus in lorem. Proin vitae sagittis lacus. Nullam eu mi nec leo pellentesque aliquet.</p>
            </div>
        </section>

        <!-- [MAIN.NODE-TEXT] CONTENT -->

        <section class="block block-fade content" id="convergence">
            <div class="container">
                <h2 class="title">Szöveges blokk</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at vehicula nunc, vel mollis tortor. Donec nec risus eget lectus ultricies mattis sed et nulla. Aliquam erat volutpat. Sed hendrerit consectetur rutrum. Donec auctor, turpis sit amet accumsan varius, ligula diam efficitur libero, at tristique nisl lorem et lectus. Sed in justo et magna ornare pretium sed tempus orci. Sed sit amet ultrices lacus, eget vehicula ex. Quisque faucibus auctor imperdiet. Aenean eget euismod lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mi purus, vestibulum ut lacinia sit amet, ultrices id velit. Praesent aliquet odio velit, nec blandit eros tristique quis. Etiam sed posuere ante.</p>
                <a class="btn btn-next" href="#">Chem vedieť viac</a>
            </div>
        </section>
    </div>
</article>

<script src="js/app.js" defer="" async=""></script>
</body>
</html>