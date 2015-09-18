<!-- [MAIN.NODE-TEXT] CONTENT -->

<div id="map" class="block block-lead view" role="presentation">
    <?=sprintf('<img src="https://maps.googleapis.com/maps/api/staticmap?%s" alt=""/>',
        http_build_query(array(
            'center'    => '49.1724575,16.8205382',
            'zoom'      => 14,
            'size'      => '640x360',
            'scale'     => 2,
            'key'       => Brainsum\App::getConfig()->get('google.api')
        ), '', '&amp;')
    ) ?>
</div>