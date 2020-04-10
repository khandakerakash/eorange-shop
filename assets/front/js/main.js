(function ($) {
    "use strict";

    jQuery(document).ready(function($){

        //---------Product checkOut-----------
        $('.shippingCheck').click(function(){
            $('.shipping-details-area').toggle();
        });

        $(function(){

            var url = window.location.pathname,
                urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
            // now grab every link from the navigation
            $('.header-menu-wrap li a').each(function(){
                // and test its normalized href against the url pathname regexp
                if(urlRegExp.test(this.href.replace(/\/$/,''))){
                    $(this).addClass('active');
                    //$(this).parent('a').removeClass('collapsed');
                    $(this).closest('ul').addClass("in");
                    $(this).closest('ul').attr("aria-expanded","true");
                    $(this).parents('li').parents('li').find('.submenu').attr("aria-expanded","true");
                }
            });

        });

        // close the header banner
        jQuery(".header-offer_banner-close").click(function(){
            jQuery(".header-offer").addClass("close-btn");
        });


        //---------Menu responsive-----------
        $('.header-top_nav').slicknav({
            prependTo:'.mobileSlickMenuActive',
            label: '',
            duration: 300
        });

        $(".slicknav_btn").on('click', function() {
            if ( $(this).hasClass("slicknav_collapsed")) {
                $(".slicknav_icon").html('<i class="fa fa-bars"></i>');
            } else {
                $(".slicknav_icon").html('<i class="fa fa-times"></i>');
            }
        });

        $(".header-bottom-left-wrap").meanmenu({
            meanMenuClose: '<i class="fa fa-bars"></i>' +   ' All Categories '    + '<i class="fa fa-times"></i>',
            meanMenuOpen: '<i class="fa fa-bars"></i>' +   ' All Categories '    + '<i class="fa fa-angle-down"></i>',
            meanMenuCloseSize: '14px',
            meanScreenWidth: '767',
            meanExpandableChildren: true,
            meanMenuContainer: '.mobileMenuActive',
            onePage: true
        });

        $(window).bind('scroll', function() {
            var navHeight = $(".top_bar").height();
            ($(window).scrollTop() > navHeight) ? $('.header_main').addClass('goToTop') : $('.header_main').removeClass('goToTop');
        });

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 220) {
                //clearHeader, not clearheader - caps H
                $(".cat_menu_container").addClass("view-only-scroll");
            } else  {
                $(".cat_menu_container").removeClass("view-only-scroll");
            }
        });

        //---------Mobile Search-----------
        $('.mobile-search').click(function(){
            $('.header-search-box.mobile').toggle();
        });

        //---------Add to Cart-----------
        $('.myCart1').click(function(){
            $('.addToMycart1').toggle();
        });

        //-----------Latest News Carousel-----------
        $(".latest-news-list").owlCarousel({
            items: 3,
            autoplay: true,
            margin: 30,
            loop: true,
            nav: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            smartSpeed: 800,
            responsive : {
                0 : {
                    items: 1,
                },
                768 : {
                    items: 2,
                },
                992 : {
                    items: 3
                }
            }
        });

        //---------Client logo Carousel-----------
        $(".logo-carousel").owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: false,
            margin: 30,
            autoplay: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            smartSpeed: 1200
        });

        //---------Client logo Carousel-----------
        $(".review-carousel").owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: false,
            margin: 30,
            autoplay: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            smartSpeed: 1200
        });

        //---------Product Carousel-----------
        $(".featured-carousel").owlCarousel({
            items: 4,
            autoplay: true,
            margin: 30,
            loop: true,
            dots: true,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            smartSpeed: 800,
            responsive : {
                0 : {
                    items: 1,
                },
                768 : {
                    items: 2,
                },
                992 : {
                    items: 3
                },
                1200 : {
                    items: 4
                }
            }
        });

        //---------Home tab animation JS-----------

        $('a[class="tab-1"]').on('shown.bs.tab', function (e) {
            var target = $(this).attr('href');

            $(target).addClass('animated fadeIn');

        });
        $('a[class="tab-2"]').on('shown.bs.tab', function (e) {
            var target = $(this).attr('href');

            $(target).find('.owl-test').show();
            setTimeout(function(){

                $(target).find('.featured_loader').fadeOut();

                $(target).addClass('animated fadeIn');

            }, 2000);

        });
        $('a[class="tab-3"]').on('shown.bs.tab', function (e) {
            var target = $(this).attr('href');
            $(target).find('.owl-test').show();
            setTimeout(function(){

                $(target).find('.featured_loader').fadeOut();

                $(target).addClass('animated fadeIn');

            }, 2000);
        });

        //---------Animation JS-----------
        new WOW().init();

        //---------Website Scroll bottom to top-----------
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });

        //---------Product details review carousel-----------
        $(".product-review-owl-carousel").owlCarousel({
            items: 4,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            loop: true,
            autoplay: true,
            smartSpeed: 800
        });

        //---------Product bootstrap slider-----------
        $("#ex2").slider({});
        $(".owl-carousel").css("z-index", '');
        //-----------Product details Carousel-----------
        $(".vendor-product-details-carousel").owlCarousel({
            items: 1,
            autoplay: false,
            loop: true,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: true,
            dotsData: true,
            smartSpeed: 800
        });
        $(".vendor-single-product-details-item").owlCarousel({
            items: 6,
            autoplay: false,
            loop: true,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: true,
            dotsData: true,
            smartSpeed: 800
        });
        //---------Preload close-----------
        $('.preload-close').click(function(){
            $('.subscribe-preloader-wrap').hide();
        });
        //-----------Product details button details-----------
        $('#product-phone').click(function() {
            $('.contact-phone-details').slideToggle();
            $('.contact-email-details').hide();
        });
        $('#product-email').click(function() {
            $('.contact-email-details').slideToggle();
            $('.contact-phone-details').slideToggle().hide();
        });

    });

    // $('.main-carousel').flickity();

    // Aside Script
    // $('.aside-cart').hover(function () {
    //
    //     $(this).parent().parent().parent('aside').addClass("aside_hover");
    //
    //     // $('#check').css({ 'right':'20px', 'left': 'auto' });
    //
    // });

    // $( ".aside-cart, .aside-item" )
    //     .mouseenter(function() {
    //         $("#abcd").addClass("aside_hover");
    //     })
    //     .mouseleave(function() {
    //         $("#abcd").removeClass("aside_hover");
    //     });

    $(".aside").mouseenter(function() {
        $(this).css('right', '0');
        $(".aside-cart").css('margin-left', '0');
    });

    $(".aside").mouseleave(function() {
        $(this).css('right', '-40px');
        $(".aside-cart").css('margin-left', '-35px');
    });

}(jQuery));

