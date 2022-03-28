jQuery(document).ready(function ($) {
    $('#home-banner-carousel').owlCarousel({
        items: 1,
        lazyLoad: true,
        lazyLoadEager: 1,
        loop: true,
        margin: 10,
        autoHeight: true
    });
    $("#course-control-carousel").owlCarousel({
        responsive: {
            0: {
                items: 3
            },
            425: {
                items: 4
            },
            512: {
                items: 5
            },
        },
        loop: false,
        dots: false,
        margin: 5,
        nav: false,
        lazyLoad: true,
        lazyLoadEager: 1,
    });
    $("#section-banner-carousel").owlCarousel({
        responsive: {
            0: {
                items: 1
            },
        },
        lazyLoad: true,
        lazyLoadEager: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        smartSpeed: 300,
        dots: true,
        nav: false,
        margin: 00,
    });
    $("section.section-product.product .owl-carousel").owlCarousel({
        responsive: {
            0: {
                items: 2
            },
            575: {
                items: 2
            },
            768: {
                items: 3
            },
            991: {
                items: 4
            },
            1200: {
                items: 5
            },
        },
        lazyLoad: true,
        lazyLoadEager: 1,
        loop: false,
        dots: false,
        nav: true,
        navText: ['<span><img src="/enduser/assets/icons/icon-angle-left-gray.svg" alt=""/></span>', '<span><img src="/enduser/assets/icons/icon-angle-right-gray.svg" alt=""/></span>'],
        margin: 15,
    });
    $("section.section-events .owl-carousel").owlCarousel({
        responsive: {
            0: {
                items: 2
            },
            575: {
                items: 2
            },
            768: {
                items: 3
            },
        },
        lazyLoad: true,
        lazyLoadEager: 1,
        loop: false,
        dots: false,
        nav: true,
        navText: ['<span><img src="/enduser/assets/icons/icon-angle-left-gray.svg" alt=""/></span>', '<span><img src="/enduser/assets/icons/icon-angle-right-gray.svg" alt=""/></span>'],
        margin: 15,
    });
    $("section.section-product.product-lists-carousel .owl-carousel").owlCarousel({
        responsive: {
            0: {
                items: 2
            },
            575: {
                items: 2
            },
            768: {
                items: 3
            },
        },
        lazyLoad: true,
        lazyLoadEager: 1,
        loop: false,
        dots: false,
        nav: true,
        navText: ['<span><img src="/enduser/assets/icons/icon-angle-left-gray.svg" alt=""/></span>', '<span><img src="/enduser/assets/icons/icon-angle-right-gray.svg" alt=""/></span>'],
        margin: 15,
    });
    $("#result-carousel-section").owlCarousel({
        responsive: {
            0: {
                items: 1
            },
            575: {
                items: 2
            },
            768: {
                items: 3
            },
        },
        lazyLoad: true,
        lazyLoadEager: 1,
        navText: ["<img src='/enduser/assets/icons/icon-angle-left.svg' />", "<img src='/enduser/assets/icons/icon-angle-right.svg' />"],
        loop: false,
        dots: false,
        nav: true,
        margin: 15,
    });
    $("#result-carousel-section-2").owlCarousel({
        responsive: {
            0: {
                items: 2
            },
            575: {
                items: 3
            },
            768: {
                items: 4
            },
        },
        lazyLoad: true,
        lazyLoadEager: 1,
        navText: ["<img src='/enduser/assets/icons/icon-angle-left.svg' />", "<img src='/enduser/assets/icons/icon-angle-right.svg' />"],
        loop: false,
        dots: false,
        nav: true,
        margin: 15,
    });
    $("#creator-carousel-section").owlCarousel({
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
        },
        lazyLoad: true,
        lazyLoadEager: 1,
        navText: ["<img src='/enduser/assets/icons/icon-angle-left.svg' />", "<img src='/enduser/assets/icons/icon-angle-right.svg' />"],
        loop: false,
        dots: false,
        nav: true,
        margin: 15,
    });
    $("#carousel-section-teachers").owlCarousel({
        responsive: {
            0: {
                items: 1
            },
            575: {
                items: 2
            },
            991: {
                items: 3
            },
        },
        lazyLoad: true,
        lazyLoadEager: 1,
        loop: false,
        dots: true,
        nav: false,
        margin: 15,
    });
});
