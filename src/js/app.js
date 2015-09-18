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