(function($, window) {
    var Starrr;
    window.Starrr = Starrr = (function() {
        Starrr.prototype.defaults = {
            rating: void 0,
            max: 5,
            readOnly: false,
            emptyClass: 'fa fa-star-o',
            fullClass: 'fa fa-star',
            change: function(e, value) {}
        };

        function Starrr($el, options) {
            this.options = $.extend({}, this.defaults, options);
            this.$el = $el;
            this.createStars();
            this.syncRating();
            if (this.options.readOnly) {
                return;
            }
            this.$el.on('mouseover.starrr', 'a', (function(_this) {
                return function(e) {
                    return _this.syncRating(_this.getStars().index(e.currentTarget) + 1);
                };
            })(this));
            this.$el.on('mouseout.starrr', (function(_this) {
                return function() {
                    return _this.syncRating();
                };
            })(this));
            this.$el.on('click.starrr', 'a', (function(_this) {
                return function(e) {
                    return _this.setRating(_this.getStars().index(e.currentTarget) + 1);
                };
            })(this));
            this.$el.on('starrr:change', this.options.change);
        }

        Starrr.prototype.getStars = function() {
            return this.$el.find('a');
        };

        Starrr.prototype.createStars = function() {
            var j, ref, results;
            results = [];
            for (j = 1, ref = this.options.max; 1 <= ref ? j <= ref : j >= ref; 1 <= ref ? j++ : j--) {
                results.push(this.$el.append("<a href='javascript:;' />"));
            }
            return results;
        };

        Starrr.prototype.setRating = function(rating) {
            if (this.options.rating === rating) {
                rating = void 0;
            }
            this.options.rating = rating;
            this.syncRating();
            return this.$el.trigger('starrr:change', rating);
        };

        Starrr.prototype.getRating = function() {
            return this.options.rating;
        };

        Starrr.prototype.syncRating = function(rating) {
            var $stars, i, j, ref, results;
            rating || (rating = this.options.rating);
            $stars = this.getStars();
            results = [];
            for (i = j = 1, ref = this.options.max; 1 <= ref ? j <= ref : j >= ref; i = 1 <= ref ? ++j : --j) {
                results.push($stars.eq(i - 1).removeClass(rating >= i ? this.options.emptyClass : this.options.fullClass).addClass(rating >= i ? this.options.fullClass : this.options.emptyClass));
            }
            return results;
        };

        return Starrr;

    })();
    return $.fn.extend({
        starrr: function() {
            var args, option;
            option = arguments[0], args = 2 <= arguments.length ? slice.call(arguments, 1) : [];
            return this.each(function() {
                var data;
                data = $(this).data('starrr');
                if (!data) {
                    $(this).data('starrr', (data = new Starrr($(this), option)));
                }
                if (typeof option === 'string') {
                    return data[option].apply(data, args);
                }
            });
        }
    });



})(window.jQuery, window);
