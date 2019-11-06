/*!-----------------------------------------------------------------
    Name: Youplay - Game Template based on Bootstrap
    Version: 3.3.1
    Author: nK
    Website: https://nkdev.info/
    Purchase: https://themeforest.net/item/youplay-game-template-based-on-bootstrap/11306207?ref=_nK
    Support: https://nk.ticksy.com/
    License: You must have a valid license purchased only from ThemeForest (the above link) in order to legally use the theme for your project.
    Copyright 2019.
-------------------------------------------------------------------*/
    /******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
/*------------------------------------------------------------------

  Utility

-------------------------------------------------------------------*/
var $ = jQuery;
var isMobile = /Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/g.test(navigator.userAgent || navigator.vendor || window.opera);
var $wnd = $(window);
var $doc = $(document);

exports.$ = $;
exports.$wnd = $wnd;
exports.$doc = $doc;
exports.isMobile = isMobile;

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
/*------------------------------------------------------------------

  Theme Options

-------------------------------------------------------------------*/
var options = {
    // enable parallax
    parallax: true,

    // set small navbar on load
    navbarSmall: false,

    // enable fade effect between pages
    fadeBetweenPages: true,

    // twitter and instagram php paths
    php: {
        twitter: './php/twitter/tweet.php',
        instagram: './php/instagram/instagram.php'
    }
};

exports.options = options;

/***/ }),
/* 2 */,
/* 3 */,
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(5);


/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _options = __webpack_require__(1);

var _utility = __webpack_require__(0);

var _fadeBetweenPages2 = __webpack_require__(6);

var _initAnchors2 = __webpack_require__(7);

var _initFacebook2 = __webpack_require__(8);

var _initInstagram2 = __webpack_require__(9);

var _initTwitter2 = __webpack_require__(10);

var _initNavbar2 = __webpack_require__(11);

var _initForms2 = __webpack_require__(12);

var _initSearch2 = __webpack_require__(13);

var _initObjectFitImages2 = __webpack_require__(14);

var _initFlickity2 = __webpack_require__(15);

var _initOwlCarousel2 = __webpack_require__(16);

var _initMagnificPopup2 = __webpack_require__(17);

var _initSliderRevolution2 = __webpack_require__(18);

var _initIsotope2 = __webpack_require__(19);

var _initHexagonRating2 = __webpack_require__(20);

var _initJarallax2 = __webpack_require__(21);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

/*------------------------------------------------------------------

  Youplay Class

-------------------------------------------------------------------*/
var YOUPLAY = function () {
    function YOUPLAY(newOptions) {
        _classCallCheck(this, YOUPLAY);

        var self = this;
        self.options = newOptions;
    }

    _createClass(YOUPLAY, [{
        key: 'init',
        value: function init(newOptions) {
            // prt:sc:dm

            var self = this;

            // init options
            self.options = _utility.$.extend({}, this.options, newOptions);

            function initPlugins() {
                // navbar set to small
                if (!self.options.navbarSmall) {
                    self.options.navbarSmall = (0, _utility.$)('.navbar-youplay').hasClass('navbar-small');
                }

                // init tooltips and popovers
                (0, _utility.$)('[data-toggle="tooltip"]').tooltip({
                    container: 'body'
                });
                (0, _utility.$)('[data-toggle="popover"]').popover();

                // fade between pages
                self.fadeBetweenPages();
                self.initAnchors();
                self.initFacebook();
                self.initInstagram();
                self.initTwitter();
                self.initNavbar();
                self.initForms();
                self.initSearch();

                // Plugins
                self.initObjectFitImages();
                self.initFlickity();
                self.initOwlCarousel();
                self.initMagnificPopup();
                self.initSliderRevolution();
                self.initIsotope();
                self.initHexagonRating();

                // accordions
                (0, _utility.$)('.youplay-accordion, .panel-group').find('.collapse').on('shown.bs.collapse', function () {
                    (0, _utility.$)(this).parent().find('.icon-plus').removeClass('icon-plus').addClass('icon-minus');
                    self.refresh();
                }).on('hidden.bs.collapse', function () {
                    (0, _utility.$)(this).parent().find('.icon-minus').removeClass('icon-minus').addClass('icon-plus');
                    self.refresh();
                });

                // jarallax init after all plugins
                self.initJarallax();
            }

            if ((0, _utility.$)('.page-preloader').length) {
                // after page load
                _utility.$wnd.on('load', function () {
                    initPlugins();

                    // some timeout after plugins init
                    setTimeout(function () {
                        // hide preloader
                        (0, _utility.$)('.page-preloader').fadeOut(function () {
                            (0, _utility.$)(this).find('> *').remove();
                        });
                    }, 200);
                })

                // fix safari back button
                // thanks http://stackoverflow.com/questions/8788802/prevent-safari-loading-from-cache-when-back-button-is-clicked
                .on('pageshow', function (e) {
                    if (e.originalEvent.persisted) {
                        (0, _utility.$)('.page-preloader').hide();
                    }
                });
            } else {
                initPlugins();
                _utility.$wnd.on('load', function () {
                    self.refresh();
                });
            }
        }

        // eslint-disable-next-line

    }, {
        key: 'refresh',
        value: function refresh() {
            window.dispatchEvent(new Event('resize'));
        }
    }, {
        key: 'fadeBetweenPages',
        value: function fadeBetweenPages() {
            return _fadeBetweenPages2.fadeBetweenPages.call(this);
        }
    }, {
        key: 'initAnchors',
        value: function initAnchors() {
            return _initAnchors2.initAnchors.call(this);
        }
    }, {
        key: 'initFacebook',
        value: function initFacebook() {
            return _initFacebook2.initFacebook.call(this);
        }
    }, {
        key: 'initInstagram',
        value: function initInstagram() {
            return _initInstagram2.initInstagram.call(this);
        }
    }, {
        key: 'initTwitter',
        value: function initTwitter() {
            return _initTwitter2.initTwitter.call(this);
        }
    }, {
        key: 'initNavbar',
        value: function initNavbar() {
            return _initNavbar2.initNavbar.call(this);
        }
    }, {
        key: 'initForms',
        value: function initForms() {
            return _initForms2.initForms.call(this);
        }
    }, {
        key: 'initSearch',
        value: function initSearch() {
            return _initSearch2.initSearch.call(this);
        }
    }, {
        key: 'initObjectFitImages',
        value: function initObjectFitImages() {
            return _initObjectFitImages2.initObjectFitImages.call(this);
        }
    }, {
        key: 'initFlickity',
        value: function initFlickity() {
            return _initFlickity2.initFlickity.call(this);
        }
    }, {
        key: 'initOwlCarousel',
        value: function initOwlCarousel() {
            return _initOwlCarousel2.initOwlCarousel.call(this);
        }
    }, {
        key: 'initMagnificPopup',
        value: function initMagnificPopup() {
            return _initMagnificPopup2.initMagnificPopup.call(this);
        }
    }, {
        key: 'initSliderRevolution',
        value: function initSliderRevolution() {
            return _initSliderRevolution2.initSliderRevolution.call(this);
        }
    }, {
        key: 'initIsotope',
        value: function initIsotope() {
            return _initIsotope2.initIsotope.call(this);
        }
    }, {
        key: 'initHexagonRating',
        value: function initHexagonRating() {
            return _initHexagonRating2.initHexagonRating.call(this);
        }
    }, {
        key: 'initJarallax',
        value: function initJarallax() {
            return _initJarallax2.initJarallax.call(this);
        }
    }]);

    return YOUPLAY;
}();

