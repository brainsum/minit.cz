(function (window, document, slide) {
    "use strict";

    var _n = document.getElementById('script-ga');
    var _s = document.querySelectorAll('*[data-component="slider"]');
    var _i = _n.getAttribute('data-id');
    var _m = {};

    // [BRAINSUM] SLIDER
    //
    // Automatically switches between the slider steps

    if (_s.length !== 0) {
        window.test = [];

        var Event = function (node, type, listener) {
            node.addEventListener(type, listener);
        };
        var Slider = function (node, time) {
            this.wrap = node;
            this.item = node.querySelectorAll('.slide');
            this.time = time;

            var l = this.item.length;
            var c = this;

            if (l > 0) {
                for (var i = 0; i < l; i ++) {
                    Event(c.wrap.querySelector('label[for="' + c.item[i].id + '"'), 'click', function () {
                        c.stop()
                    });
                }
                Event(this.wrap, 'mouseover', function() {
                    c.stop();
                });
                Event(this.wrap, 'mouseout', function () {
                    c.start();
                });
                this.start();
            }
        };
        Slider.prototype = {
            start: function () {
                var c = this;
                this.listener = setTimeout(function () {
                    c.next();
                    c.start();
                }, this.time);
            },

            stop: function () {
                this.listener = clearTimeout(this.listener);
            },

            next: function () {
                var item = null;

                for (var i = 0, l = this.item.length; i < l; i ++) {
                    if (this.item[i].checked === true) {
                        item = i === (l - 1) ? this.item[0] : this.item[i + 1];
                        break;
                    }
                }
                item.checked = true;
            }
        };

        for (var i = 0, l = _s.length; i < l; i ++) {
            window.test.push(_s[i].slider = new Slider(_s[i], slide));
        }
    }

    // [GOOGLE] ANALYTICS
    //
    // Appends the analytics script with a load-efficient, strict
    // and valid way

    var assignPage = function (analytics, id) {
        try {
            analytics._getTracker(id)._trackPageview()
        }
        catch (e) {
            console.error('> gat', e);
        }
    };

    // [GOOGLE] MAPS
    //
    // Configures the map on contact page

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

})(window, document, 3000);