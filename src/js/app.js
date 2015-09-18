(function (window, document) {
    "use strict";

    var _n = document.getElementById('script-ga');
    var _i = _n.getAttribute('data-id');

    /**
     * Assigning the current pageview to the Analytics Tracker
     *
     * @param analytics
     * @param {String} id
     */
    var assignPage = function (analytics, id) {
        try {
            analytics._getTracker(id)._trackPageview()
        }
        catch (e) {
            console.error('> gat', e);
        }
    };
    if (window._gat === undefined) {
        _n.addEventListener('load', function () {assignPage(window._gat, _i)}, false);
    }
    else assignPage(window._gat, _i);
})(window, document);

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