/*------------------------------------------------------------------

  Init Youplay

-------------------------------------------------------------------*/


window.youplay = new YOUPLAY(_options.options);

/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.fadeBetweenPages = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Fade Between Pages
  note: use .no-fade classname for links, that not need to fade

-------------------------------------------------------------------*/
function fadeBetweenPages() {
    var _this = this;

    // prevent fade between pages if there is no preloader
    if (!_this.options.fadeBetweenPages || !(0, _utility.$)('.page-preloader').length) {
        return;
    }

    _utility.$doc.on('click', 'a:not(.no-fade):not([target="_blank"]):not(.btn):not(.button):not([href*="#"]):not([href^="mailto"]):not([href^="javascript:"]):not(.search-toggle)', function (e) {
        // default prevented
        if (e.isDefaultPrevented()) {
            return;
        }

        // prevent for gallery
        if ((0, _utility.$)(this).parents('.gallery-popup:eq(0)').length) {
            return;
        }

        // stop if empty attribute
        if (!(0, _utility.$)(this).attr('href')) {
            return;
        }

        var href = this.href;

        if ((0, _utility.$)(this).hasClass('dropdown-toggle')) {
            if ((0, _utility.$)(this).next('.dropdown-menu').css('visibility') === 'hidden' || (0, _utility.$)(this).parent().hasClass('open')) {
                return;
            }
        }

        if (href) {
            e.preventDefault();

            (0, _utility.$)('.page-preloader').fadeIn(400, function () {
                window.location.href = href;
            });
        }
    });
}

exports.fadeBetweenPages = fadeBetweenPages;

/***/ }),
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initAnchors = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Anchors

-------------------------------------------------------------------*/
function initAnchors() {
    _utility.$doc.on('click', '.navbar a:not(.search-toggle), a.btn', function (e) {
        var isHash = this.hash;
        var isURIsame = this.baseURI === window.location.href;

        if (isHash && isHash !== '#' && isHash !== '#!' && isURIsame) {
            var $hashBlock = (0, _utility.$)(isHash);
            var hash = isHash.replace(/^#/, '');
            if ($hashBlock.length) {
                // add hash to address bar
                $hashBlock.attr('id', '');
                document.location.hash = hash;
                $hashBlock.attr('id', hash);

                // scroll to block
                (0, _utility.$)('html, body').stop().animate({
                    scrollTop: $hashBlock.offset().top - 80
                }, 700);

                e.preventDefault();
            }
        }
    });
}

exports.initAnchors = initAnchors;

/***/ }),
/* 8 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initFacebook = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Init Facebook

-------------------------------------------------------------------*/
function initFacebook() {
    if (!(0, _utility.$)('.fb-page').length) {
        return;
    }
    var self = this;

    (0, _utility.$)('body').append('<div id="fb-root"></div>');

    (function (d, s, id) {
        if (window.location.protocol === 'file:') {
            return;
        }
        var fjs = d.getElementsByTagName(s)[0];

        if (d.getElementById(id)) {
            return;
        }
        var js = d.createElement(s);js.id = id;
        js.src = '//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4';
        fjs.parentNode.insertBefore(js, fjs);
    })(document, 'script', 'facebook-jssdk');

    // resize on facebook widget loaded
    window.fbAsyncInit = function () {
        window.FB.Event.subscribe('xfbml.render', function () {
            self.refresh();
        });
    };
}

exports.initFacebook = initFacebook;

