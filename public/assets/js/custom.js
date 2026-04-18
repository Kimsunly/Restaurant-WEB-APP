// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var yearElement = document.querySelector("#displayYear");
    if (yearElement) {
        yearElement.innerHTML = currentYear;
    }
}

getYear();


// isotope js
$(window).on('load', function () {
    if (!$.fn.isotope || !$('.grid').length) {
        return;
    }

    var $grid = $(".grid").isotope({
        itemSelector: ".all",
        percentPosition: false,
        masonry: {
            columnWidth: ".all"
        }
    });

    $('.filters_menu li').click(function () {
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');

        var data = $(this).attr('data-filter');
        $grid.isotope({
            filter: data
        });
    });
});

// nice select
$(document).ready(function () {
    if ($.fn.niceSelect && $('select').length) {
        $('select').niceSelect();
    }
});

/** google_map js **/
function myMap() {
    var mapElement = document.getElementById("googleMap");
    if (!mapElement || typeof google === 'undefined' || !google.maps) {
        return;
    }

    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(mapElement, mapProp);
}

// hero carousel
$(document).ready(function () {
    var $heroCarousel = $('#customCarousel1');

    if ($.fn.carousel && $heroCarousel.length) {
        var itemCount = $heroCarousel.find('.carousel-item').length;
        var shouldCycle = itemCount > 1;

        $heroCarousel.carousel({
            interval: shouldCycle ? 5000 : false,
            pause: false,
            wrap: shouldCycle
        });

        if (shouldCycle) {
            $heroCarousel.carousel('cycle');
        }
    }
});

// client section owl carousel
if ($.fn.owlCarousel && $(".client_owl-carousel").length) {
    $(".client_owl-carousel").owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        nav: true,
        navText: [],
        autoplay: true,
        autoplayHoverPause: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });
}
