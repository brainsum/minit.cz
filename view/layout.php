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

        <nav id="menu-wrapper" class="inline" role="navigation">
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

        <section class="block block-dark inline-container view" role="presentation">
            <div class="inline container">
                <h1 class="main">Zastavte sa na minútku.</h1>
                <h2 class="text">Zastavte sa na fornetti.</h2>
            </div>
        </section>

        <!-- [MAIN.NODE-ITEM] SLIDER -->

        <section class="block block-lead slider" role="region">
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
            <ul class="inline-container view module" role="list">
                <li class="inline-container view item">
                    <div class="inline" role="listitem">
                        <h3 class="title">Odteraz bude špenát chutiť každému!</h3>
                        <figure class="inline-container container">
                            <img class="inline xs-6 image" src="http://www.fornetti.sk/minit/files/imce/spenat.png" alt=""/>
                            <figcaption class="inline xs-6 text">
                                <p>Novinka, ktorej je súdené aby nám všetkým chutila. Lahodnú chuť špenátu v plnke dotvára syr Niva a povrch výrobku je posypaný zlatým chrumkavým syrom.</p>
                                <strong>Teraz je špenát nielen zdravý ale aj chutný!</strong>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="inline-container view item">
                    <div class="inline" role="listitem">
                        <h3 class="title">Odteraz bude špenát chutiť každému!</h3>
                        <figure class="inline-container container">
                            <img class="inline xs-6 image" src="http://www.fornetti.sk/minit/files/imce/spenat.png" alt=""/>
                            <figcaption class="inline xs-6 text">
                                <p>Novinka, ktorej je súdené aby nám všetkým chutila. Lahodnú chuť špenátu v plnke dotvára syr Niva a povrch výrobku je posypaný zlatým chrumkavým syrom.</p>
                                <strong>Teraz je špenát nielen zdravý ale aj chutný!</strong>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="inline-container view item">
                    <div class="inline" role="listitem">
                        <h3 class="title">Odteraz bude špenát chutiť každému!</h3>
                        <figure class="inline-container container">
                            <img class="inline xs-6 image" src="http://www.fornetti.sk/minit/files/imce/spenat.png" alt=""/>
                            <figcaption class="inline xs-6 text">
                                <p>Novinka, ktorej je súdené aby nám všetkým chutila. Lahodnú chuť špenátu v plnke dotvára syr Niva a povrch výrobku je posypaný zlatým chrumkavým syrom.</p>
                                <strong>Teraz je špenát nielen zdravý ale aj chutný!</strong>
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
                    <strong class="count">120</strong><em class="text">Prodejních míst</em>
                </li>
                <li class="inline xs-4">
                    <strong class="count">50</strong><em class="text">Různých druhů</em>
                </li>
                <li class="inline xs-4">
                    <strong class="count">15</strong><em class="text">Let na trhu</em>
                </li>
            </ul>
        </div>

        <!-- [MAIN.NODE-TEXT] CONTENT -->

        <section class="block block-lead content" role="region">
            <div class="container">
                <h2 class="title">Szöveges blokk</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at vehicula nunc, vel mollis tortor. Donec nec risus eget lectus ultricies mattis sed et nulla. Aliquam erat volutpat. Sed hendrerit consectetur rutrum. Donec auctor, turpis sit amet accumsan varius, ligula diam efficitur libero, at tristique nisl lorem et lectus. Sed in justo et magna ornare pretium sed tempus orci. Sed sit amet ultrices lacus, eget vehicula ex. Quisque faucibus auctor imperdiet. Aenean eget euismod lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mi purus, vestibulum ut lacinia sit amet, ultrices id velit. Praesent aliquet odio velit, nec blandit eros tristique quis. Etiam sed posuere ante.</p>
                <p>Maecenas imperdiet ligula vitae augue cursus, in imperdiet est dapibus. Cras in orci lacinia, tincidunt nibh vel, tempus leo. Suspendisse ligula ex, pulvinar non rhoncus non, lacinia non justo. Fusce justo lacus, dapibus a vehicula eget, bibendum quis felis. Aliquam interdum non felis ut laoreet. Cras eget faucibus ligula, et sodales tortor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed consectetur, velit sed pulvinar bibendum, nibh sapien pharetra ante, vitae cursus lectus ligula nec ex. Pellentesque massa enim, accumsan vitae mollis id, tempus in lorem. Proin vitae sagittis lacus. Nullam eu mi nec leo pellentesque aliquet.</p>
            </div>
        </section>

        <!-- [MAIN.NODE-TEXT] CONTENT -->

        <section class="block block-fade content" id="convergence" role="region">
            <div class="container">
                <h2 class="title">Szöveges blokk</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at vehicula nunc, vel mollis tortor. Donec nec risus eget lectus ultricies mattis sed et nulla. Aliquam erat volutpat. Sed hendrerit consectetur rutrum. Donec auctor, turpis sit amet accumsan varius, ligula diam efficitur libero, at tristique nisl lorem et lectus. Sed in justo et magna ornare pretium sed tempus orci. Sed sit amet ultrices lacus, eget vehicula ex. Quisque faucibus auctor imperdiet. Aenean eget euismod lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mi purus, vestibulum ut lacinia sit amet, ultrices id velit. Praesent aliquet odio velit, nec blandit eros tristique quis. Etiam sed posuere ante.</p>
                <a class="btn btn-next" href="#">Chem vedieť viac</a>
            </div>
        </section>
    </div>
</article>

</body>
</html>