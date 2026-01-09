/**
 * Javascript for the Theme
 */
jQuery(function ($) {
    /**
     * Our Theme Frontend JS
     */
    var Bang_Frontend_JS = {
        /**
         * Initialize variations actions
         */
        init: function () {
            this.theme_init();
            this.banner_adjust();
            this.check_youtube();
            this.member_adjust();
            this.trigger_livechat();
            return this;
        },
        /***
         * Init Theme JS
         * @returns {undefined}
         */
        theme_init: function () {


            // Module - Features
            if ($('section.features').length) {
                const modules = document.querySelectorAll('section.features');

                modules.forEach(module => {
                    const items = module.querySelectorAll('.features__item');

                    items.forEach(item => {
                        const accordionHeader = item.querySelector('.features__item-heading');

                        $(accordionHeader).click(function (e) {
                            $(this).parent().toggleClass("active");
                            $(this).parent().find(".features__item-content").slideToggle();
                            $(this).parent().siblings('.features__item.active').find(".features__item-content").slideToggle();
                            $(this).parent().siblings('.features__item.active').removeClass("active");
                        });
                    });
                });
            }

            // Smart Home landing page hover box functionality
            $('section.cta-strip .block .main-content:not(".no-popup")').click(function () {
                $(this).fadeOut();
                $(this).siblings('.hover-content').fadeIn();
            });

            $('section.cta-strip .block i').click(function () {
                $(this).parent().fadeOut();
                $(this).parent().parent().find('.main-content').fadeIn();
            });

            // Smart Home landing page interactive floorplan functionality
            $('a.btn-floorplan').click(function () {
                $('a.btn-floorplan').removeClass('active');
                $('.the-floorplan .icon-wrapper').fadeOut();
                $(this).addClass('active');
            });

            $('a.btn-floorplan[data-feature="fans"]').click(function () {
                $('.the-floorplan .fan').addClass('rotating');
                $('.the-floorplan .fan').fadeIn();
            });

            $('a.btn-floorplan[data-feature="alfresco-lights"]').click(function () {
                $('.the-floorplan .alfresco').addClass('glowing');
                $('.the-floorplan .alfresco').fadeIn();
            });

            $('a.btn-floorplan[data-feature="water-feature"]').click(function () {
                $('.the-floorplan .water-feature').addClass('flowing');
                $('.the-floorplan .water-feature').fadeIn();
            });

            $('a.btn-floorplan[data-feature="aircon"]').click(function () {
                $('.the-floorplan .aircon').addClass('blowing');
                $('.the-floorplan .aircon').fadeIn();
            });

            $('a.btn-floorplan[data-feature="downlights"]').click(function () {
                $('.the-floorplan .downlights').fadeIn();
            });

            $('a.btn-floorplan[data-feature="garage"]').click(function () {
                $('.the-floorplan .garage').addClass('rolling');
                $('.the-floorplan .garage').fadeIn();
            });

            //New Landing Page Template

            $('a.btn-floorplan').click(function () {
                $('a.btn-floorplan').removeClass('active');
                $('.default-image').fadeOut();
                $('.the-floorplan .overlaid-plans').fadeOut(0);
                $(this).addClass('active');
            });

            // Handles the icon hover on homepage banner
            if ($('.icon-hover').length) {
                $('.icon-hover').each(function () {
                    $(this).hover(function () {
                        var oriimg = $(this).attr('src');
                        var hoverimg = $(this).data('hover');
                        $(this).attr('src', hoverimg);
                        $(this).data('hover', oriimg);
                    }, function () {
                        var oriimg = $(this).attr('src');
                        var hoverimg = $(this).data('hover');
                        $(this).attr('src', hoverimg);
                        $(this).data('hover', oriimg);
                    });
                });


            }

            // smoothscroll
            $('a.scroll').click(function (e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $($.attr(this, 'href')).offset().top - 200
                }, 500);
            });

            // JS handling the Take the Next Step form
            $(".page-template-page-nextstep .gfield_radio label, .page-template-page-nextstep .gfield_checkbox label").click(function (e) {
                e.preventDefault();
                $("#" + $(this).attr("for")).click().change();
            });

            // Status code search
            $("#search-filter").keyup(function () {
                // Retrieve the input field text and reset the count to zero
                var filter = $(this).val().toLowerCase(), count = 0;
                if (filter != '') {
                    // Loop through the comment list
                    $(".status-code .status-code-item").each(function () {
                        // If the list item does not contain the text phrase fade it out
                        if ($(this).attr('id').toLowerCase() != filter) {
                            $(this).fadeOut();
                            // Show the list item if the phrase matches and increase the count by 1
                        } else {
                            $(this).show();
                            count++;
                        }
                        if (count == 0) {
                            $('#search-noresult').show();
                        } else {
                            $('#search-noresult').hide();
                        }
                    });
                } else {
                    $(".status-code .status-code-item").each(function () {
                        $(this).fadeOut();
                    });
                }

            });

            // FAQ
            $('.faq-section h5').on('click', function () {
                var faq_content = $(this).next('.faq-section-answer');
                $(this).toggleClass('showanswer');
                if ($(faq_content).css('display') == 'none') {
                    $(faq_content).slideDown();
                } else {
                    $(faq_content).slideUp();
                }
            });

            // JS handling the Take the Next Step form
            $(document).on('change', function () {
                $('.page-template-page-nextstep .showroom-appointment .nextstep-areyou .gfield_radio input[type="radio"]').each(function () {
                    if ($(this).is(':checked')) {
                        var currentLabel = $(this).siblings('label').find('img').attr('src');
                        if (currentLabel.indexOf("hover") < 0) {
                            var newLabel = currentLabel.replace(/\.[^/.]+$/, "") + '-hover.png';
                            $(this).siblings('label').find('img').attr('src', newLabel);
                        }
                    } else {
                        var currentLabel = $(this).siblings('label').find('img').attr('src');
                        if (currentLabel.indexOf("hover") > 0) {
                            var newLabel = currentLabel.replace("-hover", "");
                            $(this).siblings('label').find('img').attr('src', newLabel);
                        }
                    }
                });
                $('.page-template-page-nextstep .showroom-appointment .gform_book .gfield_radio input[type="radio"][value="Yes"]').each(function () {
                    if ($(this).is(':checked')) {
                        $('.showroom-appointment .to_show').each(function () {
                            if ($(this).hasClass('gf_left_half') || $(this).hasClass('gf_right_half')) {
                                $(this).css('display', 'inline-block');
                            } else {
                                $(this).css('display', 'list-item');
                            }
                        });
                    } else {
                        $('.showroom-appointment .to_show').each(function () {
                            $(this).css('display', 'none');
                        });
                    }
                });
            });

            //Dealer search change - toggle wa, qld and nsw postcode box
            //Detect when the field changes
            $('#region-filter').change(function () {
                // Set up vars
                var selection = $('#region-filter option:selected').val();
                var postCodeWrap = $("#postcode-search");
                var postCodeInput = $('#postcode-search input[name=postcode]');
                var hideEffect = $(postCodeWrap).data('hide-effect'); // corrected to data attribute naming

                if (selection == "qld" || selection == "nsw" || selection == "wa") {
                    // Show/enable the postcode field
                    if (hideEffect == 'hide') {
                        $(postCodeWrap).fadeIn();
                    } else {
                        $(postCodeWrap).show();
                        $(postCodeInput).prop('disabled', false);
                    }

                    // Make postcode field required
                    $(postCodeInput).prop('required', true);
                } else {
                    // Hide/disable the postcode field
                    if (hideEffect == 'hide') {
                        $(postCodeWrap).fadeOut();
                    } else {
                        $(postCodeWrap).hide();
                        $(postCodeInput).prop('disabled', true);
                    }

                    // Reset the field content to blank (so we don't submit the old value)
                    $(postCodeInput).val('');

                    // Remove required attribute from postcode
                    $(postCodeInput).prop('required', false);
                }
            });


            // JS to handle the Find a specialist form
            $('#dealer-search-form #category-filter, #dealer-search-form #region-filter, #dealer-search-inline #category-filter, #dealer-search-inline #region-filter').on('change', function () {

                var catSelected = $('#dealer-search-form #category-filter, #dealer-search-inline #category-filter').val();
                var regionSelected = $('#dealer-search-form #region-filter, #dealer-search-inline #region-filter').val();

                // Don't use postcode search on mylight or myplace
                if (catSelected != 'my-ights' && catSelected != 'myplace' && ((regionSelected == "nsw") || (regionSelected == "qld") || (regionSelected == "wa"))) {
                    $('.page-template-page-specialist-search #postcode-search').show();
                    $('#postcode-search .form-control').prop('disabled', false);
                    $('#postcode-search input').prop('required', true);
                } else {
                    $('.page-template-page-specialist-search #postcode-search').hide();
                    $('#postcode-search .form-control').prop('disabled', true);
                    $('#postcode-search input').val('').prop('required', false);
                }

            });

            // Main Menu Fixed on Scroll
            $(window).on('scroll', function (e) {

                fixed_navigation(e);

            });

            function fixed_navigation(e) {
                //top_bar_offset = $('.top-bar').height();
                top_bar_offset = 0;
                header_offset = $('.header-wrap').height();
                header_offset_mobile = $('.header-mobile').outerHeight();

                if (($(window).width() > 991 && $(window).scrollTop() > top_bar_offset)) {
                    $('.header-wrap').addClass("fixed");
                    // Smooth transition for fixed-menu
                    $('body').css('padding-top', header_offset + 'px');
                } else if ($(window).width() < 991) {
                    $('.header').addClass("fixed");
                    // Smooth transition for fixed-menu
                    $('body').css('padding-top', header_offset_mobile + 'px');
                } else {
                    $('.header-wrap, .header').removeClass("fixed");
                    $('body').css('padding-top', '0');
                }
            }
            fixed_navigation();

            // Mobile Main menu clicks
            $('.mobile-menu-toggle i').on('click', function (e) {
                e.preventDefault();
                var menustate = $('.mobile-main-menu__wrapper').css('opacity');
                var headerheight = $('.header-mobile').outerHeight();
                var additionalheight = 46;
                var totalheight = headerheight + additionalheight;
                var windowheight = $(window).height();
                var menuheight = windowheight - headerheight;
                console.log(menuheight);

                if (menustate == '0') {
                    $('.mobile-main-menu__wrapper').css('opacity', '1').css('height', menuheight).css('top', headerheight + 'px');
                    $(this).removeClass('icon-nav').addClass('icon-close');
                    $('body').css('overflow', 'hidden');
                } else {
                    $('.mobile-main-menu__wrapper').css('opacity', '0').css('height', '0');
                    $(this).removeClass('icon-close').addClass('icon-nav');
                    $('body').css('overflow', '');
                }
            });

            // Mobile Main Menu Submenu add arrows
            $('.mobile-main-menu .menu-item-has-children').each(function () {
                $(this).append('<i class="icon-arrow"></i>');
            });

            // Mobile Main Menu Submenu click
            $('.mobile-main-menu .menu-item-has-children i, .mobile-main-menu .menu-item-has-children a[href="#"]').on('click', function (e) {
                $(this).parent('.menu-item-has-children').toggleClass('open');
                $(this).siblings('.sub-menu').slideToggle();
            });

            // Mobile Footer Menu Submenu add arrows
            $('.default-footer__menu .menu-item-has-children').each(function () {
                $(this).append('<i class="icon-arrow"></i>');
            });

            // Mobile Footer Menu Submenu click
            $('.default-footer__menu .menu-item-has-children i, .default-footer__menu .menu-item-has-children a[href="#"]').on('click', function (e) {
                $(this).parent('.menu-item-has-children').toggleClass('open');
                $(this).siblings('.sub-menu').slideToggle();
            });

            // ignore link click if the href is #
            $('a[href="#"]').on('click', function (e) {
                e.preventDefault();
            });

        },
        banner_adjust: function () {
            if ($('.banner-item-content-img').length > 0) {
                // var bannerHeight = $('.banner-item.withimage').outerHeight();
                // var bannerItemHeight = $('.banner-item.withimage .banner-item-content').outerHeight();
                // var marginBottom = bannerItemHeight - bannerHeight + 20;
                // $('.banner-item.withimage').css('margin-bottom', marginBottom);
            }
        },
        check_youtube: function () {
            if ($('.two-column-item-content-txt iframe[src*="youtube"]').length > 0) {
                var iframeparent = $('.two-column-item-content-txt iframe[src*="youtube"]').parents('.two-column-item-content-txt');
                $(iframeparent).addClass('yt-embed');
            }
        },
        member_adjust: function () {
            var sectionwidth = $('.team-member-section').outerWidth();
            if (sectionwidth < 975) {
                $('.team-member-section-item').each(function () {
                    $(this).css('height', 'auto');
                });
            } else {
                $('.team-member-section-item').each(function () {
                    var panelheight = $(this).data('panelheight');
                    $(this).css('height', panelheight);
                });
            }
        },
        trigger_livechat: function () {
            const triggers = document.querySelectorAll('a.trigger-livechat');
            triggers.forEach(trigger => {
                trigger.addEventListener('click', e => {
                    e.preventDefault();
                    const LiveChatWidget = window.LiveChatWidget;
                    console.log(LiveChatWidget);
                    if (LiveChatWidget !== undefined && LiveChatWidget !== 'undefined') {
                        LiveChatWidget.call("maximize");
                    }
                });

            });

        }
    };
    $(window).on('load', function () {
        Bang_Frontend_JS.banner_adjust();
        Bang_Frontend_JS.member_adjust();
    });
    $(window).resize(function () {
        Bang_Frontend_JS.banner_adjust();
        Bang_Frontend_JS.member_adjust();
    });
    Bang_Frontend_JS.init();
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});


