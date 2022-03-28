// <!-- owl-carousel java script for Testimonial-->

        $('.client-says').owlCarousel({
            loop: false,
            margin: 0,
            autoplay: true,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })

        var owl = $('.client-says');
        owl.owlCarousel();
        // Go to the next item
        $('.customnextbtn').on(function() {
                owl.trigger('next.owl.carousel');
            })
            // Go to the previous item
        $('.customprevbtn').on(function() {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            owl.trigger('prev.owl.carousel', [300]);
        })
