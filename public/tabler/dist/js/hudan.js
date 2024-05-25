(function ($) {
    "use strict";
    $(document).ready(function () {
        $(".product-carousel").owlCarousel({
            autoplay: true,
            smartSpeed: 1000,
            margin: 25,
            loop: true,
            center: true,
            dots: false,
            nav: true,
            navText: [
                '<i class="fa-solid fa-chevron-left"></i>',
                '<i class="fa-solid fa-chevron-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    });

    // script.js
const items = document.querySelectorAll('.item');
let currentIndex = 0;

document.querySelector('.next-btn').addEventListener('click', function () {
    items[currentIndex].classList.remove('active');
    currentIndex = (currentIndex + 1) % items.length;
    items[currentIndex].classList.add('active');
});

document.querySelector('.prev-btn').addEventListener('click', function () {
    items[currentIndex].classList.remove('active');
    currentIndex = (currentIndex - 1 + items.length) % items.length;
    items[currentIndex].classList.add('active');
});



})(jQuery);

