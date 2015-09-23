<!-- [MAIN.NODE-FORM] -->

<section class="region">
<div class="block block-lead content">
    <div class="container">
        <h2 class="title">Získat více informací</h2>
        <p>Pro lepší a rychlejší navržení modelu spolupráce prosím vyplňte následující údaje. Po jejich odeslání vás bude v průběhu jednoho pracovního dne kontaktovat přidělený obchodní zástupce, který s vámi dohodne případné osobní setkání a zodpoví všechny vaše otázky.</p>

        <form class="form" name="contact" action="/" method="post" enctype="application/x-www-form-urlencoded">
            <div class="item required">
                <label class="label" for="info-name">Vaše meni/firma</label>
                <input class="input" id="info-name" name="name" type="text" maxlength="255" required=""/>
            </div>
            <div class="item required">
                <label class="label" for="info-address">Město</label>
                <input class="input" id="info-address" name="address" type="text" maxlength="255" required=""/>
            </div>
            <div class="item required">
                <label class="label" for="info-phone">Kontaktní tel. číslo</label>
                <input class="input" id="info-phone" name="phone" type="text" maxlength="255" required=""/>
            </div>
            <div class="item required">
                <label class="label" for="info-phone">E-mail</label>
                <input class="input" id="info-email" name="email" type="email" maxlength="255" required=""/>
            </div>
            <div class="item item-expand">
                <label class="label" for="info-cooperation">Vaše představa o spolupráci / o jaký sortiment máte zájem</label>
                <textarea class="input" name="cooperation" id="info-cooperation"></textarea>
            </div>
            <div class="item item-expand required">
                <div class="g-recaptcha" data-sitekey="<?= Brainsum\App::getConfig()->get('google.recaptcha.public') ?>"></div>
            </div>

            <input class="btn" type="submit" value="Odeslat"/>
            <input type="hidden" name="token" value="<?= Brainsum\App::getToken(true) ?>"/>
        </form>
    </div>
</div>
</section>