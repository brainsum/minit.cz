(function (window) {
    "use strict";

    var _node = document.querySelector('section[data-component="parallax"] > .layer');
    var _data = 0;
    var _lock = false;

    var _getHeight = function () {
        _data = _node.clientHeight;
    };

    // Appending node size listeners

    window.addEventListener('resize', _getHeight, false);
    window.addEventListener('load', _getHeight, false);

    /**
     * Adding parallax effect to the header splash-image
     * @event scroll
     */
    window.addEventListener('scroll', function (e) {
        if (_lock === true || e.target.body.scrollTop > _data) {
            return;
        }
        else {
            _lock = true;
        }
        _node.style.transform = ['translate3d(0,', Math.round(e.target.body.scrollTop / 3), 'px,0)'].join('');
        _lock = false;
    }, true);
})(window);