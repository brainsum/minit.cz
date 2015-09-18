$( document ).ready(function() {
    $("#gmap").gmap3({
        map:{
            options:{
                center:[49.1724575, 16.8205382],
                zoom:14,
                mapTypeId: google.maps.MapTypeId.MAP,
                mapTypeControl: false,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                },
                navigationControl: true,
                scrollwheel: false,
            streetViewControl: true
            }
        },
        marker:{
            latLng:[49.1724575, 16.8205382]
        }
    });
});