/***/ }),
/* 9 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initInstagram = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Instagram

-------------------------------------------------------------------*/
function initInstagram() {
    var self = this;
    var $instagram = (0, _utility.$)('.youplay-instagram');
    if (!$instagram.length || !self.options.php.instagram) {
        return;
    }

    /**
     * Templating a instagram item using '{{ }}' braces
     * @param  {Object} data Instagram item details are passed
     * @return {String} Templated string
     */
    var templating = function templating(data, temp) {
        var tempVariables = ['link', 'image', 'caption'];

        for (var i = 0, len = tempVariables.length; i < len; i++) {
            temp = temp.replace(new RegExp('{{' + tempVariables[i] + '}}', 'gi'), data[tempVariables[i]]);
        }

        return temp;
    };

    $instagram.each(function () {
        var $this = (0, _utility.$)(this);
        var instagramOptions = {
            userID: $this.attr('data-instagram-user-id') || null,
            count: $this.attr('data-instagram-count') || 6,
            template: $this.attr('data-instagram-template') || ['<div class="col-xs-4">', '    <a href="{{link}}" target="_blank">', '        <img src="{{image}}" alt="{{caption}}" class="kh-img-stretch">', '    </a>', '</div>'].join(' '),
            loadingText: 'Loading...',
            failText: 'Failed to load data',
            apiPath: self.options.php.instagram
        };

        // stop if running in file protocol
        if (window.location.protocol === 'file:') {
            $this.html('<div class="col-xs-12">' + instagramOptions.failText + '</div>');
            // eslint-disable-next-line
            console.error('You should run you website on webserver with PHP to get working Twitter');
            return;
        }

        if (!instagramOptions.userID) {
            $this.html('<div class="col-xs-12">' + instagramOptions.failText + '</div>');
            // eslint-disable-next-line
            console.error('If you want to fetch instagram images, you must define the user ID. How to get it see here - http://jelled.com/instagram/lookup-user-id');
            return;
        }

        $this.html('<div class="col-xs-12">' + instagramOptions.loadingText + '</div>');

        // Fetch instagram images
        _utility.$.getJSON(instagramOptions.apiPath, {
            userID: instagramOptions.userID,
            count: instagramOptions.count
        }, function (response) {
            $this.html('');

            for (var i = 0; i < instagramOptions.count; i++) {
                var instaItem = false;
                if (response[i]) {
                    instaItem = response[i];
                } else if (response.statuses && response.statuses[i]) {
                    instaItem = response.statuses[i];
                } else {
                    break;
                }

                var tempData = {
                    link: instaItem.link,
                    image: instaItem.images.thumbnail.url,
                    caption: instaItem.caption
                };

                $this.append(templating(tempData, instagramOptions.template));
            }

            // resize window
            self.refresh();
        }).fail(function (a) {
            $this.html('<div class="col-xs-12">' + instagramOptions.failText + '</div>');
            // eslint-disable-next-line
            console.error(a.responseText);
        });
    });
}

exports.initInstagram = initInstagram;

/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initTwitter = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Twitter
  https://github.com/sonnyt/Tweetie

-------------------------------------------------------------------*/
function initTwitter() {
    var $twtFeeds = (0, _utility.$)('.youplay-twitter');
    var self = this;
    if (!$twtFeeds.length || !self.options.php.twitter) {
        return;
    }

    /**
     * Templating a tweet using '{{ }}' braces
     * @param  {Object} data Tweet details are passed
     * @return {String}      Templated string
     */
    var templating = function templating(data, temp) {
        var tempVariables = ['date', 'tweet', 'avatar', 'url', 'retweeted', 'screen_name', 'user_name'];

        for (var i = 0, len = tempVariables.length; i < len; i++) {
            temp = temp.replace(new RegExp('{{' + tempVariables[i] + '}}', 'gi'), data[tempVariables[i]]);
        }

        return temp;
    };

    $twtFeeds.each(function () {
        var $this = (0, _utility.$)(this);
        var twitterOptions = {
            username: $this.attr('data-twitter-user-name') || null,
            list: null,
            hashtag: $this.attr('data-twitter-hashtag') || null,
            count: $this.attr('data-twitter-count') || 2,
            hideReplies: $this.attr('data-twitter-hide-replies') === 'true',
            template: $this.attr('data-twitter-template') || ['<div>', '    <div class="youplay-twitter-icon"><i class="fab fa-twitter"></i></div>', '    <div class="youplay-twitter-date date">', '        <span>{{date}}</span>', '    </div>', '    <div class="youplay-twitter-text">', '       {{tweet}}', '    </div>', '</div>'].join(' '),
            loadingText: 'Loading...',
            failText: 'Failed to load data',
            apiPath: self.options.php.twitter
        };

        // stop if running in file protocol
        if (window.location.protocol === 'file:') {
            $this.html(twitterOptions.failText);
            // eslint-disable-next-line
            console.error('You should run you website on webserver with PHP to get working Twitter');
            return;
        }

        if (twitterOptions.list && !twitterOptions.username) {
            $this.html(twitterOptions.failText);
            // eslint-disable-next-line
            console.error('If you want to fetch tweets from a list, you must define the username of the list owner.');
            return;
        }

        // Set loading
        $this.html('<span>' + twitterOptions.loadingText + '</span>');

        // Fetch tweets
        _utility.$.getJSON(twitterOptions.apiPath, {
            username: twitterOptions.username,
            list: twitterOptions.list,
            hashtag: twitterOptions.hashtag,
            count: twitterOptions.count,
            exclude_replies: twitterOptions.hideReplies
        }, function (twt) {
            $this.html('');

            for (var i = 0; i < twitterOptions.count; i++) {
                var tweet = false;
                if (twt[i]) {
                    tweet = twt[i];
                } else if (twt.statuses && twt.statuses[i]) {
                    tweet = twt.statuses[i];
                } else {
                    break;
                }

                var tempData = {
                    user_name: tweet.user.name,
                    date: tweet.date_formatted,
                    tweet: tweet.text_entitled,
                    avatar: '<img src="' + tweet.user.profile_image_url + '" />',
                    url: 'https://twitter.com/' + tweet.user.screen_name + '/status/' + tweet.id_str,
                    retweeted: tweet.retweeted,
                    screen_name: '@' + tweet.user.screen_name
                };

                $this.append(templating(tempData, twitterOptions.template));
            }

            // resize window
            self.refresh();
        }).fail(function (a) {
            $this.html(twitterOptions.failText);
            // eslint-disable-next-line
            console.error(a.responseText);
        });
    });
}

