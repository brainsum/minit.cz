<!-- [MAIN.NODE-FORM] -->

<section class="block block-lead content">
    <div class="container">
        <h2 class="title">Získať viac informácií</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut laoreet porttitor risus, mollis vulputate nibh. Proin vel sagittis ex, eu aliquam sapien.</p>

        <form class="form" name="contact" action="/" method="post">
            <div class="item required">
                <label class="label" for="info-name">Vaše meni/firma</label>
                <input class="input" id="info-name" name="name" type="text" maxlength="255" required=""/>
            </div>
            <div class="item required">
                <label class="label" for="info-address">Zadajte okres</label>
                <input class="input" id="info-address" name="address" type="text" maxlength="255" required=""/>
            </div>
            <div class="item required">
                <label class="label" for="info-phone">Kontaktné tel. číslo</label>
                <input class="input" id="info-phone" name="phone" type="text" maxlength="255" required=""/>
            </div>
            <div class="item required">
                <label class="label" for="info-phone">E-mail</label>
                <input class="input" id="info-email" name="email" type="email" maxlength="255" required=""/>
            </div>
            <div class="item item-expand">
                <label class="label" for="info-message">Stručný popis Vašej prevádzky</label>
                <textarea class="input" name="message" id="info-message"></textarea>
            </div>
            <div class="item item-expand">
                <label class="label" for="info-cooperation">Vaša predstava o spolupráci / o aký sortiment máte záujem</label>
                <textarea class="input" name="cooperation" id="info-cooperation"></textarea>
            </div>
            <div class="item item-expand required">
                <div class="g-recaptcha" data-sitekey="6LeC-AwTAAAAAIKFmpvgZSlM4Oqv5f0xHcp54mJ9"></div>
            </div>

            <input class="btn" type="submit" value="Odoslať"/>
            <input type="hidden" name="token" value="<?= Brainsum\App::getToken(true) ?>"/>
        </form>
    </div>
</section>