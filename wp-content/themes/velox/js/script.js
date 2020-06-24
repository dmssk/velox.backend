jQuery(document).ready(function () {

    jQuery('.select-bicycle').on('submit', function () {
        let url = window.location.origin + '/shop/?swoof=1&';

        let min_price = jQuery(this).find('.min_price').val();
        let max_price = jQuery(this).find('.max_price').val();
        let pa_gender = jQuery(this).find('.pa_gender option:selected').val();
        let pa_diameter = jQuery(this).find('.pa_diameter option:selected').val();


        jQuery(this).find('input').filter(function () {
            return !this.value;
        }).addClass("error");

        jQuery(this).find('input').filter(function () {
            return this.value;
        }).removeClass("error");


        if (jQuery(this).find('input').hasClass('error')) {
            return false;
        }

        url = `${url}&min_price=${min_price}&max_price=${max_price}&pa_gender=${pa_gender}&pa_diameter=${pa_diameter}`;

        window.location.href = url;

        return false;
    });

    jQuery(document).on('click', '.site-navigation a[href^="#"]', function (event) {
        event.preventDefault();
        let id = event.target.getAttribute('href')
            || event.target.closest('a').getAttribute('href');


        if (!jQuery(id).length) {
            window.location.href = window.location.origin + '/' + id;
            return;
        }

        jQuery('html, body').animate({
            scrollTop: jQuery(jQuery.attr(this, 'href')).offset().top
        }, 500);
    });


    jQuery('section.related .products').slick({
        arrows: true,
        dots: false,
        autoplay: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 430,
                settings: {
                    slidesToShow: 1
                }
            },
        ]
    });
});