exports.initTwitter = initTwitter;

/***/ }),
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initNavbar = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Navbar

-------------------------------------------------------------------*/
function initNavbar() {
    var self = this;

    self.navbarSmall = false;
    self.navbarMaxTop = 100;

    // navbar size
    self.navbarSize = function (curTop) {
        if (curTop > self.navbarMaxTop && !self.navbarSmall) {
            self.navbarSmall = true;
            (0, _utility.$)('.navbar-youplay').addClass('navbar-small');
        }

        if (curTop <= self.navbarMaxTop && self.navbarSmall) {
            self.navbarSmall = false;
            (0, _utility.$)('.navbar-youplay').removeClass('navbar-small');
        }
    };

    // navbar collapse
    self.navbarCollapse = function () {
        _utility.$doc.on('click', '.navbar-youplay [data-toggle=off-canvas]', function () {
            var $toggleTarget = (0, _utility.$)('.navbar-youplay').find((0, _utility.$)(this).attr('data-target'));
            var collapsed = $toggleTarget.hasClass('collapse');
            $toggleTarget[(collapsed ? 'remove' : 'add') + 'Class']('collapse');
            (0, _utility.$)('.navbar-youplay')[(collapsed ? 'add' : 'remove') + 'Class']('youplay-navbar-collapsed');
        });

        var resizeTimeout = void 0;
        _utility.$wnd.on('resize', function () {
            (0, _utility.$)('.navbar-youplay').addClass('no-transition');

            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function () {
                (0, _utility.$)('.navbar-youplay').removeClass('no-transition');
            }, 50);
        });

        // close navbar if clicked on content
        _utility.$doc.on('click', '.youplay-navbar-collapsed ~ .content-wrap', function () {
            (0, _utility.$)('.navbar-youplay').find('[data-toggle=off-canvas]').click();
        });

        // prevent follow link when there is dropdown
        if (!self.options.fadeBetweenPages || !(0, _utility.$)('.page-preloader').length) {
            _utility.$doc.on('click', '.navbar-youplay .dropdown-toggle', function () {
                if ((0, _utility.$)(this).next('.dropdown-menu').css('visibility') === 'visible' && !(0, _utility.$)(this).parent().hasClass('open')) {
                    window.location.href = this.href;
                }
            });
        }
    };

    // navbar submenu fix
    self.navbarSubmenuFix = function () {
        var $navbar = (0, _utility.$)('.navbar-youplay');

        // don't close submenu if click on child submenu toggle
        $navbar.on('click', '.dropdown-menu .dropdown-toggle', function (e) {
            (0, _utility.$)(this).parent('.dropdown').toggleClass('open');
            e.preventDefault();
            e.stopPropagation();
        });

        // don't close submenu with form if one of the inputs focused
        $navbar.on('focus', 'input, textarea, button', function () {
            (0, _utility.$)(this).parents('.dropdown').addClass('open');
        });
    };

    // navbar collapse
    self.navbarCollapse();

    // navbar set to small
    if (!self.options.navbarSmall) {
        _utility.$wnd.on('scroll', function () {
            self.navbarSize(_utility.$wnd.scrollTop());
        });
        self.navbarSize(_utility.$wnd.scrollTop());
    }

    // navbar submenu fix
    // no close submenu if click on child submenu toggle
    self.navbarSubmenuFix();
}

exports.initNavbar = initNavbar;

/***/ }),
/* 12 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initForms = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Init Forms

-------------------------------------------------------------------*/
function initForms() {
    var self = this;

    // inputs set active
    self.inputsActive = function (item, active) {
        // activate input
        if (active) {
            (0, _utility.$)(item).parent().addClass('input-filled');

            // deactivate input
        } else {
            (0, _utility.$)(item).parent().removeClass('input-filled');
        }
    };

    // active inputs
    _utility.$doc.on('focus', 'input, textarea', function () {
        self.inputsActive(this, true);
    });
    _utility.$doc.on('blur', 'input, textarea', function () {
        self.inputsActive(this);
    });

    // autofocus inputs
    (0, _utility.$)('input, textarea').filter('[autofocus]:eq(0)').focus();

    // ajax form submit
    _utility.$doc.on('submit', '.youplay-form-ajax', function (e) {
        e.preventDefault();
        var $form = (0, _utility.$)(this);
        var $button = $form.find('[type="submit"]');

        // if disabled button - stop this action
        if ($button.is('.disabled') || $button.is('[disabled]')) {
            return;
        }

        // post request
        _utility.$.post((0, _utility.$)(this).attr('action'), (0, _utility.$)(this).serialize(), function (data) {
            var response = JSON.parse(data);

            window.swal({
                type: 'success',
                title: 'Success!',
                text: response && response.response ? response.response : data,
                showConfirmButton: true,
                confirmButtonClass: 'btn-default'
            });
            $form[0].reset();
        }).fail(function (data) {
            window.swal({
                type: 'error',
                title: 'Error!',
                text: data.responseText,
                showConfirmButton: true,
                confirmButtonClass: 'btn-default'
            });
        });
    });
}

