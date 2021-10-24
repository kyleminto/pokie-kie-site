(function($) {
    $(document).ready(function() {

        $('.hamburger').on('click', function() {
            $('.hamburger-wrapper, nav, body').toggleClass('active');
        });

        $('.banner.slick').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplaySpeed: 5000,
            autoplay: true,
            speed: 1000,
            prevArrow: '<div class="arrow prev"><i class="fa fa-chevron-left"></i></div>',
            nextArrow: '<div class="arrow next"><i class="fa fa-chevron-right"></i></div>'
        });

        // Grabs each element on the page that should be animated, if it's not visible then add a 'valid' class

        $('.fade-up').each(function() {
            a = $(this).offset().top;
            b = $(window).scrollTop() + $(window).height();

            (b < a) && $(this).addClass('valid');
        });

        // The CSS column rule breaks the order of elements so this staggers them and sorts them correctly

        if($('.columns.sort').length) {
            if($(window).width() > 767) {
                a = [];
                b = [];
                c = $('.columns.sort');
                posts = $('.item', c);

                for(var i = 0; i < posts.length; i++) {
                    ((i % 2 == 0) ? a : b).push(posts[i]);
                }

                $(c).append(a, b);
            }
        }
    });

    $(window).on('scroll load', function() {

        // Follow on from the .fade-up function; applies the class once visible on screen

        $('.fade-up.valid').each(function() {
            a = $(this).offset().top;
            b = $(window).scrollTop() + $(window).height();

            (b > a) && $(this).css({ 'animation': 'fadeUpSlow 2s', 'animation-fill-mode': 'both' });
        });
    });
})(jQuery);