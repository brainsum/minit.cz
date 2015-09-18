<?php
/** @var Brainsum\Page $page */

$page = Brainsum\App::getPage();
$menu = Brainsum\App::getMenu();

?><!DOCTYPE html>

<html id="root" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $page->getLang() ?>" lang="<?= $page->getLang() ?>" prefix="og: http://ogp.me/ns#">
<head>
    <!--[if (IE 9)&!(IEMobile)]><meta http-equiv="X-UA-Compatible" content="IE=9"/><![endif]-->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=900"/>
    <base href="<?= Brainsum\App::getUrl('assets') ?>/"/>

    <title><?= $page->getTitle(true, true) ?></title>

    <meta name="description" content="<?= $page->getDescription() ?>"/>
    <meta name="keywords" content="<?= $page->getKeywords(true, true) ?>"/>
    <meta name="robots" content="all"/>
    <meta name="revisit-after" content="7 days"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE"/>

    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="<?= $page->getTitle() ?>"/>
    <meta property="og:description" content="<?= $page->getDescription() ?>"/>
    <meta property="og:url" content="<?= Brainsum\App::getUrl() ?>"/>
    <meta property="og:image" content="<?= Brainsum\App::getUrl('assets/img/fornetti-minit-opengraph.gif') ?>"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,300&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="<?= Brainsum\App::getAssetUrl('css/xs.css') ?>" media="all"/>

    <!--[if (IE 10)&(IEMobile)]><style>@-ms-viewport{width:auto!important}</style><![endif]-->
</head>

<body class="page-<?= $page->getRoute() ?>" vocab="http://schema.org/" typeof="WebPage">
<meta property="name" content="<?= $page->getTitle() ?>"/>
<meta property="isFamilyFriendly" content="true"/>

<!-- [MAIN] HEADER -->

<header id="header" class="clearfix">
    <div class="container">

        <!-- [MAIN.HEADER] LOGO -->

        <a id="logo" class="inline link" href="/">
            <object data="img/fornetti-minit-logo.svg" type="image/svg+xml" alt="Fornetti Minit logo" width="94" height="40">
                <img src="img/fornetti-minit-logo.png" alt="Fornetti Minit logo" width="94" height="40"/>
            </object>
        </a>

        <!-- [MAIN.HEADER] NAVIGATION -->

        <nav id="menu-wrapper" class="inline">
            <ul id="menu" class="inline-container">
                <?php foreach ($menu as $item) : ?>
                    <?=sprintf('<li class="inline item%s"><a class="link" href="/%s">%s</a></li>',
                        $item['mode'] === true ? ' active' : '',
                        $item['path'],
                        htmlspecialchars($item['name'])
                    ) ?>
                <?php endforeach ?>
            </ul>
        </nav>
    </div>
</header>

<!-- [MAIN] CONTENT -->

<article id="main" role="main">
    <h1 class="hidden"><?= $page->getTitle() ?></h1>
    <div id="main-container"><?= (string) Brainsum\App::getPage() ?></div>
</article>

<script src="https://www.google.com/recaptcha/api.js" defer="defer"></script>

<!-- Google Analytics scripts -->
<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>
<script type="text/javascript">
    try {
        var pageTracker = _gat._getTracker("UA-9977596-1");
        pageTracker._trackPageview();
    } catch(err) {}
</script>
</body>
</html>