exports.initForms = initForms;

/***/ }),
/* 13 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initSearch = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Search

-------------------------------------------------------------------*/
function initSearch() {
    var self = this;

    // toggle search block
    self.searchToggle = function (type) {
        var $searchBlock = (0, _utility.$)('.search-block');
        var opened = $searchBlock.hasClass('active');

        // no open when opened and no close when closed
        if (type === 'close' && !opened || type === 'open' && opened) {
            return;
        }

        // hide
        if (opened) {
            $searchBlock.removeClass('active');

            // show
        } else {
            $searchBlock.addClass('active');
            setTimeout(function () {
                $searchBlock.find('input').focus();
            }, 120);
        }
    };

    // toggle search block
    _utility.$doc.on('click', '.search-toggle', function (e) {
        e.preventDefault();
        e.stopPropagation();
        self.searchToggle();
    });
    // close search on ESC press
    _utility.$doc.on('keyup', function (e) {
        if (e.keyCode === 27) {
            self.searchToggle('close');
        }
    });
}

exports.initSearch = initSearch;

/***/ }),
/* 14 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
/*------------------------------------------------------------------

  Object Fit Images

-------------------------------------------------------------------*/
function initObjectFitImages() {
    if (typeof objectFitImages !== 'undefined') {
        objectFitImages();
    }
}

exports.initObjectFitImages = initObjectFitImages;

/***/ }),
/* 15 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initFlickity = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Flickity

-------------------------------------------------------------------*/
function initFlickity() {
    if (typeof window.Flickity === 'undefined') {
        return;
    }

    /*
     * Hack to add imagesLoaded event
     * https://github.com/metafizzy/flickity/issues/328
     */
    Flickity.prototype.imagesLoaded = function () {
        if (!this.options.imagesLoaded) {
            return;
        }
        var _this = this;
        var timeout = false;

        imagesLoaded(this.slider).on('progress', function (instance, image) {
            var cell = _this.getParentCell(image.img);
            _this.cellSizeChange(cell && cell.element);
            if (!_this.options.freeScroll) {
                _this.positionSliderAtSelected();
            }
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                _this.dispatchEvent('imagesLoadedTimeout', null, [image.img, cell.element]);
            }, 100);
        });
    };

    // prevent click event fire when drag carousel
    function noClickEventOnDrag($carousel) {
        $carousel.on('dragStart.flickity', function () {
            (0, _utility.$)(this).find('.flickity-viewport').addClass('is-dragging');
        });
        $carousel.on('dragEnd.flickity', function () {
            (0, _utility.$)(this).find('.flickity-viewport').removeClass('is-dragging');
        });
    }

    var id = 0;

    (0, _utility.$)('.youplay-carousel').each(function () {
        // wrap all childs
        (0, _utility.$)(this).children().wrap('<div>');

        var className = 'youplay-carousel-' + id++;
        var autoplay = parseInt((0, _utility.$)(this).attr('data-autoplay'), 10) || false;
        var dots = (0, _utility.$)(this).attr('data-dots') === 'true' || false;
        var arrows = (0, _utility.$)(this).attr('data-arrows') !== 'false' || false;
        var loop = (0, _utility.$)(this).attr('data-loop') !== 'false';
        var stagePadding = parseFloat((0, _utility.$)(this).attr('data-stage-padding') || 70);
        var itemPadding = parseFloat((0, _utility.$)(this).attr('data-item-padding') || 0);

        var styles = '';

        if (itemPadding) {
            styles += '.' + className + ' .flickity-slider > * { padding: 0 ' + itemPadding + 'px; }';
        }
        if (stagePadding) {
            styles += '.' + className + ' .flickity-slider { margin-left: ' + stagePadding + 'px; }';

            // Size 4
            styles += '.' + className + '.flickity-enabled .flickity-slider > * { width: calc(25% - ' + stagePadding * 2 / 4 + 'px); }';
            styles += '@media (min-width: 767px) and (max-width: 991px) {';
            styles += '.' + className + '.flickity-enabled .flickity-slider > * { width: calc(33.3334% - ' + stagePadding * 2 / 3 + 'px); }';
            styles += '}';
            styles += '@media (max-width: 767px) {';
            styles += '.' + className + '.flickity-enabled .flickity-slider > * { width: calc(50% - ' + stagePadding * 2 / 2 + 'px); }';
            styles += '}';
            styles += '@media (max-width: 532px) {';
            styles += '.' + className + '.flickity-enabled .flickity-slider > * { width: calc(100% - ' + stagePadding * 2 + 'px); }';
            styles += '}';

            // Size 1
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-1 .flickity-slider > * { width: calc(100% - ' + stagePadding * 2 + 'px); }';

            // Size 2
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-2 .flickity-slider > * { width: calc(50% - ' + stagePadding * 2 / 2 + 'px); }';
            styles += '@media (max-width: 767px) {';
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-2 .flickity-slider > * { width: calc(100% - ' + stagePadding * 2 + 'px); }';
            styles += '}';

            // Size 3
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-3 .flickity-slider > * { width: calc(33.3334% - ' + stagePadding * 2 / 3 + 'px); }';
            styles += '@media (min-width: 767px) and (max-width: 991px) {';
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-3 .flickity-slider > * { width: calc(50% - ' + stagePadding * 2 / 2 + 'px); }';
            styles += '}';
            styles += '@media (max-width: 767px) {';
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-3 .flickity-slider > * { width: calc(100% - ' + stagePadding * 2 + 'px); }';
            styles += '}';

            // Size 5
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-5 .flickity-slider > * { width: calc(20% - ' + stagePadding * 2 / 5 + 'px); }';
            styles += '@media (min-width: 767px) and (max-width: 991px) {';
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-5 .flickity-slider > * { width: calc(25% - ' + stagePadding * 2 / 4 + 'px); }';
            styles += '}';
            styles += '@media (max-width: 767px) {';
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-5 .flickity-slider > * { width: calc(33.3334% - ' + stagePadding * 2 / 3 + 'px); }';
            styles += '}';
            styles += '@media (max-width: 532px) {';
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-5 .flickity-slider > * { width: calc(50% - ' + stagePadding * 2 / 2 + 'px); }';
            styles += '}';

            // Size 6
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-6 .flickity-slider > * { width: calc(16.666% - ' + stagePadding * 2 / 6 + 'px); }';
            styles += '@media (min-width: 767px) and (max-width: 991px) {';
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-6 .flickity-slider > * { width: calc(20% - ' + stagePadding * 2 / 5 + 'px); }';
            styles += '}';
            styles += '@media (max-width: 767px) {';
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-6 .flickity-slider > * { width: calc(25% - ' + stagePadding * 2 / 4 + 'px); }';
            styles += '}';
            styles += '@media (max-width: 532px) {';
            styles += '.' + className + '.flickity-enabled.youplay-carousel-size-6 .flickity-slider > * { width: calc(33.3334% - ' + stagePadding * 2 / 3 + 'px); }';
            styles += '}';
        }

        if (styles) {
            (0, _utility.$)('<style>' + styles + '</style>').appendTo('head');
        }

        (0, _utility.$)(this).addClass(className).flickity({
            cellAlign: 'left',
            wrapAround: loop,
            contain: true,
            prevNextButtons: arrows,
            pageDots: dots,
            autoPlay: autoplay,
            pauseAutoPlayOnHover: true,
            selectedAttraction: 0.1,
            friction: 0.6,
            imagesLoaded: true
        });

        noClickEventOnDrag((0, _utility.$)(this));
    });

    // social horizontal navigation
    (0, _utility.$)('.youplay-user-navigation > ul, .youplay-user-navigation > div > ul').each(function () {
        (0, _utility.$)(this).flickity({
            cellAlign: 'left',
            wrapAround: false,
            contain: true,
            prevNextButtons: false,
            pageDots: false,
            selectedAttraction: 0.1,
            friction: 0.6,
            freeScroll: true
        });

        noClickEventOnDrag((0, _utility.$)(this));
    });
}