// Custom overlay on body when mobile menu is expanded
document.addEventListener('DOMContentLoaded', function () {
    var menuToggle = document.querySelector('#site-navigation'); // Adjusted selector
    var menuButton = menuToggle.querySelector('.menu-toggle');
    var overlay = document.getElementById('overlay');

    function toggleOverlay() {
        if (menuToggle.classList.contains('toggled')) {
            overlay.style.display = 'block';
        } else {
            overlay.style.display = 'none';
        }
    }

    // Use existing toggle functionality to manage class and overlay
    menuButton.addEventListener('click', function () {
        // Toggle overlay visibility based on existing class toggle
        toggleOverlay();
    });

    document.addEventListener('click', function (e) {
        // Check if the click is outside the menu
        toggleOverlay();
    });

    // Prevent clicks inside the menu from closing it
    menuToggle.addEventListener('click', function (e) {
        e.stopPropagation();
    });
});

//ACF Maps
// Define initMap function and attach it to the global window object
function loadGoogleMapsAPI(callback) {
    // Check if Google Maps API is already loaded
    if (typeof google === 'object' && typeof google.maps === 'object') {
        callback(); // If already loaded, just initialize the map
    } else {
        // Get API key from localized script variable
        var apiKey = (typeof advantageAirConfig !== 'undefined' && advantageAirConfig.googleMapsApiKey)
            ? advantageAirConfig.googleMapsApiKey
            : '';

        if (!apiKey) {
            console.error('Google Maps API key not configured');
            return;
        }

        var script = document.createElement('script');
        script.src = 'https://maps.googleapis.com/maps/api/js?key=' + apiKey;
        script.async = true;
        script.defer = true;

        // Attach the callback to the script's onload event
        script.onload = function () {
            callback();
        };

        document.head.appendChild(script);
    }
}

