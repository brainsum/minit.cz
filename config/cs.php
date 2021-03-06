<?php return array(
    'lang' => 'cs',
    'sign' => array('DEVELOPED BY BRAINSUM', 2015),
    'mail' => array(
        'from' => array(
            'name' => 'minitbohemia.cz',
            'mail' =>'dev@brainsum.com'
        ),
        'send' => 'fornetti@fornetti.cz'
    ),

    'home' => '/o-nas',

    'page' => array(
        'title'         => 'Minit',
        'description'   => 'Fornetti Minit',
        'keywords'      => array('fornetti', 'minit')
    ),
    'path' => array(
        'o-nas' => array(
            'title' => 'O nás',
            'block' => array('splash', 'slider', 'what-we-have', 'our-history', 'philosophy', 'convergence')
        ),
        'produkty' => array(
            'title' => 'Produkty',
            'block' => array('products-categories', 'mini-products', 'pizza', 'xxl-products')
        ),
        'pro-partnery' => array(
            'title' => 'Pro partnery',
            'block' => array('splash', 'gallery', 'cooperation', 'franchise', 'certifications', 'short-history', 'form', 'faq')
        ),
        'kontakty' => array(
            'title' => 'Kontakty',
            'block' => array('contact', 'map')
        )
    ),
    'google' => array(
        'api'       => 'AIzaSyBI1iZhFDbanI2iXAPgZRHPcBcU2N3f724',
        'map'       => array(
            'lat'   => 49.1724575,
            'lng'   => 16.8205382,
            'zoom'  => 11
        ),
        'analytics' => 'UA-9977596-1',
        'recaptcha' => array(
            'private'   => '6LeC-AwTAAAAAJTWk97C6XImTwgRer4_075J15KC',
            'public'    => '6LeC-AwTAAAAAIKFmpvgZSlM4Oqv5f0xHcp54mJ9'
        )
    )
);