exports.initFlickity = initFlickity;

/***/ }),
/* 16 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initOwlCarousel = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Owl Carousel
  DEPRECATED: used only for users who is not added Flickity

-------------------------------------------------------------------*/
function initOwlCarousel() {
    if (typeof _utility.$.fn.owlCarousel === 'undefined') {
        return;
    }

    var id = 0;

    (0, _utility.$)('.owl-carousel').each(function () {
        var className = 'youplay-carousel-' + id++;
        var autoplay = (0, _utility.$)(this).attr('data-autoplay');
        var loop = (0, _utility.$)(this).attr('data-loop') !== 'false';
        var stagePadding = parseFloat((0, _utility.$)(this).attr('data-stage-padding') || 0);
        var itemPadding = parseFloat((0, _utility.$)(this).attr('data-item-padding') || 0);
        (0, _utility.$)(this).owlCarousel({
            loop: loop,
            stagePadding: stagePadding,
            dots: true,
            autoplay: !!autoplay,
            autoplayTimeout: autoplay,
            autoplaySpeed: 600,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 3
                },
                500: {
                    items: 4
                },
                992: {
                    items: 5
                },
                1200: {
                    items: 6
                }
            }
        }).addClass(className);
        if (itemPadding) {
            (0, _utility.$)('<style>.' + className + ' .owl-item { padding-left: ' + itemPadding + 'px; padding-right: ' + itemPadding + 'px; }</style>').appendTo('head');
        }
    });

    // use Flickity instead
    if (typeof window.Flickity === 'undefined') {
        return;
    }

    (0, _utility.$)('.youplay-carousel').each(function () {
        var className = 'youplay-carousel-' + id++;
        var autoplay = (0, _utility.$)(this).attr('data-autoplay');
        var loop = (0, _utility.$)(this).attr('data-loop') !== 'false';
        var stagePadding = parseFloat((0, _utility.$)(this).attr('data-stage-padding') || 70);
        var itemPadding = parseFloat((0, _utility.$)(this).attr('data-item-padding') || 0);
        (0, _utility.$)(this).addClass('owl-carousel').owlCarousel({
            loop: loop,
            stagePadding: stagePadding,
            nav: true,
            dots: false,
            autoplay: !!autoplay,
            autoplayTimeout: autoplay,
            autoplaySpeed: 600,
            autoplayHoverPause: true,
            navText: ['', ''],
            responsive: {
                0: {
                    items: 1
                },
                500: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        }).addClass(className);
        if (itemPadding) {
            (0, _utility.$)('<style>.' + className + ' .owl-item { padding-left: ' + itemPadding + 'px; padding-right: ' + itemPadding + 'px; }</style>').appendTo('head');
        }
    });
    (0, _utility.$)('.youplay-slider').each(function () {
        var className = 'youplay-carousel-' + id++;
        var autoplay = (0, _utility.$)(this).attr('data-autoplay');
        var loop = (0, _utility.$)(this).attr('data-loop') !== 'false';
        (0, _utility.$)(this).addClass('owl-carousel').owlCarousel({
            loop: loop,
            nav: false,
            autoplay: !!autoplay,
            autoplayTimeout: autoplay,
            autoplaySpeed: 600,
            autoplayHoverPause: true,
            items: 1
        }).addClass(className);
    });
}

