(function (window, document) {
    "use strict";

    var _n = document.getElementById('script-ga');
    var _i = _n.getAttribute('data-id');
    var _m = {};

    var assignPage = function (analytics, id) {
        try {
            analytics._getTracker(id)._trackPageview()
        }
        catch (e) {
            console.error('> gat', e);
        }
    };
    var assignMap = function (id, maps) {
        var n = document.getElementById(id);
        if (n === null) {
            return;
        }
        var c = JSON.parse(n.getAttribute('data-config'));
        var p = new maps.LatLng(c.lat, c.lng);

        _m.pos = p;
        _m.map = new maps.Map(n, {
            center: p,
            zoom: c.zoom,
            mapTypeControl: false,
            mapTypeId: maps.MapTypeId.ROADMAP,
            navigationControl: true,
            scrollwheel: false
        });
        _m.pin = new maps.Marker({position: p, map: _m.map});

        window.addEventListener('resize', function () {
            _m.map.setCenter(_m.pos)
        }, false);
    };

    window._gat === undefined && _n.addEventListener('load', function () {assignPage(window._gat, _i)}, false) || assignPage(window._gat, _i);
    window.minit = {
        init: function () {assignMap('map-js', google.maps)}
    }

})(window, document);