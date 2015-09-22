<?php
/** @var Brainsum\Page $page */

$page = Brainsum\App::getPage();
$menu = Brainsum\App::getMenu();
$name = Brainsum\App::getConfig()->get('page.title');
$path = Brainsum\App::getRouter()->getPath();

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
    <meta property="og:site_name" content="<?= $name ?>"/>
    <meta property="og:description" content="<?= $page->getDescription() ?>"/>
    <meta property="og:url" content="<?= Brainsum\App::getUrl() ?>"/>
    <meta property="og:image" content="<?= Brainsum\App::getUrl('assets/img/fornetti-minit-opengraph.gif') ?>"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,300&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="<?= Brainsum\App::getAssetUrl('css/xs.css') ?>" media="all"/>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/vnd.microsoft.icon">

    <!--[if (IE 10)&(IEMobile)]><style>@-ms-viewport{width:auto!important}</style><![endif]-->
</head>

<body class="page-<?= $page->getRoute() ?>" vocab="http://schema.org/" typeof="WebPage">
<meta property="name" content="<?= $name ?>"/>
<meta property="isFamilyFriendly" content="true"/>

<!-- [MAIN] HEADER -->

<header id="header" class="clearfix">
    <div class="container">

        <!-- [MAIN.HEADER] LOGO -->

        <a id="logo" class="inline link" href="<?= Brainsum\App::getConfig()->get('home') ?>">
            <object data="img/fornetti-minit-logo.svg" type="image/svg+xml" width="94" height="40">
                <img src="img/fornetti-minit-logo.png" alt="Fornetti Minit" width="94" height="40"/>
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

<!-- [MAIN] FOOTER / CONTENT-INFO -->

<footer id="footer" class="block">
    <ul class="inline-block container">
        <li class="inline col xs-3">
            <h6 class="title">O nás</h6>
            <ul class="list">
                <li class="item"><a class="link" href="/o-nas#novinky">Novinky</a></li>
                <li class="item"><a class="link" href="/o-nas#historie">Historie</a></li>
                <li class="item"><a class="link" href="/o-nas#filozofie">Filozofie</a></li>
            </ul>
        </li>
        <li class="inline col xs-3">
            <h6 class="title">Pro partnery</h6>
            <ul class="list">
                <li class="item"><a class="link" href="/pro-partnery#vyhody-spoluprace">Výhody spolupráce</a></li>
                <li class="item"><a class="link" href="/pro-partnery#certifikaty">Certifikáty</a></li>
                <li class="item"><a class="link" href="/pro-partnery#faq">FAQ</a></li>
            </ul>
        </li>
        <li class="inline col xs-3">
            <h6 class="title">Online komunita</h6>
            <ul class="list">
                <li class="item"><a class="link" href="//www.facebook.com/minitkacz" title="Facebook">Facebook</a></li>
            </ul>
        </li>
        <li class="inline col xs-3">
            <h6 class="title">Kontakty</h6>
            <ul class="list">
                <li class="item"><a class="link" href="/kontakty">Obecné</a></li>
            </ul>
            <dl class="list term">
                <dt class="name">Tel./fax:</dt>
                <dd class="data">(+420) 517 375 322</dd>
                <dt class="name">Služby pro zákazníky</dt>
                <dd class="data">(+420) 606 165 807</dd>
                <dt class="name">Fakturace</dt>
                <dd class="data">(+420) 517 375 322</dd>
            </dl>
        </li>
    </ul>
</footer>

<!-- [MAIN] SCRIPTS -->

<script src="https://www.google.com/recaptcha/api.js" defer="defer" async="async"></script>

<?php if ($path === 'kontakty') : ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?= $page->getGoogleApiKey() ?>&amp;callback=minit.init"></script>
<?php endif ?>
<script id="script-ga" src="<?= Brainsum\App::getScheme() === 'https' ? 'https://ssl.' : 'http://www.' ?>google-analytics.com/ga.js" data-id="<?= $page->getAnalyticsCode() ?>" defer="defer"></script>
<script src="<?= Brainsum\App::getAssetUrl('js/app.js')?>" defer="defer"></script>
</body>
</html>