exports.initOwlCarousel = initOwlCarousel;

/***/ }),
/* 17 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initMagnificPopup = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Magnific Popup

-------------------------------------------------------------------*/
function initMagnificPopup() {
    if (typeof _utility.$.fn.magnificPopup === 'undefined') {
        return;
    }

    var mpOptions = {
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: false,
        mainClass: 'mfp-no-margins mfp-img-mobile mfp-with-fade',
        tLoading: '<div class="preloader"></div>',
        removalDelay: 300,
        image: {
            verticalFit: true,
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        }
    };

    // image popup
    (0, _utility.$)('.image-popup').magnificPopup(_utility.$.extend({
        type: 'image'
    }, mpOptions));

    // video popup
    (0, _utility.$)('.video-popup').magnificPopup(_utility.$.extend({
        type: 'iframe'
    }, mpOptions));

    // gallery popup
    (0, _utility.$)('.gallery-popup').each(function () {
        (0, _utility.$)(this).magnificPopup(_utility.$.extend({
            delegate: '.owl-item:not(.cloned) a, .flickity-slider > div a',
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            callbacks: {
                elementParse: function elementParse(item) {
                    // Function will fire for each target element
                    // "item.el" is a target DOM element (if present)
                    // "item.src" is a source that you may modify
                    var video = /youtube.com|youtu.be|vimeo.com/g.test(item.src);

                    if (video) {
                        item.type = 'iframe';
                    } else {
                        item.type = 'image';
                    }
                }
            }
        }, mpOptions));
    });
}

exports.initMagnificPopup = initMagnificPopup;

/***/ }),
/* 18 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initSliderRevolution = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Slider Revolution

-------------------------------------------------------------------*/
function initSliderRevolution() {
    if (typeof _utility.$.fn.revolution === 'undefined') {
        return;
    }

    var _this = this;
    (0, _utility.$)('.rs-youplay').each(function () {
        var item = (0, _utility.$)(this);

        // options
        var rsOptions = {
            dottedOverlay: 'none',
            navigationType: 'bullet',
            navigationArrows: 'solo',
            navigationStyle: 'preview4',
            spinner: 'spinner4',

            sliderType: 'standard',
            sliderLayout: item.hasClass('rs-fullscreen') ? 'fullscreen' : 'auto',
            delay: 9000,
            navigation: {
                keyboardNavigation: 'off',
                keyboard_direction: 'horizontal',
                mouseScrollNavigation: 'off',
                mouseScrollReverse: 'default',
                onHoverStop: 'off',
                touch: {
                    touchenabled: 'on',
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: 'horizontal',
                    drag_block_vertical: false
                },
                arrows: {
                    enable: true,
                    style: 'hermes',
                    tmp: '<div class="tp-arr-allwrapper"><div class="tp-arr-imgholder"></div></div>'
                },
                bullets: {
                    enable: true,
                    style: 'hebe',
                    tmp: '<span class="tp-bullet-image"></span>',
                    hide_onmobile: true,
                    hide_under: 600,
                    hide_onleave: true,
                    hide_delay: 200,
                    hide_delay_mobile: 1200,
                    direction: 'horizontal',
                    h_align: 'center',
                    v_align: 'bottom',
                    h_offset: 0,
                    v_offset: 30,
                    space: 5
                }
            },
            viewPort: {
                enable: true,
                outof: 'pause',
                visible_area: '80%',
                presize: false
            },
            responsiveLevels: [1240, 1024, 778, 480],
            visibilityLevels: [1240, 1024, 778, 480],
            gridwidth: [1240, 1024, 778, 480],
            gridheight: [600, 600, 500, 400],
            lazyType: 'smart',
            parallax: {
                type: 'mouse',
                origo: 'slidercenter',
                speed: 2000,
                levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 46, 47, 48, 49, 50, 55]
            },
            shadow: 0,
            stopLoop: 'off',
            stopAfterLoops: -1,
            stopAtSlide: -1,
            shuffle: 'off',
            autoHeight: 'off',
            hideThumbsOnMobile: 'off',
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            debugMode: false,
            fallbacks: {
                simplifyAll: 'off',
                nextSlideOnWindowFocus: 'off',
                disableFocusListener: false
            }
        };

        // init
        _utility.$doc.on('ready', function () {
            var slider = item.find('.tp-banner, .rev_slider').show().revolution(rsOptions);

            slider.on('revolution.slide.onloaded', function () {
                _this.refresh();
            });
        });
    });
}

exports.initSliderRevolution = initSliderRevolution;

