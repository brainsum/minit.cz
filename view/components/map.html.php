<?php

$config = Brainsum\App::getConfig();
$lat    = $config->get('google.map.lat');
$lng    = $config->get('google.map.lng');
$zoom   = $config->get('google.map.zoom');

?><!-- [MAIN.NODE-TEXT] CONTENT -->

<div id="map" class="block block-fade" role="presentation">

    <!-- [COMPONENT] NOSCRIPT FALLBACK -->

    <noscript aria-hidden="true">
        <div class="container"><?=sprintf('<img class="fallback" src="https://maps.googleapis.com/maps/api/staticmap?%s" alt=""/>',
            http_build_query(array(
                'maptype'   => 'roadmap',
                'sensor'    => false,
                'center'    => implode(',', array($lat, $lng)),
                'zoom'      => $zoom,
                'size'      => '450x250',
                'scale'     => 2,
                'key'       => $config->get('google.api')
            ), '', '&amp;')
        ) ?></div>
        <div class="marker"><img src="img/hd/marker.png" alt=""/></div>
    </noscript>

    <!-- [COMPONENT] STANDARD FUNCTIONALITY -->

    <div id="map-js" class="view" data-config="<?= htmlspecialchars(json_encode(array(
        'lat' => $lat,
        'lng' => $lng,
        'zoom' => $zoom
    ))) ?>"></div>
</div>