// Override the window.initMap function
window.initMap = function () {
    try {
        // Loop through all map elements and initialize each one
        jQuery('.acf-map').each(function () {
            var $el = jQuery(this);
            var $markers = $el.find('.marker');
            var lat = parseFloat($markers.data('lat'));
            var lng = parseFloat($markers.data('lng'));

            // Check if lat and lng are valid numbers
            if (isNaN(lat) || isNaN(lng)) {
                console.warn('Invalid coordinates for map:', lat, lng);
                return; // Exit if lat or lng is not valid
            }

            // Set up map options
            var mapArgs = {
                zoom: $el.data('zoom') || 16,
                center: new google.maps.LatLng(lat, lng),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            };

            // Initialize the map
            var map = new google.maps.Map($el[0], mapArgs);

            // Add markers
            $markers.each(function () {
                var markerLat = parseFloat(jQuery(this).data('lat'));
                var markerLng = parseFloat(jQuery(this).data('lng'));

                if (!isNaN(markerLat) && !isNaN(markerLng)) {
                    new google.maps.Marker({
                        position: new google.maps.LatLng(markerLat, markerLng),
                        map: map,
                    });
                }
            });
        });
    } catch (error) {
        console.error('Error initializing Google Maps:', error);
    }
};

// Load Google Maps API and initialize the map when the page is ready
jQuery(document).ready(function () {
    loadGoogleMapsAPI(initMap);
});