/***/ }),
/* 19 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initIsotope = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Isotope

-------------------------------------------------------------------*/
function initIsotope() {
    if (typeof _utility.$.fn.isotope === 'undefined') {
        return;
    }

    var self = this;

    (0, _utility.$)('.isotope').each(function () {
        var curIsotopeOptions = (0, _utility.$)(this).find('.isotope-options');

        // init items
        var $grid = (0, _utility.$)(this).find('.isotope-list').isotope({
            itemSelector: '.item'
        });

        // refresh for parallax images and isotope images position
        if ($grid.imagesLoaded) {
            $grid.imagesLoaded().progress(function () {
                $grid.isotope('layout');
            });
        }
        $grid.on('arrangeComplete', function () {
            self.refresh();
        });

        // click on filter button
        curIsotopeOptions.on('click', '> :not(.active)', function (e) {
            (0, _utility.$)(this).addClass('active').siblings().removeClass('active');
            var curFilter = (0, _utility.$)(this).attr('data-filter');

            e.preventDefault();

            $grid.isotope({
                filter: function filter() {
                    if (curFilter === 'all') {
                        return true;
                    }

                    var itemFilters = (0, _utility.$)(this).attr('data-filters');

                    if (itemFilters) {
                        itemFilters = itemFilters.split(',');
                        // eslint-disable-next-line
                        for (var k in itemFilters) {
                            if (itemFilters[k].replace(/\s/g, '') === curFilter) {
                                return true;
                            }
                        }
                    }
                    return false;
                }
            });
        });
    });
}

exports.initIsotope = initIsotope;

/***/ }),
/* 20 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initHexagonRating = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Init Hexagon Rating

-------------------------------------------------------------------*/
function initHexagonRating() {
    if (_utility.$.fn.hexagonProgress === 'undefined') {
        return;
    }

    (0, _utility.$)('.youplay-hexagon-rating:not(.youplay-hexagon-rating-ready)').each(function () {
        var max = parseFloat((0, _utility.$)(this).attr('data-max')) || 10;
        var cur = parseFloat((0, _utility.$)(this).text()) || 0;
        var size = parseFloat((0, _utility.$)(this).attr('data-size')) || 120;
        var backColor = (0, _utility.$)(this).attr('data-back-color') || 'rgba(255,255,255,0.1)';
        var frontColor = (0, _utility.$)(this).attr('data-front-color') || '#fff';

        (0, _utility.$)(this).css({
            width: size,
            height: size
        }).hexagonProgress({
            value: cur / max,
            size: size,
            animation: false,
            // 60deg + fix (strange error in hexagon plugin)
            startAngle: (60 + 0.00000001) * Math.PI / 180,
            lineWidth: 2,
            clip: true,
            lineBackFill: { color: backColor },
            lineFrontFill: { color: frontColor }
        });

        (0, _utility.$)(this).addClass('youplay-hexagon-rating-ready');
    });
}

exports.initHexagonRating = initHexagonRating;

/***/ }),
/* 21 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.initJarallax = undefined;

var _utility = __webpack_require__(0);

/*------------------------------------------------------------------

  Jarallax

-------------------------------------------------------------------*/
function initJarallax() {
    if (!this.options.parallax || _utility.isMobile) {
        return;
    }

    // in older versions used skrollr for parallax
    if (typeof window.skrollr !== 'undefined' && typeof this.skrollr === 'undefined') {
        this.skrollr = window.skrollr.init({
            smoothScrolling: false,
            forceHeight: false
        });
    }

    // in newest versions used Jarallax plugin
    if (typeof _utility.$.fn.jarallax === 'undefined') {
        return;
    }

    // banners
    (0, _utility.$)('.youplay-banner-parallax .image').each(function () {
        var speed = parseFloat((0, _utility.$)(this).attr('data-speed'));
        var $banner = (0, _utility.$)(this).closest('.youplay-banner-parallax');
        var $info = $banner.children('.info');
        var isTopBanner = $banner.hasClass('banner-top');
        (0, _utility.$)(this).jarallax({
            automaticResize: true,
            speed: Number.isNaN(speed) ? 0.4 : speed,
            onScroll: function onScroll(calc) {
                if (!isTopBanner) {
                    return;
                }
                var pos = calc.beforeTop !== 0 ? -1 : 1;
                var scrollInfo = pos * Math.min(150, 150 * (1 - calc.visiblePercent));

                $info.css({
                    opacity: calc.visiblePercent < 0 ? 1 : calc.visiblePercent,
                    transform: 'translate3d(0, ' + scrollInfo + 'px, 0)'
                });
            }
        });
    });

    // footer parallax
    (0, _utility.$)('.youplay-footer-parallax').each(function () {
        var $this = (0, _utility.$)(this);
        var $img = $this.children('.image');
        var $wrapper = $this.children('.wrapper');
        var $social = $this.find('.social > .container');
        var opts = {
            automaticResize: true,
            onScroll: function onScroll(calc) {
                var scroll = Math.max(-50, -50 * (1 - calc.visiblePercent));
                $wrapper.css({
                    transform: 'translate3d(0, ' + scroll.toFixed(1) + '%, 0)'
                });
                $social.css({
                    transform: 'translate3d(0, 0, 0)',
                    opacity: calc.visiblePercent < 0 ? 1 : calc.visiblePercent
                });
            }
        };

        if (!$img.length) {
            opts.type = 'custom';
            opts.imgSrc = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
            opts.imgWidth = 1;
            opts.imgHeight = 1;

            $this.jarallax(opts);
        } else {
            $img.jarallax(opts);
        }
    });
}

exports.initJarallax = initJarallax;

/***/ })
/******/ ]);