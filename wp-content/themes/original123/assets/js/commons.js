var menu = !1;

function convertToSlug(e) {
    return e.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-")
}

function mobileNavigation(e) {
    if (!menu) {
        menu = !0;
        var t = $(".topbar").length ? $(".topbar").outerHeight() + $("header").outerHeight() : $("header").outerHeight();
        $(e).toggleClass("is-active"), $("html, body").stop(!0, !1).animate({
            scrollTop: $(".topbar").length ? $(".topbar").offset().top : $("header").offset().top
        }, 50), $("html, body").toggleClass("toggle"), $(".menu").toggleClass("toggle"), setTimeout(function() {
            $(".menu").css("padding-top", t).children().toggleClass("toggle")
        }, 500)
    }
}

function closeMenu() {
    menu && (menu = !1, $(".menu").children().removeClass("toggle"), $(".is-active").removeClass("is-active"), setTimeout(function() {
        $("html, body, .menu").removeClass("toggle")
    }, 250))
}

function backToTop(e) {
    $("html, body").stop(!0, !1).animate({
        scrollTop: $(".topbar").length ? $(".topbar").offset().top : $("header").offset().top
    }, 1e3)
}
$(window).on("resize", function(e) {
    closeMenu()
}), $(document).mouseup(function(e) {
    var t = $(".menu").children();
    t.is(e.target) || 0 !== t.has(e.target).length || closeMenu()
}), $(document).ready(function() {
    $(".slider").bxSlider({
    	adaptiveHeight: true,
        nextText: 'Próximo <i class="fas fa-caret-right"></i>',
        prevText: '<i class="fas fa-caret-left"></i> Anterior'
    });
    var e = !1;
    e || setTimeout(function() {
        (e = !0) && $(".bx-controls-direction").each(function() {
            $(this).children().unwrap()
        })
    }, 600), $(".telefone").mask("(00) 0 0000-0000"), $(".thumbnail").each(function() {
        $(this).append('<a href="' + $(this).closest(".box").find("a").attr("href") + '" class="zoomin" style="background-image:url(' + $(this).css("background-image").replace('url("', "").replace('")', "") + ')" />')
    }), $(".menu a").each(function() {
        $(this).click(function(e) {
            closeMenu()
        })
    })
});
! function(R) {
    var Z = {
        mode: "horizontal",
        slideSelector: "",
        infiniteLoop: !0,
        hideControlOnEnd: !1,
        speed: 500,
        easing: null,
        slideMargin: 0,
        startSlide: 0,
        randomStart: !1,
        captions: !1,
        ticker: !1,
        tickerHover: !1,
        adaptiveHeight: !1,
        adaptiveHeightSpeed: 500,
        video: !1,
        useCSS: !0,
        preloadImages: "visible",
        responsive: !0,
        slideZIndex: 50,
        wrapperClass: "bx-wrapper",
        touchEnabled: !0,
        swipeThreshold: 50,
        oneToOneTouch: !0,
        preventDefaultSwipeX: !0,
        preventDefaultSwipeY: !1,
        ariaLive: !0,
        ariaHidden: !0,
        keyboardEnabled: !1,
        pager: !0,
        pagerType: "full",
        pagerShortSeparator: " / ",
        pagerSelector: null,
        buildPager: null,
        pagerCustom: null,
        controls: !0,
        nextText: "Next",
        prevText: "Prev",
        nextSelector: null,
        prevSelector: null,
        autoControls: !1,
        startText: "Start",
        stopText: "Stop",
        autoControlsCombine: !1,
        autoControlsSelector: null,
        auto: !1,
        pause: 4e3,
        autoStart: !0,
        autoDirection: "next",
        stopAutoOnClick: !1,
        autoHover: !1,
        autoDelay: 0,
        autoSlideForOnePage: !1,
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 0,
        slideWidth: 0,
        shrinkItems: !1,
        onSliderLoad: function() {
            return !0
        },
        onSlideBefore: function() {
            return !0
        },
        onSlideAfter: function() {
            return !0
        },
        onSlideNext: function() {
            return !0
        },
        onSlidePrev: function() {
            return !0
        },
        onSliderResize: function() {
            return !0
        }
    };
    R.fn.bxSlider = function(e) {
        if (0 === this.length) return this;
        if (1 < this.length) return this.each(function() {
            R(this).bxSlider(e)
        }), this;
        var g = {},
            p = this,
            n = R(window).width(),
            s = R(window).height();
        if (!R(p).data("bxSlider")) {
            var o = function() {
                    R(p).data("bxSlider") || (g.settings = R.extend({}, Z, e), g.settings.slideWidth = parseInt(g.settings.slideWidth), g.children = p.children(g.settings.slideSelector), g.children.length < g.settings.minSlides && (g.settings.minSlides = g.children.length), g.children.length < g.settings.maxSlides && (g.settings.maxSlides = g.children.length), g.settings.randomStart && (g.settings.startSlide = Math.floor(Math.random() * g.children.length)), g.active = {
                        index: g.settings.startSlide
                    }, g.carousel = 1 < g.settings.minSlides || 1 < g.settings.maxSlides, g.carousel && (g.settings.preloadImages = "all"), g.minThreshold = g.settings.minSlides * g.settings.slideWidth + (g.settings.minSlides - 1) * g.settings.slideMargin, g.maxThreshold = g.settings.maxSlides * g.settings.slideWidth + (g.settings.maxSlides - 1) * g.settings.slideMargin, g.working = !1, g.controls = {}, g.interval = null, g.animProp = "vertical" === g.settings.mode ? "top" : "left", g.usingCSS = g.settings.useCSS && "fade" !== g.settings.mode && function() {
                        for (var t = document.createElement("div"), e = ["WebkitPerspective", "MozPerspective", "OPerspective", "msPerspective"], i = 0; i < e.length; i++)
                            if (void 0 !== t.style[e[i]]) return g.cssPrefix = e[i].replace("Perspective", "").toLowerCase(), g.animProp = "-" + g.cssPrefix + "-transform", !0;
                        return !1
                    }(), "vertical" === g.settings.mode && (g.settings.maxSlides = g.settings.minSlides), p.data("origStyle", p.attr("style")), p.children(g.settings.slideSelector).each(function() {
                        R(this).data("origStyle", R(this).attr("style"))
                    }), t())
                },
                t = function() {
                    var t = g.children.eq(g.settings.startSlide);
                    p.wrap('<div class="' + g.settings.wrapperClass + '"><div class="bx-viewport"></div></div>'), g.viewport = p.parent(), g.settings.ariaLive && !g.settings.ticker && g.viewport.attr("aria-live", "polite"), g.loader = R('<div class="bx-loading" />'), g.viewport.prepend(g.loader), p.css({
                        width: "horizontal" === g.settings.mode ? 1e3 * g.children.length + 215 + "%" : "auto",
                        position: "relative"
                    }), g.usingCSS && g.settings.easing ? p.css("-" + g.cssPrefix + "-transition-timing-function", g.settings.easing) : g.settings.easing || (g.settings.easing = "swing"), g.viewport.css({
                        width: "100%",
                        overflow: "hidden",
                        position: "relative"
                    }), g.viewport.parent().css({
                        maxWidth: l()
                    }), g.children.css({
                        float: "horizontal" === g.settings.mode ? "left" : "none",
                        listStyle: "none",
                        position: "relative"
                    }), g.children.css("width", d()), "horizontal" === g.settings.mode && 0 < g.settings.slideMargin && g.children.css("marginRight", g.settings.slideMargin), "vertical" === g.settings.mode && 0 < g.settings.slideMargin && g.children.css("marginBottom", g.settings.slideMargin), "fade" === g.settings.mode && (g.children.css({
                        position: "absolute",
                        zIndex: 0,
                        display: "none"
                    }), g.children.eq(g.settings.startSlide).css({
                        zIndex: g.settings.slideZIndex,
                        display: "block"
                    })), g.controls.el = R('<div class="bx-controls" />'), g.settings.captions && C(), g.active.last = g.settings.startSlide === u() - 1, g.settings.video && p.fitVids(), ("all" === g.settings.preloadImages || g.settings.ticker) && (t = g.children), g.settings.ticker ? g.settings.pager = !1 : (g.settings.controls && b(), g.settings.auto && g.settings.autoControls && w(), g.settings.pager && S(), (g.settings.controls || g.settings.autoControls || g.settings.pager) && g.viewport.after(g.controls.el)), r(t, a)
                },
                r = function(t, e) {
                    var i = t.find('img:not([src=""]), iframe').length,
                        n = 0;
                    return 0 === i ? void e() : void t.find('img:not([src=""]), iframe').each(function() {
                        R(this).one("load error", function() {
                            ++n === i && e()
                        }).each(function() {
                            this.complete && R(this).trigger("load")
                        })
                    })
                },
                a = function() {
                    if (g.settings.infiniteLoop && "fade" !== g.settings.mode && !g.settings.ticker) {
                        var t = "vertical" === g.settings.mode ? g.settings.minSlides : g.settings.maxSlides,
                            e = g.children.slice(0, t).clone(!0).addClass("bx-clone"),
                            i = g.children.slice(-t).clone(!0).addClass("bx-clone");
                        g.settings.ariaHidden && (e.attr("aria-hidden", !0), i.attr("aria-hidden", !0)), p.append(e).prepend(i)
                    }
                    g.loader.remove(), f(), "vertical" === g.settings.mode && (g.settings.adaptiveHeight = !0), g.viewport.height(h()), p.redrawSlider(), g.settings.onSliderLoad.call(p, g.active.index), g.initialized = !0, g.settings.responsive && R(window).bind("resize", Y), g.settings.auto && g.settings.autoStart && (1 < u() || g.settings.autoSlideForOnePage) && A(), g.settings.ticker && D(), g.settings.pager && y(g.settings.startSlide), g.settings.controls && q(), g.settings.touchEnabled && !g.settings.ticker && L(), g.settings.keyboardEnabled && !g.settings.ticker && R(document).keydown(W)
                },
                h = function() {
                    var e = 0,
                        t = R();
                    if ("vertical" === g.settings.mode || g.settings.adaptiveHeight)
                        if (g.carousel) {
                            var n = 1 === g.settings.moveSlides ? g.active.index : g.active.index * v();
                            for (t = g.children.eq(n), i = 1; i <= g.settings.maxSlides - 1; i++) t = n + i >= g.children.length ? t.add(g.children.eq(i - 1)) : t.add(g.children.eq(n + i))
                        } else t = g.children.eq(g.active.index);
                    else t = g.children;
                    return "vertical" === g.settings.mode ? (t.each(function(t) {
                        e += R(this).outerHeight()
                    }), 0 < g.settings.slideMargin && (e += g.settings.slideMargin * (g.settings.minSlides - 1))) : e = Math.max.apply(Math, t.map(function() {
                        return R(this).outerHeight(!1)
                    }).get()), "border-box" === g.viewport.css("box-sizing") ? e += parseFloat(g.viewport.css("padding-top")) + parseFloat(g.viewport.css("padding-bottom")) + parseFloat(g.viewport.css("border-top-width")) + parseFloat(g.viewport.css("border-bottom-width")) : "padding-box" === g.viewport.css("box-sizing") && (e += parseFloat(g.viewport.css("padding-top")) + parseFloat(g.viewport.css("padding-bottom"))), e
                },
                l = function() {
                    var t = "100%";
                    return 0 < g.settings.slideWidth && (t = "horizontal" === g.settings.mode ? g.settings.maxSlides * g.settings.slideWidth + (g.settings.maxSlides - 1) * g.settings.slideMargin : g.settings.slideWidth), t
                },
                d = function() {
                    var t = g.settings.slideWidth,
                        e = g.viewport.width();
                    if (0 === g.settings.slideWidth || g.settings.slideWidth > e && !g.carousel || "vertical" === g.settings.mode) t = e;
                    else if (1 < g.settings.maxSlides && "horizontal" === g.settings.mode) {
                        if (e > g.maxThreshold) return t;
                        e < g.minThreshold ? t = (e - g.settings.slideMargin * (g.settings.minSlides - 1)) / g.settings.minSlides : g.settings.shrinkItems && (t = Math.floor((e + g.settings.slideMargin) / Math.ceil((e + g.settings.slideMargin) / (t + g.settings.slideMargin)) - g.settings.slideMargin))
                    }
                    return t
                },
                c = function() {
                    var t = 1,
                        e = null;
                    return "horizontal" === g.settings.mode && 0 < g.settings.slideWidth ? t = g.viewport.width() < g.minThreshold ? g.settings.minSlides : g.viewport.width() > g.maxThreshold ? g.settings.maxSlides : (e = g.children.first().width() + g.settings.slideMargin, Math.floor((g.viewport.width() + g.settings.slideMargin) / e)) : "vertical" === g.settings.mode && (t = g.settings.minSlides), t
                },
                u = function() {
                    var t = 0,
                        e = 0,
                        i = 0;
                    if (0 < g.settings.moveSlides)
                        if (g.settings.infiniteLoop) t = Math.ceil(g.children.length / v());
                        else
                            for (; e < g.children.length;) ++t, e = i + c(), i += g.settings.moveSlides <= c() ? g.settings.moveSlides : c();
                    else t = Math.ceil(g.children.length / c());
                    return t
                },
                v = function() {
                    return 0 < g.settings.moveSlides && g.settings.moveSlides <= c() ? g.settings.moveSlides : c()
                },
                f = function() {
                    var t, e, i;
                    g.children.length > g.settings.maxSlides && g.active.last && !g.settings.infiniteLoop ? "horizontal" === g.settings.mode ? (t = (e = g.children.last()).position(), x(-(t.left - (g.viewport.width() - e.outerWidth())), "reset", 0)) : "vertical" === g.settings.mode && (i = g.children.length - g.settings.minSlides, t = g.children.eq(i).position(), x(-t.top, "reset", 0)) : (t = g.children.eq(g.active.index * v()).position(), g.active.index === u() - 1 && (g.active.last = !0), void 0 !== t && ("horizontal" === g.settings.mode ? x(-t.left, "reset", 0) : "vertical" === g.settings.mode && x(-t.top, "reset", 0)))
                },
                x = function(t, e, i, n) {
                    var s, o;
                    g.usingCSS ? (o = "vertical" === g.settings.mode ? "translate3d(0, " + t + "px, 0)" : "translate3d(" + t + "px, 0, 0)", p.css("-" + g.cssPrefix + "-transition-duration", i / 1e3 + "s"), "slide" === e ? (p.css(g.animProp, o), 0 !== i ? p.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function(t) {
                        R(t.target).is(p) && (p.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), z())
                    }) : z()) : "reset" === e ? p.css(g.animProp, o) : "ticker" === e && (p.css("-" + g.cssPrefix + "-transition-timing-function", "linear"), p.css(g.animProp, o), 0 !== i ? p.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function(t) {
                        R(t.target).is(p) && (p.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), x(n.resetValue, "reset", 0), H())
                    }) : (x(n.resetValue, "reset", 0), H()))) : ((s = {})[g.animProp] = t, "slide" === e ? p.animate(s, i, g.settings.easing, function() {
                        z()
                    }) : "reset" === e ? p.css(g.animProp, t) : "ticker" === e && p.animate(s, i, "linear", function() {
                        x(n.resetValue, "reset", 0), H()
                    }))
                },
                m = function() {
                    for (var t = "", e = "", i = u(), n = 0; n < i; n++) e = "", g.settings.buildPager && R.isFunction(g.settings.buildPager) || g.settings.pagerCustom ? (e = g.settings.buildPager(n), g.pagerEl.addClass("bx-custom-pager")) : (e = n + 1, g.pagerEl.addClass("bx-default-pager")), t += '<div class="bx-pager-item"><a href="" data-slide-index="' + n + '" class="bx-pager-link">' + e + "</a></div>";
                    g.pagerEl.html(t)
                },
                S = function() {
                    g.settings.pagerCustom ? g.pagerEl = R(g.settings.pagerCustom) : (g.pagerEl = R('<div class="bx-pager" />'), g.settings.pagerSelector ? R(g.settings.pagerSelector).html(g.pagerEl) : g.controls.el.addClass("bx-has-pager").append(g.pagerEl), m()), g.pagerEl.on("click touchend", "a", M)
                },
                b = function() {
                    g.controls.next = R('<a class="bx-next" href="">' + g.settings.nextText + "</a>"), g.controls.prev = R('<a class="bx-prev" href="">' + g.settings.prevText + "</a>"), g.controls.next.bind("click touchend", T), g.controls.prev.bind("click touchend", P), g.settings.nextSelector && R(g.settings.nextSelector).append(g.controls.next), g.settings.prevSelector && R(g.settings.prevSelector).append(g.controls.prev), g.settings.nextSelector || g.settings.prevSelector || (g.controls.directionEl = R('<div class="bx-controls-direction" />'), g.controls.directionEl.append(g.controls.prev).append(g.controls.next), g.controls.el.addClass("bx-has-controls-direction").append(g.controls.directionEl))
                },
                w = function() {
                    g.controls.start = R('<div class="bx-controls-auto-item"><a class="bx-start" href="">' + g.settings.startText + "</a></div>"), g.controls.stop = R('<div class="bx-controls-auto-item"><a class="bx-stop" href="">' + g.settings.stopText + "</a></div>"), g.controls.autoEl = R('<div class="bx-controls-auto" />'), g.controls.autoEl.on("click", ".bx-start", E), g.controls.autoEl.on("click", ".bx-stop", k), g.settings.autoControlsCombine ? g.controls.autoEl.append(g.controls.start) : g.controls.autoEl.append(g.controls.start).append(g.controls.stop), g.settings.autoControlsSelector ? R(g.settings.autoControlsSelector).html(g.controls.autoEl) : g.controls.el.addClass("bx-has-controls-auto").append(g.controls.autoEl), I(g.settings.autoStart ? "stop" : "start")
                },
                C = function() {
                    g.children.each(function(t) {
                        var e = R(this).find("img:first").attr("title");
                        void 0 !== e && ("" + e).length && R(this).append('<div class="bx-caption"><span>' + e + "</span></div>")
                    })
                },
                T = function(t) {
                    t.preventDefault(), g.controls.el.hasClass("disabled") || (g.settings.auto && g.settings.stopAutoOnClick && p.stopAuto(), p.goToNextSlide())
                },
                P = function(t) {
                    t.preventDefault(), g.controls.el.hasClass("disabled") || (g.settings.auto && g.settings.stopAutoOnClick && p.stopAuto(), p.goToPrevSlide())
                },
                E = function(t) {
                    p.startAuto(), t.preventDefault()
                },
                k = function(t) {
                    p.stopAuto(), t.preventDefault()
                },
                M = function(t) {
                    var e, i;
                    t.preventDefault(), g.controls.el.hasClass("disabled") || (g.settings.auto && g.settings.stopAutoOnClick && p.stopAuto(), void 0 !== (e = R(t.currentTarget)).attr("data-slide-index") && ((i = parseInt(e.attr("data-slide-index"))) !== g.active.index && p.goToSlide(i)))
                },
                y = function(i) {
                    var t = g.children.length;
                    return "short" === g.settings.pagerType ? (1 < g.settings.maxSlides && (t = Math.ceil(g.children.length / g.settings.maxSlides)), void g.pagerEl.html(i + 1 + g.settings.pagerShortSeparator + t)) : (g.pagerEl.find("a").removeClass("active"), void g.pagerEl.each(function(t, e) {
                        R(e).find("a").eq(i).addClass("active")
                    }))
                },
                z = function() {
                    if (g.settings.infiniteLoop) {
                        var t = "";
                        0 === g.active.index ? t = g.children.eq(0).position() : g.active.index === u() - 1 && g.carousel ? t = g.children.eq((u() - 1) * v()).position() : g.active.index === g.children.length - 1 && (t = g.children.eq(g.children.length - 1).position()), t && ("horizontal" === g.settings.mode ? x(-t.left, "reset", 0) : "vertical" === g.settings.mode && x(-t.top, "reset", 0))
                    }
                    g.working = !1, g.settings.onSlideAfter.call(p, g.children.eq(g.active.index), g.oldIndex, g.active.index)
                },
                I = function(t) {
                    g.settings.autoControlsCombine ? g.controls.autoEl.html(g.controls[t]) : (g.controls.autoEl.find("a").removeClass("active"), g.controls.autoEl.find("a:not(.bx-" + t + ")").addClass("active"))
                },
                q = function() {
                    1 === u() ? (g.controls.prev.addClass("disabled"), g.controls.next.addClass("disabled")) : !g.settings.infiniteLoop && g.settings.hideControlOnEnd && (0 === g.active.index ? (g.controls.prev.addClass("disabled"), g.controls.next.removeClass("disabled")) : g.active.index === u() - 1 ? (g.controls.next.addClass("disabled"), g.controls.prev.removeClass("disabled")) : (g.controls.prev.removeClass("disabled"), g.controls.next.removeClass("disabled")))
                },
                A = function() {
                    0 < g.settings.autoDelay ? setTimeout(p.startAuto, g.settings.autoDelay) : (p.startAuto(), R(window).focus(function() {
                        p.startAuto()
                    }).blur(function() {
                        p.stopAuto()
                    })), g.settings.autoHover && p.hover(function() {
                        g.interval && (p.stopAuto(!0), g.autoPaused = !0)
                    }, function() {
                        g.autoPaused && (p.startAuto(!0), g.autoPaused = null)
                    })
                },
                D = function() {
                    var t, e, i, n, s, o, r, a, l = 0;
                    "next" === g.settings.autoDirection ? p.append(g.children.clone().addClass("bx-clone")) : (p.prepend(g.children.clone().addClass("bx-clone")), t = g.children.first().position(), l = "horizontal" === g.settings.mode ? -t.left : -t.top), x(l, "reset", 0), g.settings.pager = !1, g.settings.controls = !1, g.settings.autoControls = !1, g.settings.tickerHover && (g.usingCSS ? (n = "horizontal" === g.settings.mode ? 4 : 5, g.viewport.hover(function() {
                        e = p.css("-" + g.cssPrefix + "-transform"), i = parseFloat(e.split(",")[n]), x(i, "reset", 0)
                    }, function() {
                        a = 0, g.children.each(function(t) {
                            a += "horizontal" === g.settings.mode ? R(this).outerWidth(!0) : R(this).outerHeight(!0)
                        }), s = g.settings.speed / a, o = "horizontal" === g.settings.mode ? "left" : "top", r = s * (a - Math.abs(parseInt(i))), H(r)
                    })) : g.viewport.hover(function() {
                        p.stop()
                    }, function() {
                        a = 0, g.children.each(function(t) {
                            a += "horizontal" === g.settings.mode ? R(this).outerWidth(!0) : R(this).outerHeight(!0)
                        }), s = g.settings.speed / a, o = "horizontal" === g.settings.mode ? "left" : "top", r = s * (a - Math.abs(parseInt(p.css(o)))), H(r)
                    })), H()
                },
                H = function(t) {
                    var e, i, n = t || g.settings.speed,
                        s = {
                            left: 0,
                            top: 0
                        },
                        o = {
                            left: 0,
                            top: 0
                        };
                    "next" === g.settings.autoDirection ? s = p.find(".bx-clone").first().position() : o = g.children.first().position(), e = "horizontal" === g.settings.mode ? -s.left : -s.top, i = "horizontal" === g.settings.mode ? -o.left : -o.top, x(e, "ticker", n, {
                        resetValue: i
                    })
                },
                W = function(t) {
                    var e, i, n, s, o = document.activeElement.tagName.toLowerCase();
                    if (null == new RegExp(o, ["i"]).exec("input|textarea") && (e = p, i = R(window), n = {
                            top: i.scrollTop(),
                            left: i.scrollLeft()
                        }, s = e.offset(), n.right = n.left + i.width(), n.bottom = n.top + i.height(), s.right = s.left + e.outerWidth(), s.bottom = s.top + e.outerHeight(), !(n.right < s.left || n.left > s.right || n.bottom < s.top || n.top > s.bottom))) {
                        if (39 === t.keyCode) return T(t), !1;
                        if (37 === t.keyCode) return P(t), !1
                    }
                },
                L = function() {
                    g.touch = {
                        start: {
                            x: 0,
                            y: 0
                        },
                        end: {
                            x: 0,
                            y: 0
                        }
                    }, g.viewport.bind("touchstart MSPointerDown pointerdown", O), g.viewport.on("click", ".bxslider a", function(t) {
                        g.viewport.hasClass("click-disabled") && (t.preventDefault(), g.viewport.removeClass("click-disabled"))
                    })
                },
                O = function(t) {
                    if (g.controls.el.addClass("disabled"), g.working) t.preventDefault(), g.controls.el.removeClass("disabled");
                    else {
                        g.touch.originalPos = p.position();
                        var e = t.originalEvent,
                            i = void 0 !== e.changedTouches ? e.changedTouches : [e];
                        g.touch.start.x = i[0].pageX, g.touch.start.y = i[0].pageY, g.viewport.get(0).setPointerCapture && (g.pointerId = e.pointerId, g.viewport.get(0).setPointerCapture(g.pointerId)), g.viewport.bind("touchmove MSPointerMove pointermove", N), g.viewport.bind("touchend MSPointerUp pointerup", X), g.viewport.bind("MSPointerCancel pointercancel", F)
                    }
                },
                F = function(t) {
                    x(g.touch.originalPos.left, "reset", 0), g.controls.el.removeClass("disabled"), g.viewport.unbind("MSPointerCancel pointercancel", F), g.viewport.unbind("touchmove MSPointerMove pointermove", N), g.viewport.unbind("touchend MSPointerUp pointerup", X), g.viewport.get(0).releasePointerCapture && g.viewport.get(0).releasePointerCapture(g.pointerId)
                },
                N = function(t) {
                    var e = t.originalEvent,
                        i = void 0 !== e.changedTouches ? e.changedTouches : [e],
                        n = Math.abs(i[0].pageX - g.touch.start.x),
                        s = Math.abs(i[0].pageY - g.touch.start.y),
                        o = 0,
                        r = 0;
                    s < 3 * n && g.settings.preventDefaultSwipeX ? t.preventDefault() : n < 3 * s && g.settings.preventDefaultSwipeY && t.preventDefault(), "fade" !== g.settings.mode && g.settings.oneToOneTouch && (o = "horizontal" === g.settings.mode ? (r = i[0].pageX - g.touch.start.x, g.touch.originalPos.left + r) : (r = i[0].pageY - g.touch.start.y, g.touch.originalPos.top + r), x(o, "reset", 0))
                },
                X = function(t) {
                    g.viewport.unbind("touchmove MSPointerMove pointermove", N), g.controls.el.removeClass("disabled");
                    var e = t.originalEvent,
                        i = void 0 !== e.changedTouches ? e.changedTouches : [e],
                        n = 0,
                        s = 0;
                    g.touch.end.x = i[0].pageX, g.touch.end.y = i[0].pageY, "fade" === g.settings.mode ? (s = Math.abs(g.touch.start.x - g.touch.end.x)) >= g.settings.swipeThreshold && (g.touch.start.x > g.touch.end.x ? p.goToNextSlide() : p.goToPrevSlide(), p.stopAuto()) : (n = "horizontal" === g.settings.mode ? (s = g.touch.end.x - g.touch.start.x, g.touch.originalPos.left) : (s = g.touch.end.y - g.touch.start.y, g.touch.originalPos.top), !g.settings.infiniteLoop && (0 === g.active.index && 0 < s || g.active.last && s < 0) ? x(n, "reset", 200) : Math.abs(s) >= g.settings.swipeThreshold ? (s < 0 ? p.goToNextSlide() : p.goToPrevSlide(), p.stopAuto()) : x(n, "reset", 200)), g.viewport.unbind("touchend MSPointerUp pointerup", X), g.viewport.get(0).releasePointerCapture && g.viewport.get(0).releasePointerCapture(g.pointerId)
                },
                Y = function(t) {
                    if (g.initialized)
                        if (g.working) window.setTimeout(Y, 10);
                        else {
                            var e = R(window).width(),
                                i = R(window).height();
                            n === e && s === i || (n = e, s = i, p.redrawSlider(), g.settings.onSliderResize.call(p, g.active.index))
                        }
                },
                V = function(t) {
                    var e = c();
                    g.settings.ariaHidden && !g.settings.ticker && (g.children.attr("aria-hidden", "true"), g.children.slice(t, t + e).attr("aria-hidden", "false"))
                };
            return p.goToSlide = function(t, e) {
                var i, n, s, o, r, a = !0,
                    l = 0,
                    d = {
                        left: 0,
                        top: 0
                    },
                    c = null;
                if (g.oldIndex = g.active.index, g.active.index = (r = t) < 0 ? g.settings.infiniteLoop ? u() - 1 : g.active.index : r >= u() ? g.settings.infiniteLoop ? 0 : g.active.index : r, !g.working && g.active.index !== g.oldIndex) {
                    if (g.working = !0, void 0 !== (a = g.settings.onSlideBefore.call(p, g.children.eq(g.active.index), g.oldIndex, g.active.index)) && !a) return g.active.index = g.oldIndex, void(g.working = !1);
                    "next" === e ? g.settings.onSlideNext.call(p, g.children.eq(g.active.index), g.oldIndex, g.active.index) || (a = !1) : "prev" === e && (g.settings.onSlidePrev.call(p, g.children.eq(g.active.index), g.oldIndex, g.active.index) || (a = !1)), g.active.last = g.active.index >= u() - 1, (g.settings.pager || g.settings.pagerCustom) && y(g.active.index), g.settings.controls && q(), "fade" === g.settings.mode ? (g.settings.adaptiveHeight && g.viewport.height() !== h() && g.viewport.animate({
                        height: h()
                    }, g.settings.adaptiveHeightSpeed), g.children.filter(":visible").fadeOut(g.settings.speed).css({
                        zIndex: 0
                    }), g.children.eq(g.active.index).css("zIndex", g.settings.slideZIndex + 1).fadeIn(g.settings.speed, function() {
                        R(this).css("zIndex", g.settings.slideZIndex), z()
                    })) : (g.settings.adaptiveHeight && g.viewport.height() !== h() && g.viewport.animate({
                        height: h()
                    }, g.settings.adaptiveHeightSpeed), !g.settings.infiniteLoop && g.carousel && g.active.last ? "horizontal" === g.settings.mode ? (d = (c = g.children.eq(g.children.length - 1)).position(), l = g.viewport.width() - c.outerWidth()) : (i = g.children.length - g.settings.minSlides, d = g.children.eq(i).position()) : g.carousel && g.active.last && "prev" === e ? (n = 1 === g.settings.moveSlides ? g.settings.maxSlides - v() : (u() - 1) * v() - (g.children.length - g.settings.maxSlides), d = (c = p.children(".bx-clone").eq(n)).position()) : "next" === e && 0 === g.active.index ? (d = p.find("> .bx-clone").eq(g.settings.maxSlides).position(), g.active.last = !1) : 0 <= t && (o = t * parseInt(v()), d = g.children.eq(o).position()), void 0 !== d ? (s = "horizontal" === g.settings.mode ? -(d.left - l) : -d.top, x(s, "slide", g.settings.speed)) : g.working = !1), g.settings.ariaHidden && V(g.active.index * v())
                }
            }, p.goToNextSlide = function() {
                if (g.settings.infiniteLoop || !g.active.last) {
                    var t = parseInt(g.active.index) + 1;
                    p.goToSlide(t, "next")
                }
            }, p.goToPrevSlide = function() {
                if (g.settings.infiniteLoop || 0 !== g.active.index) {
                    var t = parseInt(g.active.index) - 1;
                    p.goToSlide(t, "prev")
                }
            }, p.startAuto = function(t) {
                g.interval || (g.interval = setInterval(function() {
                    "next" === g.settings.autoDirection ? p.goToNextSlide() : p.goToPrevSlide()
                }, g.settings.pause), g.settings.autoControls && !0 !== t && I("stop"))
            }, p.stopAuto = function(t) {
                g.interval && (clearInterval(g.interval), g.interval = null, g.settings.autoControls && !0 !== t && I("start"))
            }, p.getCurrentSlide = function() {
                return g.active.index
            }, p.getCurrentSlideElement = function() {
                return g.children.eq(g.active.index)
            }, p.getSlideElement = function(t) {
                return g.children.eq(t)
            }, p.getSlideCount = function() {
                return g.children.length
            }, p.isWorking = function() {
                return g.working
            }, p.redrawSlider = function() {
                g.children.add(p.find(".bx-clone")).outerWidth(d()), g.viewport.css("height", h()), g.settings.ticker || f(), g.active.last && (g.active.index = u() - 1), g.active.index >= u() && (g.active.last = !0), g.settings.pager && !g.settings.pagerCustom && (m(), y(g.active.index)), g.settings.ariaHidden && V(g.active.index * v())
            }, p.destroySlider = function() {
                g.initialized && (g.initialized = !1, R(".bx-clone", this).remove(), g.children.each(function() {
                    void 0 !== R(this).data("origStyle") ? R(this).attr("style", R(this).data("origStyle")) : R(this).removeAttr("style")
                }), void 0 !== R(this).data("origStyle") ? this.attr("style", R(this).data("origStyle")) : R(this).removeAttr("style"), R(this).unwrap().unwrap(), g.controls.el && g.controls.el.remove(), g.controls.next && g.controls.next.remove(), g.controls.prev && g.controls.prev.remove(), g.pagerEl && g.settings.controls && !g.settings.pagerCustom && g.pagerEl.remove(), R(".bx-caption", this).remove(), g.controls.autoEl && g.controls.autoEl.remove(), clearInterval(g.interval), g.settings.responsive && R(window).unbind("resize", Y), g.settings.keyboardEnabled && R(document).unbind("keydown", W), R(this).removeData("bxSlider"))
            }, p.reloadSlider = function(t) {
                void 0 !== t && (e = t), p.destroySlider(), o(), R(p).data("bxSlider", this)
            }, o(), R(p).data("bxSlider", this), this
        }
    }
}(jQuery);
! function(t, a, e) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(a || e)
}(function(i) {
    "use strict";
    var l = function(f, b, w) {
        var C = {
            invalid: [],
            getCaret: function() {
                try {
                    var t, a = 0,
                        e = f.get(0),
                        n = document.selection,
                        s = e.selectionStart;
                    return n && -1 === navigator.appVersion.indexOf("MSIE 10") ? ((t = n.createRange()).moveStart("character", -C.val().length), a = t.text.length) : (s || "0" === s) && (a = s), a
                } catch (t) {}
            },
            setCaret: function(t) {
                try {
                    if (f.is(":focus")) {
                        var a, e = f.get(0);
                        e.setSelectionRange ? e.setSelectionRange(t, t) : ((a = e.createTextRange()).collapse(!0), a.moveEnd("character", t), a.moveStart("character", t), a.select())
                    }
                } catch (t) {}
            },
            events: function() {
                f.on("keydown.mask", function(t) {
                    f.data("mask-keycode", t.keyCode || t.which), f.data("mask-previus-value", f.val()), f.data("mask-previus-caret-pos", C.getCaret()), C.maskDigitPosMapOld = C.maskDigitPosMap
                }).on(i.jMaskGlobals.useInput ? "input.mask" : "keyup.mask", C.behaviour).on("paste.mask drop.mask", function() {
                    setTimeout(function() {
                        f.keydown().keyup()
                    }, 100)
                }).on("change.mask", function() {
                    f.data("changed", !0)
                }).on("blur.mask", function() {
                    o === C.val() || f.data("changed") || f.trigger("change"), f.data("changed", !1)
                }).on("blur.mask", function() {
                    o = C.val()
                }).on("focus.mask", function(t) {
                    !0 === w.selectOnFocus && i(t.target).select()
                }).on("focusout.mask", function() {
                    w.clearIfNotMatch && !r.test(C.val()) && C.val("")
                })
            },
            getRegexMask: function() {
                for (var t, a, e, n, s, r, o = [], i = 0; i < b.length; i++)(t = j.translation[b.charAt(i)]) ? (a = t.pattern.toString().replace(/.{1}$|^.{1}/g, ""), e = t.optional, (n = t.recursive) ? (o.push(b.charAt(i)), s = {
                    digit: b.charAt(i),
                    pattern: a
                }) : o.push(e || n ? a + "?" : a)) : o.push(b.charAt(i).replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&"));
                return r = o.join(""), s && (r = r.replace(new RegExp("(" + s.digit + "(.*" + s.digit + ")?)"), "($1)?").replace(new RegExp(s.digit, "g"), s.pattern)), new RegExp(r)
            },
            destroyEvents: function() {
                f.off(["input", "keydown", "keyup", "paste", "drop", "blur", "focusout", ""].join(".mask "))
            },
            val: function(t) {
                var a = f.is("input") ? "val" : "text";
                return 0 < arguments.length ? (f[a]() !== t && f[a](t), f) : f[a]()
            },
            calculateCaretPosition: function() {
                var t = f.data("mask-previus-value") || "",
                    a = C.getMasked(),
                    e = C.getCaret();
                if (t !== a) {
                    var n = f.data("mask-previus-caret-pos") || 0,
                        s = a.length,
                        r = t.length,
                        o = 0,
                        i = 0,
                        l = 0,
                        c = 0,
                        u = 0;
                    for (u = e; u < s && C.maskDigitPosMap[u]; u++) i++;
                    for (u = e - 1; 0 <= u && C.maskDigitPosMap[u]; u--) o++;
                    for (u = e - 1; 0 <= u; u--) C.maskDigitPosMap[u] && l++;
                    for (u = n - 1; 0 <= u; u--) C.maskDigitPosMapOld[u] && c++;
                    if (r < e) e = 10 * s;
                    else if (e <= n && n !== r) {
                        if (!C.maskDigitPosMapOld[e]) {
                            var k = e;
                            e -= c - l, e -= o, C.maskDigitPosMap[e] && (e = k)
                        }
                    } else n < e && (e += l - c, e += i)
                }
                return e
            },
            behaviour: function(t) {
                t = t || window.event, C.invalid = [];
                var a = f.data("mask-keycode");
                if (-1 === i.inArray(a, j.byPassKeys)) {
                    var e = C.getMasked(),
                        n = C.getCaret();
                    return setTimeout(function() {
                        C.setCaret(C.calculateCaretPosition())
                    }, i.jMaskGlobals.keyStrokeCompensation), C.val(e), C.setCaret(n), C.callbacks(t)
                }
            },
            getMasked: function(t, a) {
                var e, n, s, r = [],
                    o = void 0 === a ? C.val() : a + "",
                    i = 0,
                    l = b.length,
                    c = 0,
                    u = o.length,
                    k = 1,
                    f = "push",
                    p = -1,
                    v = 0,
                    d = [];
                for (n = w.reverse ? (f = "unshift", k = -1, e = 0, i = l - 1, c = u - 1, function() {
                        return -1 < i && -1 < c
                    }) : (e = l - 1, function() {
                        return i < l && c < u
                    }); n();) {
                    var h = b.charAt(i),
                        g = o.charAt(c),
                        m = j.translation[h];
                    m ? (g.match(m.pattern) ? (r[f](g), m.recursive && (-1 === p ? p = i : i === e && i !== p && (i = p - k), e === p && (i -= k)), i += k) : g === s ? (v--, s = void 0) : m.optional ? (i += k, c -= k) : m.fallback ? (r[f](m.fallback), i += k, c -= k) : C.invalid.push({
                        p: c,
                        v: g,
                        e: m.pattern
                    }), c += k) : (t || r[f](h), g === h ? (d.push(c), c += k) : (s = h, d.push(c + v), v++), i += k)
                }
                var M = b.charAt(e);
                l !== u + 1 || j.translation[M] || r.push(M);
                var y = r.join("");
                return C.mapMaskdigitPositions(y, d, u), y
            },
            mapMaskdigitPositions: function(t, a, e) {
                var n = w.reverse ? t.length - e : 0;
                C.maskDigitPosMap = {};
                for (var s = 0; s < a.length; s++) C.maskDigitPosMap[a[s] + n] = 1
            },
            callbacks: function(t) {
                var a = C.val(),
                    e = a !== o,
                    n = [a, t, f, w],
                    s = function(t, a, e) {
                        "function" == typeof w[t] && a && w[t].apply(this, e)
                    };
                s("onChange", !0 === e, n), s("onKeyPress", !0 === e, n), s("onComplete", a.length === b.length, n), s("onInvalid", 0 < C.invalid.length, [a, t, f, C.invalid, w])
            }
        };
        f = i(f);
        var r, j = this,
            o = C.val();
        b = "function" == typeof b ? b(C.val(), void 0, f, w) : b, j.mask = b, j.options = w, j.remove = function() {
            var t = C.getCaret();
            return j.options.placeholder && f.removeAttr("placeholder"), f.data("mask-maxlength") && f.removeAttr("maxlength"), C.destroyEvents(), C.val(j.getCleanVal()), C.setCaret(t), f
        }, j.getCleanVal = function() {
            return C.getMasked(!0)
        }, j.getMaskedVal = function(t) {
            return C.getMasked(!1, t)
        }, j.init = function(t) {
            if (t = t || !1, w = w || {}, j.clearIfNotMatch = i.jMaskGlobals.clearIfNotMatch, j.byPassKeys = i.jMaskGlobals.byPassKeys, j.translation = i.extend({}, i.jMaskGlobals.translation, w.translation), j = i.extend(!0, {}, j, w), r = C.getRegexMask(), t) C.events(), C.val(C.getMasked());
            else {
                w.placeholder && f.attr("placeholder", w.placeholder), f.data("mask") && f.attr("autocomplete", "off");
                for (var a = 0, e = !0; a < b.length; a++) {
                    var n = j.translation[b.charAt(a)];
                    if (n && n.recursive) {
                        e = !1;
                        break
                    }
                }
                e && f.attr("maxlength", b.length).data("mask-maxlength", !0), C.destroyEvents(), C.events();
                var s = C.getCaret();
                C.val(C.getMasked()), C.setCaret(s)
            }
        }, j.init(!f.is("input"))
    };
    i.maskWatchers = {};
    var a = function() {
            var t = i(this),
                a = {},
                e = "data-mask-",
                n = t.attr("data-mask");
            if (t.attr(e + "reverse") && (a.reverse = !0), t.attr(e + "clearifnotmatch") && (a.clearIfNotMatch = !0), "true" === t.attr(e + "selectonfocus") && (a.selectOnFocus = !0), c(t, n, a)) return t.data("mask", new l(this, n, a))
        },
        c = function(t, a, e) {
            e = e || {};
            var n = i(t).data("mask"),
                s = JSON.stringify,
                r = i(t).val() || i(t).text();
            try {
                return "function" == typeof a && (a = a(r)), "object" != typeof n || s(n.options) !== s(e) || n.mask !== a
            } catch (t) {}
        };
    i.fn.mask = function(t, a) {
        a = a || {};
        var e = this.selector,
            n = i.jMaskGlobals,
            s = n.watchInterval,
            r = a.watchInputs || n.watchInputs,
            o = function() {
                if (c(this, t, a)) return i(this).data("mask", new l(this, t, a))
            };
        return i(this).each(o), e && "" !== e && r && (clearInterval(i.maskWatchers[e]), i.maskWatchers[e] = setInterval(function() {
            i(document).find(e).each(o)
        }, s)), this
    }, i.fn.masked = function(t) {
        return this.data("mask").getMaskedVal(t)
    }, i.fn.unmask = function() {
        return clearInterval(i.maskWatchers[this.selector]), delete i.maskWatchers[this.selector], this.each(function() {
            var t = i(this).data("mask");
            t && t.remove().removeData("mask")
        })
    }, i.fn.cleanVal = function() {
        return this.data("mask").getCleanVal()
    }, i.applyDataMask = function(t) {
        ((t = t || i.jMaskGlobals.maskElements) instanceof i ? t : i(t)).filter(i.jMaskGlobals.dataMaskAttr).each(a)
    };
    var t, e, n, s = {
        maskElements: "input,td,span,div",
        dataMaskAttr: "*[data-mask]",
        dataMask: !0,
        watchInterval: 300,
        watchInputs: !0,
        keyStrokeCompensation: 10,
        useInput: !/Chrome\/[2-4][0-9]|SamsungBrowser/.test(window.navigator.userAgent) && (t = "input", n = document.createElement("div"), (e = (t = "on" + t) in n) || (n.setAttribute(t, "return;"), e = "function" == typeof n[t]), n = null, e),
        watchDataMask: !1,
        byPassKeys: [9, 16, 17, 18, 36, 37, 38, 39, 40, 91],
        translation: {
            0: {
                pattern: /\d/
            },
            9: {
                pattern: /\d/,
                optional: !0
            },
            "#": {
                pattern: /\d/,
                recursive: !0
            },
            A: {
                pattern: /[a-zA-Z0-9]/
            },
            S: {
                pattern: /[a-zA-Z]/
            }
        }
    };
    i.jMaskGlobals = i.jMaskGlobals || {}, (s = i.jMaskGlobals = i.extend(!0, {}, s, i.jMaskGlobals)).dataMask && i.applyDataMask(), setInterval(function() {
        i.jMaskGlobals.watchDataMask && i.applyDataMask()
    }, s.watchInterval)
}, window.jQuery, window.Zepto);
(function() {
    var u, c, t, e, o, n, r, s, i, v, a, l, w, p, h, d, f, b, k, g, m, y, S, q, L, x, T, R, P, E, M, j, A, N, O, _, F, C, U, W, X, D, H, I, z, G, B, J, K = [].slice,
        Q = {}.hasOwnProperty,
        V = function(t, e) {
            function n() {
                this.constructor = t
            }
            for (var r in e) Q.call(e, r) && (t[r] = e[r]);
            return n.prototype = e.prototype, t.prototype = new n, t.__super__ = e.prototype, t
        },
        Y = [].indexOf || function(t) {
            for (var e = 0, n = this.length; e < n; e++)
                if (e in this && this[e] === t) return e;
            return -1
        };
    for (m = {
            catchupTime: 100,
            initialRate: .03,
            minTime: 250,
            ghostTime: 100,
            maxProgressPerFrame: 20,
            easeFactor: 1.25,
            startOnPageLoad: !0,
            restartOnPushState: !0,
            restartOnRequestAfter: 500,
            target: "body",
            elements: {
                checkInterval: 100,
                selectors: ["body"]
            },
            eventLag: {
                minSamples: 10,
                sampleCount: 3,
                lagThreshold: 3
            },
            ajax: {
                trackMethods: ["GET"],
                trackWebSockets: !0,
                ignoreURLs: []
            }
        }, P = function() {
            var t;
            return null != (t = "undefined" != typeof performance && null !== performance && "function" == typeof performance.now ? performance.now() : void 0) ? t : +new Date
        }, M = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame, g = window.cancelAnimationFrame || window.mozCancelAnimationFrame, null == M && (M = function(t) {
            return setTimeout(t, 50)
        }, g = function(t) {
            return clearTimeout(t)
        }), A = function(e) {
            var n, r;
            return n = P(), (r = function() {
                var t;
                return 33 <= (t = P() - n) ? (n = P(), e(t, function() {
                    return M(r)
                })) : setTimeout(r, 33 - t)
            })()
        }, j = function() {
            var t, e, n;
            return n = arguments[0], e = arguments[1], t = 3 <= arguments.length ? K.call(arguments, 2) : [], "function" == typeof n[e] ? n[e].apply(n, t) : n[e]
        }, y = function() {
            var t, e, n, r, s, o, i;
            for (e = arguments[0], o = 0, i = (r = 2 <= arguments.length ? K.call(arguments, 1) : []).length; o < i; o++)
                if (n = r[o])
                    for (t in n) Q.call(n, t) && (s = n[t], null != e[t] && "object" == typeof e[t] && null != s && "object" == typeof s ? y(e[t], s) : e[t] = s);
            return e
        }, f = function(t) {
            var e, n, r, s, o;
            for (n = e = 0, s = 0, o = t.length; s < o; s++) r = t[s], n += Math.abs(r), e++;
            return n / e
        }, q = function(t, e) {
            var n, r, s;
            if (null == t && (t = "options"), null == e && (e = !0), s = document.querySelector("[data-pace-" + t + "]")) {
                if (n = s.getAttribute("data-pace-" + t), !e) return n;
                try {
                    return JSON.parse(n)
                } catch (t) {
                    return r = t, "undefined" != typeof console && null !== console ? console.error("Error parsing inline pace options", r) : void 0
                }
            }
        }, r = function() {
            function t() {}
            return t.prototype.on = function(t, e, n, r) {
                var s;
                return null == r && (r = !1), null == this.bindings && (this.bindings = {}), null == (s = this.bindings)[t] && (s[t] = []), this.bindings[t].push({
                    handler: e,
                    ctx: n,
                    once: r
                })
            }, t.prototype.once = function(t, e, n) {
                return this.on(t, e, n, !0)
            }, t.prototype.off = function(t, e) {
                var n, r, s;
                if (null != (null != (r = this.bindings) ? r[t] : void 0)) {
                    if (null == e) return delete this.bindings[t];
                    for (n = 0, s = []; n < this.bindings[t].length;) s.push(this.bindings[t][n].handler === e ? this.bindings[t].splice(n, 1) : n++);
                    return s
                }
            }, t.prototype.trigger = function() {
                var t, e, n, r, s, o, i, a, u;
                if (n = arguments[0], t = 2 <= arguments.length ? K.call(arguments, 1) : [], null != (i = this.bindings) ? i[n] : void 0) {
                    for (s = 0, u = []; s < this.bindings[n].length;) r = (a = this.bindings[n][s]).handler, e = a.ctx, o = a.once, r.apply(null != e ? e : this, t), u.push(o ? this.bindings[n].splice(s, 1) : s++);
                    return u
                }
            }, t
        }(), v = window.Pace || {}, window.Pace = v, y(v, r.prototype), E = v.options = y({}, m, window.paceOptions, q()), H = 0, z = (B = ["ajax", "document", "eventLag", "elements"]).length; H < z; H++) !0 === E[F = B[H]] && (E[F] = m[F]);
    i = function(t) {
        function e() {
            return e.__super__.constructor.apply(this, arguments)
        }
        return V(e, t), e
    }(Error), c = function() {
        function t() {
            this.progress = 0
        }
        return t.prototype.getElement = function() {
            var t;
            if (null == this.el) {
                if (!(t = document.querySelector(E.target))) throw new i;
                this.el = document.createElement("div"), this.el.className = "pace pace-active", document.body.className = document.body.className.replace(/pace-done/g, ""), document.body.className += " pace-running", this.el.innerHTML = '<div class="pace-progress">\n  <div class="pace-progress-inner"></div>\n</div>\n<div class="pace-activity"></div>', null != t.firstChild ? t.insertBefore(this.el, t.firstChild) : t.appendChild(this.el)
            }
            return this.el
        }, t.prototype.finish = function() {
            var t;
            return (t = this.getElement()).className = t.className.replace("pace-active", ""), t.className += " pace-inactive", document.body.className = document.body.className.replace("pace-running", ""), document.body.className += " pace-done"
        }, t.prototype.update = function(t) {
            return this.progress = t, this.render()
        }, t.prototype.destroy = function() {
            try {
                this.getElement().parentNode.removeChild(this.getElement())
            } catch (t) {
                i = t
            }
            return this.el = void 0
        }, t.prototype.render = function() {
            var t, e, n, r, s, o, i;
            if (null == document.querySelector(E.target)) return !1;
            for (t = this.getElement(), r = "translate3d(" + this.progress + "%, 0, 0)", s = 0, o = (i = ["webkitTransform", "msTransform", "transform"]).length; s < o; s++) e = i[s], t.children[0].style[e] = r;
            return (!this.lastRenderedProgress || this.lastRenderedProgress | 0 !== this.progress | 0) && (t.children[0].setAttribute("data-progress-text", (0 | this.progress) + "%"), 100 <= this.progress ? n = "99" : (n = this.progress < 10 ? "0" : "", n += 0 | this.progress), t.children[0].setAttribute("data-progress", "" + n)), this.lastRenderedProgress = this.progress
        }, t.prototype.done = function() {
            return 100 <= this.progress
        }, t
    }(), s = function() {
        function t() {
            this.bindings = {}
        }
        return t.prototype.trigger = function(t, e) {
            var n, r, s, o, i;
            if (null != this.bindings[t]) {
                for (i = [], r = 0, s = (o = this.bindings[t]).length; r < s; r++) n = o[r], i.push(n.call(this, e));
                return i
            }
        }, t.prototype.on = function(t, e) {
            var n;
            return null == (n = this.bindings)[t] && (n[t] = []), this.bindings[t].push(e)
        }, t
    }(), D = window.XMLHttpRequest, X = window.XDomainRequest, W = window.WebSocket, S = function(t, e) {
        var n, r, s;
        for (n in s = [], e.prototype) try {
            r = e.prototype[n], s.push(null == t[n] && "function" != typeof r ? t[n] = r : void 0)
        } catch (t) {
            t
        }
        return s
    }, T = [], v.ignore = function() {
        var t, e, n;
        return e = arguments[0], t = 2 <= arguments.length ? K.call(arguments, 1) : [], T.unshift("ignore"), n = e.apply(null, t), T.shift(), n
    }, v.track = function() {
        var t, e, n;
        return e = arguments[0], t = 2 <= arguments.length ? K.call(arguments, 1) : [], T.unshift("track"), n = e.apply(null, t), T.shift(), n
    }, _ = function(t) {
        var e;
        if (null == t && (t = "GET"), "track" === T[0]) return "force";
        if (!T.length && E.ajax) {
            if ("socket" === t && E.ajax.trackWebSockets) return !0;
            if (e = t.toUpperCase(), 0 <= Y.call(E.ajax.trackMethods, e)) return !0
        }
        return !1
    }, a = function(t) {
        function e() {
            var n, s = this;
            e.__super__.constructor.apply(this, arguments), n = function(n) {
                var r;
                return r = n.open, n.open = function(t, e) {
                    return _(t) && s.trigger("request", {
                        type: t,
                        url: e,
                        request: n
                    }), r.apply(n, arguments)
                }
            }, window.XMLHttpRequest = function(t) {
                var e;
                return e = new D(t), n(e), e
            };
            try {
                S(window.XMLHttpRequest, D)
            } catch (t) {}
            if (null != X) {
                window.XDomainRequest = function() {
                    var t;
                    return t = new X, n(t), t
                };
                try {
                    S(window.XDomainRequest, X)
                } catch (t) {}
            }
            if (null != W && E.ajax.trackWebSockets) {
                window.WebSocket = function(t, e) {
                    var n;
                    return n = null != e ? new W(t, e) : new W(t), _("socket") && s.trigger("request", {
                        type: "socket",
                        url: t,
                        protocols: e,
                        request: n
                    }), n
                };
                try {
                    S(window.WebSocket, W)
                } catch (t) {}
            }
        }
        return V(e, s), e
    }(), I = null, O = function(t) {
        var e, n, r, s;
        for (n = 0, r = (s = E.ajax.ignoreURLs).length; n < r; n++)
            if ("string" == typeof(e = s[n])) {
                if (-1 !== t.indexOf(e)) return !0
            } else if (e.test(t)) return !0;
        return !1
    }, (L = function() {
        return null == I && (I = new a), I
    })().on("request", function(t) {
        var e, o, i, a, n;
        return a = t.type, i = t.request, n = t.url, O(n) ? void 0 : v.running || !1 === E.restartOnRequestAfter && "force" !== _(a) ? void 0 : (o = arguments, "boolean" == typeof(e = E.restartOnRequestAfter || 0) && (e = 0), setTimeout(function() {
            var t, e, n, r, s;
            if ("socket" === a ? i.readyState < 2 : 0 < (n = i.readyState) && n < 4) {
                for (v.restart(), s = [], t = 0, e = (r = v.sources).length; t < e; t++) {
                    if ((F = r[t]) instanceof u) {
                        F.watch.apply(F, o);
                        break
                    }
                    s.push(void 0)
                }
                return s
            }
        }, e))
    }), u = function() {
        function t() {
            var t = this;
            this.elements = [], L().on("request", function() {
                return t.watch.apply(t, arguments)
            })
        }
        return t.prototype.watch = function(t) {
            var e, n, r, s;
            return r = t.type, e = t.request, s = t.url, O(s) ? void 0 : (n = "socket" === r ? new p(e) : new h(e), this.elements.push(n))
        }, t
    }(), h = function(e) {
        var t, n, r, s, o, i = this;
        if (this.progress = 0, null != window.ProgressEvent)
            for (e.addEventListener("progress", function(t) {
                    return i.progress = t.lengthComputable ? 100 * t.loaded / t.total : i.progress + (100 - i.progress) / 2
                }, !1), n = 0, r = (o = ["load", "abort", "timeout", "error"]).length; n < r; n++) t = o[n], e.addEventListener(t, function() {
                return i.progress = 100
            }, !1);
        else s = e.onreadystatechange, e.onreadystatechange = function() {
            var t;
            return 0 === (t = e.readyState) || 4 === t ? i.progress = 100 : 3 === e.readyState && (i.progress = 50), "function" == typeof s ? s.apply(null, arguments) : void 0
        }
    }, p = function(t) {
        var e, n, r, s, o = this;
        for (n = this.progress = 0, r = (s = ["error", "open"]).length; n < r; n++) e = s[n], t.addEventListener(e, function() {
            return o.progress = 100
        }, !1)
    }, e = function(t) {
        var e, n, r, s;
        for (null == t && (t = {}), this.elements = [], null == t.selectors && (t.selectors = []), n = 0, r = (s = t.selectors).length; n < r; n++) e = s[n], this.elements.push(new o(e))
    }, o = function() {
        function t(t) {
            this.selector = t, this.progress = 0, this.check()
        }
        return t.prototype.check = function() {
            var t = this;
            return document.querySelector(this.selector) ? this.done() : setTimeout(function() {
                return t.check()
            }, E.elements.checkInterval)
        }, t.prototype.done = function() {
            return this.progress = 100
        }, t
    }(), t = function() {
        function t() {
            var t, e, n = this;
            this.progress = null != (e = this.states[document.readyState]) ? e : 100, t = document.onreadystatechange, document.onreadystatechange = function() {
                return null != n.states[document.readyState] && (n.progress = n.states[document.readyState]), "function" == typeof t ? t.apply(null, arguments) : void 0
            }
        }
        return t.prototype.states = {
            loading: 0,
            interactive: 50,
            complete: 100
        }, t
    }(), n = function() {
        var e, n, r, s, o, i = this;
        this.progress = 0, o = [], s = e = 0, r = P(), n = setInterval(function() {
            var t;
            return t = P() - r - 50, r = P(), o.push(t), o.length > E.eventLag.sampleCount && o.shift(), e = f(o), ++s >= E.eventLag.minSamples && e < E.eventLag.lagThreshold ? (i.progress = 100, clearInterval(n)) : i.progress = 3 / (e + 3) * 100
        }, 50)
    }, w = function() {
        function t(t) {
            this.source = t, this.last = this.sinceLastUpdate = 0, this.rate = E.initialRate, this.catchup = 0, this.progress = this.lastProgress = 0, null != this.source && (this.progress = j(this.source, "progress"))
        }
        return t.prototype.tick = function(t, e) {
            var n;
            return null == e && (e = j(this.source, "progress")), 100 <= e && (this.done = !0), e === this.last ? this.sinceLastUpdate += t : (this.sinceLastUpdate && (this.rate = (e - this.last) / this.sinceLastUpdate), this.catchup = (e - this.progress) / E.catchupTime, this.sinceLastUpdate = 0, this.last = e), e > this.progress && (this.progress += this.catchup * t), n = 1 - Math.pow(this.progress / 100, E.easeFactor), this.progress += n * this.rate * t, this.progress = Math.min(this.lastProgress + E.maxProgressPerFrame, this.progress), this.progress = Math.max(0, this.progress), this.progress = Math.min(100, this.progress), this.lastProgress = this.progress, this.progress
        }, t
    }(), k = d = U = b = N = C = null, v.running = !1, x = function() {
        return E.restartOnPushState ? v.restart() : void 0
    }, null != window.history.pushState && (G = window.history.pushState, window.history.pushState = function() {
        return x(), G.apply(window.history, arguments)
    }), null != window.history.replaceState && (J = window.history.replaceState, window.history.replaceState = function() {
        return x(), J.apply(window.history, arguments)
    }), l = {
        ajax: u,
        elements: e,
        document: t,
        eventLag: n
    }, (R = function() {
        var t, e, n, r, s, o, i, a;
        for (v.sources = C = [], e = 0, r = (o = ["ajax", "elements", "document", "eventLag"]).length; e < r; e++) !1 !== E[t = o[e]] && C.push(new l[t](E[t]));
        for (n = 0, s = (a = null != (i = E.extraSources) ? i : []).length; n < s; n++) F = a[n], C.push(new F(E));
        return v.bar = b = new c, N = [], U = new w
    })(), v.stop = function() {
        return v.trigger("stop"), v.running = !1, b.destroy(), k = !0, null != d && ("function" == typeof g && g(d), d = null), R()
    }, v.restart = function() {
        return v.trigger("restart"), v.stop(), v.start()
    }, v.go = function() {
        var y;
        return v.running = !0, b.render(), y = P(), k = !1, d = A(function(t, e) {
            var n, r, s, o, i, a, u, c, l, p, h, d, f, g, m;
            for (100 - b.progress, r = p = 0, s = !0, a = h = 0, f = C.length; h < f; a = ++h)
                for (F = C[a], l = null != N[a] ? N[a] : N[a] = [], u = d = 0, g = (i = null != (m = F.elements) ? m : [F]).length; d < g; u = ++d) o = i[u], s &= (c = null != l[u] ? l[u] : l[u] = new w(o)).done, c.done || (r++, p += c.tick(t));
            return n = p / r, b.update(U.tick(t, n)), b.done() || s || k ? (b.update(100), v.trigger("done"), setTimeout(function() {
                return b.finish(), v.running = !1, v.trigger("hide")
            }, Math.max(E.ghostTime, Math.max(E.minTime - (P() - y), 0)))) : e()
        })
    }, v.start = function(t) {
        y(E, t), v.running = !0;
        try {
            b.render()
        } catch (t) {
            i = t
        }
        return document.querySelector(".pace") ? (v.trigger("start"), v.go()) : setTimeout(v.start, 50)
    }, "function" == typeof define && define.amd ? define(function() {
        return v
    }) : "object" == typeof exports ? module.exports = v : E.startOnPageLoad && v.start()
}).call(this);