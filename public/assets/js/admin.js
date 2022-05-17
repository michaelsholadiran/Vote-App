/* Page Scroll To Top ============ */
var pageScrollToTop = function() {
    /* page scroll top on click function */
    jQuery("button.back-to-top").on('click', function() {
        /* change back-to-top to scrollToTop*/
        jQuery('html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
    jQuery(window).on("scroll", function() {
        var scrollWindowHeight = jQuery(window).scrollTop();
        if (scrollWindowHeight > 50) {
            jQuery("button.back-to-top").slideDown(1000).fadeIn(1000);
        } else {
            jQuery("button.back-to-top").slideUp(1000).fadeOut(1000);
        }
    });
    /* page scroll top on click function end*/
};
pageScrollToTop();
(function($) {
    'use strict';
    var AdminBuilder = function() {
        var checkSelectorExistence = function(selectorName) {
            if (jQuery(selectorName).length > 0) {
                return true;
            } else {
                return false;
            }
        };
        var searchToggle = function() {
            $(".ttr-search-toggle").on("click", function(e) {
                e.preventDefault();
                $(".ttr-search-bar").toggleClass("active");
            });
        };
        var closeNav = function() {
            $(".ttr-overlay, .ttr-sidebar-toggle-button").on("click", function() {
                $("body").removeClass("ttr-opened-sidebar"), $("body").removeClass("ttr-body-fixed");
            });
        };
        var leftSidebar = function() {
            $(".ttr-toggle-sidebar").on("click", function() {
                if ($("body").hasClass("ttr-opened-sidebar")) {
                    $("body").removeClass("ttr-opened-sidebar"), $("body").removeClass("ttr-body-fixed");
                } else {
                    $(window).width() < 760 && $("body").addClass("ttr-body-fixed"), $("body").addClass("ttr-opened-sidebar");
                }
            });
            $(".ttr-sidebar-pin-button").on("click", function() {
                $("body").toggleClass("ttr-pinned-sidebar");
            });
            $(".ttr-sidebar-navi li.show > ul").slideDown(200);
            $(".ttr-sidebar-navi a").on("click", function(e) {
                var a = $(this);
                $(this).next().is("ul") ? (e.preventDefault(), a.parent().hasClass("show") ? (a.parent().removeClass("show"), a.next().slideUp(200)) : (a.parent().parent().find(".show ul").slideUp(200), a.parent().parent().find("li").removeClass("show"), a.parent().toggleClass("show"), a.next().slideToggle(200))) : (a.parent().parent().find(".show ul").slideUp(200), a.parent().parent().find("li").removeClass("show"), a.parent().addClass("show"))
            });
        };
        var waveEffect = function(e, a) {
            var s = ".ttr-wave-effect",
                n = e.outerWidth(),
                t = a.offsetX,
                i = a.offsetY;
            e.prepend('<span class="ttr-wave-effect"></span>'), $(s).css({
                top: i,
                left: t
            }).animate({
                opacity: "0",
                width: 2 * n,
                height: 2 * n
            }, 500, function() {
                e.find(s).remove()
            });
        };
        var materialButton = function() {
            $(".ttr-material-button").on("click", function(e) {
                waveEffect($(this), e)
            });
        }
        var headerSubMenu = function() {
            $(".ttr-header-submenu").show();
            $(".ttr-header-submenu").parent().find("a:first").on("click", function(e) {
                e.stopPropagation();
                e.preventDefault();
                $(this).parents(".ttr-header-navigation").find(".ttr-header-submenu").not($(this).parents("li").find(".ttr-header-submenu")).removeClass("active");
                $(this).parents("li").find(".ttr-header-submenu").show().toggleClass("active");
            });
            $(document).on("click", function(e) {
                var a = $(e.target);
                !0 === $(".ttr-header-submenu").hasClass("active") && !a.hasClass("ttr-submenu-toggle") && a.parents(".ttr-header-submenu").length < 1 && $(".ttr-header-submenu").removeClass("active"), a.parents(".ttr-search-bar").length < 1 && !a.hasClass("ttr-search-bar") && !a.parent().hasClass("ttr-search-toggle") && !a.hasClass("ttr-search-toggle") && $(".ttr-search-bar").removeClass("active")
            });
        }

        return {
            initialHelper: function() {
                searchToggle();
                closeNav();
                leftSidebar();
                materialButton();
                headerSubMenu();

            }
        }
    }(jQuery);
    /* jQuery ready  */
    jQuery(document).on('ready', function() {
        AdminBuilder.initialHelper();
    });
})(jQuery);