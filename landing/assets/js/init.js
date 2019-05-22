$(function() {
    
    // variable contains the settings to reveal animation
    var ANIMATION_SETTINGS = {
        // whether to re-show elements, when scrolling nearly them
        reset: true,
        // enable or disable animations
        isTurnedOn: true,
        // enable or disable animations in small screen
        isShowOnMobile: false
    };
    // variable sets the length of the animation when menu toggle
    var MENU_TOGGLE_ANIMATION_LENGTH = 800;
    // variable sets the delay of the animation in the updates section
    var UPDATES_ANIMATION_LENGTH = 2000;    
    // variable contains the url of main video
    var MAIN_VIDEO_URL = '//youtu.be/HC7hXhrpksg';   
    // variable contains the url of updates video
    var UPDATES_VIDEO_URL = '//youtu.be/HC7hXhrpksg';

    var $root = $('body');
    
    init();
    
    function init()
    {
        initLogo();
        initNavigation();
        initScreenshotCarusel();
        initVideoModal();
        initReviewsCarusel();
        initPricing();
        initUpdatesSection();
        initUpdatesModal();
        initConactsForm();
        intiReveal();
        initDesktopCarusel();
    }
    
    //method initializes the animation logo at startup
    function initLogo()
    {
        var $navbarBrand = $('.navbar-brand');
        
        $(document).scroll(function () {
             var scrollPosition = $(window).scrollTop();
             var logoPosition = $navbarBrand.offset().top;
             
             if(scrollPosition < logoPosition) {
                $navbarBrand.removeClass('small');
             } else {
                $navbarBrand.addClass('small');
             }
        });
    }
    
    //metho initializes navigation
    function initNavigation()
    {
        var $navWrapper = $('.nav-wrapper');
        var $navbar = $('.navbar');
        var $navLinks = $navWrapper.find('li > a');
        var $navBtnOpen = $navbar.find('.btn-nav-open');
        
        //hide navigation in desctop version
        $navWrapper.find('.btn-nav-close').on('click', function(){
            $navWrapper.addClass('closed');
            $navBtnOpen.removeClass('closed');
        });
        
        //show navigation in desctop version
        $navBtnOpen.on('click', function () {
            $navWrapper.removeClass('closed')
                       .addClass('animate');
            setTimeout(function() {
                $navWrapper.removeClass('animate');
            }, MENU_TOGGLE_ANIMATION_LENGTH);
            $navBtnOpen.addClass('closed');
        });
        
        //scrolling to section when user click on the nav link
        $navLinks.on('click', function() {
            var href = $(this).attr('href');
            
            if (!$(this).hasClass('dropdown-toggle')) {
                $root.animate({scrollTop: $(href).offset().top}, 'slow', function () {
                    window.location.hash = href;
                });
                return false;
            }
            return true;
        });
        
        //added backround to navigation when it open, in mobyle version
        $navbar.find('.navbar-toggle').on('click', function () {
            $navbar.toggleClass('opened');
        });
    }
    
    //method initializes screenshot carousel
    function initScreenshotCarusel()
    {
        var $carousel = $('.screenshot-carousel');
        var $carouselItems;
        var $carouselImgs;
        var startPosition = Math.floor($carousel.children().length / 2);
        var inaccuracy;
        
        //initializes carousel
        $carousel.owlCarousel ({
            items: 1,
            startPosition: startPosition,
            loop: true,
            center: true,
            mouseDrag: false,
            smartSpeed: 500,
            dotsSpeed: 500,
            responsive: {
                767: {
                    items: 2
                },
                991: {
                    items: 3
                },
                1199: {
                   items: 4
                },
                1599: {
                    items: 5
                }
            }
        });
        
        $carouselItems = $carousel.find('.owl-item');
        $carouselImgs = $carouselItems.find('.image-holder');
        inaccuracy = $carouselItems.filter('.cloned').length / 2;
        
        //adds class on time carousel movement
        $carousel.on('translate.owl.carousel', function () {
            $carouselImgs.addClass('translate');
        });
        
        //removes the transparency of the active elements
        $carousel.on('translated.owl.carousel', function (event) {
            var $centerItem = $carousel.find('.center');
            
            $carouselImgs.removeClass('translate');
            $carousel.find('.neighbor').removeClass('neighbor');
            $centerItem.prev().addClass('neighbor');
            $centerItem.next().addClass('neighbor');
        }).trigger('translated.owl.carousel');
        
        //moving carousel when clicked on an item
        $carouselItems.on('click', function(){
            var itemIndex = $carouselItems.index(this) - inaccuracy;
            $carousel.trigger('to', itemIndex);
        });
    }
    
    //method initializes desctop carousel
    function initDesktopCarusel()
    {
        var $carousel = $('.desktop-carousel');
        var $carouselItems;
        var startPosition = Math.floor($carousel.children().length / 2);
        var inaccuracy;
        
        //initializes carousel
        $carousel.owlCarousel ({
            items: 1,
            startPosition: startPosition,
            loop: true,
            center: true,
            mouseDrag: false,
            smartSpeed: 500,
            dotsSpeed: 500,
            responsive: {
                1800: {
                    items: 2
                },
                3000: {
                    items: 3
                },
                4000: {
                    items: 5
                }
            }
        });
        
        $carouselItems = $carousel.find('.owl-item');
        inaccuracy = $carouselItems.filter('.cloned').length / 2;
        
        //moving carousel when clicked on an item
        $carouselItems.on('click', function(){
            var itemIndex = $carouselItems.index(this) - inaccuracy;
            $carousel.trigger('to', itemIndex);
        });
    }
    
    //init video modal
    function initVideoModal ()
    {
        var $modal = $('.modal-video');
        var modalPlayer;
        
        //init video
        $modal.find('.modal-body').append(getVideoContent('video-main', MAIN_VIDEO_URL));
        
        if($modal.find('#video-main').length) {
            modalPlayer = videojs('video-main');

            //set url for video
            modalPlayer.src(MAIN_VIDEO_URL);
        }
        //stop video when modal closed
        $modal.on('hidden.bs.modal', function () {
            if(modalPlayer) {
                modalPlayer.pause();
            }
        });
    }
    
    //init review carousel
    function initReviewsCarusel()
    {
        var $carousel = $('.reviews-carousel');
        
        $carousel.owlCarousel({
            items: 1,
            loop: true,
            center: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplaySpeed: 700,
            dragEndSpeed: 700,
            smartSpeed: 700,
            mouseDrag: false,
            responsive:{
                767:{
                    items: 2
                },
                1199: {
                   items: 3
                }
            }
        });
        
        addCarouselMoving($carousel);
    } 
    
    //init pricing section
    function initPricing()
    {
        var $pricing = $('.pricing-content');
        var $pricingBtns = $pricing.find('.btn-show');
        
        //show/hide description on offers
        $pricingBtns.on('click', function() {
            var $btn = $(this);
            var $btnIcon = $btn.find('.icon');
            var $desc = $btn.siblings('.offer-description');
            
            if($btnIcon.hasClass('fa-chevron-down')) {
                $desc.slideDown();
            } else {
                $desc.slideUp();
            }
            $btnIcon.toggleClass('fa-chevron-down fa-chevron-up');
            
            setTimeout(function () {
                $(window).trigger('resize').trigger('scroll');
            }, 350);
        });
    }
    
    //init updates section
    function initUpdatesSection ()
    {
        var $updatesSection = $('.section-updates');
        var $updatesContent = $updatesSection.find('.updates-content');
        var $stepCenterBottom = $updatesSection.find('.step-center-bottom');
        
        //init animation in updates section
        if($updatesSection.length) {
            $(document).scroll(function () {
                var scrollPosition = $(window).scrollTop();
                var sectionPosition = $updatesContent.offset().top;
                var sectionCenterPosition = $stepCenterBottom.offset().top;

                if(scrollPosition > sectionPosition - $(window).height() + 200) {
                    $updatesSection.addClass('active');
                    setTimeout(function () {
                        $updatesSection.addClass('active-finish');
                    }, UPDATES_ANIMATION_LENGTH);
                }

                if (scrollPosition > sectionCenterPosition - $(window).height() + 200) {
                    $updatesSection.addClass('active-next');
                }
            }).trigger('scroll');
        }
    }
    
    //init modal
    function initUpdatesModal ()
    {
        var $modal = $('.modal-updates');
        var modalPlayer;
        
        //init video
        $modal.find('.modal-body').append(getVideoContent('video-updates', UPDATES_VIDEO_URL));
        
        if($modal.find('#video-updates').length) {
            modalPlayer = videojs('video-updates');

            //set url for video
            modalPlayer.src(UPDATES_VIDEO_URL);
        }
        //stop video when modal closed
        $modal.on('hidden.bs.modal', function () {
            if(modalPlayer) {
                modalPlayer.pause();
            }
        });
    }
    
    //init contact form
    function initConactsForm()
    {
        var $contactForm = $('.contact-form');
        
        //validation rules
        var validator = $contactForm.validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 256,
                    minlength: 2
                },
                email: {
                    required: true,
                    minlength: 3,
                    maxlength: 100,
                    email: true
                },
                website: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },
                message: {
                    required: true,
                    minlength: 3,
                    maxlength: 500
                }
            }
        });
        
        //form validation
        $contactForm.on('submit', function() {
            return validator.form();
        });
    }
    
    //init reveal
    function intiReveal()
    {
        var scrollReveal = ScrollReveal({
            distance: '100px',
            reset: ANIMATION_SETTINGS.reset,
            mobile: ANIMATION_SETTINGS.isShowOnMobile
        });
        
        if(ANIMATION_SETTINGS.isTurnedOn) {
            scrollReveal.reveal('.reveal-top', {
                origin: 'top'
            });
            scrollReveal.reveal('.reveal-right', {
                origin: 'right'
            });
            scrollReveal.reveal('.reveal-bottom', {
                origin: 'bottom'
            });
            scrollReveal.reveal('.reveal-left', {
                origin: 'left'
            });
            scrollReveal.reveal('.reveal-animate', { 
                duration: 1000 
            }, 50);
        }
        
    }
    
    //moving review carousel when clicked on an item
    function addCarouselMoving($carousel)
    {
        $carousel.find('.owl-item').on('click', function(){
            if($(this).prev().hasClass('center')) {
                $carousel.trigger('next.owl.carousel');
            } else if ($(this).next().hasClass('center')) {
                $carousel.trigger('prev.owl.carousel');
            }
        });
    }
    
    //return video tag
    function getVideoContent (videoId, videoUrl)
    {
        return '<video id="' + videoId + '" class="video video-js" controls preload="auto" width="640" height="264"' 
                + 'data-setup=\'{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "' + videoUrl + '"}], "youtube": { "iv_load_policy": 1 } }\'>'
                + '<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that' 
                + '<a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p></video>';
    }
});