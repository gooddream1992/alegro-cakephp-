$(document).ready(function () {
    $('.filters-list .title').on('click', function () {
        var target = $(this).attr('data-target');
        $(target).slideToggle();
    });

    function resize() {
        if ($(window).width() < 768) {
            $('.btn-change').insertAfter('.booking-selected');
            // $('.tarif .boxT.active').removeClass('active');
            // $('.tarif .boxT').wrap('div');
        } else {
            $('.btn-change').appendTo('.desktop-change');
            //$('.tarif .boxT:nth-child(2)').addClass('active');

            //$('.tarif .boxT').unwrap('div');
        }
    }
    resize();
    $(window).resize(function () {
        resize();
    });



    MakeSlider();
    $(window).resize(MakeSlider);

    function MakeSlider() {
        var target = $('.tarif');
        if ($(window).width() > 767) {
            if (target.hasClass('slick-initialized'))
                target.slick('unslick');
        } else {
            if (!target.hasClass('slick-initialized'))
                target.slick({
                    arrows: false,
                    dots: true,
                    centerMode: false,
                    centerPadding: "20px"
                });
        }

    }

    $('#logo').on('click', function () {
        var parent = $(this).parents('#summary');
        if (parent.hasClass('open')) {
            parent.width(0);
            parent.removeClass('open');
        }else{
            parent.width(270);
            parent.addClass('open');
        }
    });
});
