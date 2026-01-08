document.addEventListener('DOMContentLoaded', function () {
    const swiperElement = document.querySelector('.mySwiper');

    if (swiperElement) {
        const swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            slidesPerGroup: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            breakpoints: {
                360: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    slidesPerGroup: 1,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                    slidesPerGroup: 1,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    slidesPerGroup: 1,
                }
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        // Attach event listeners for the buttons
        const prevButton = document.querySelector('.swiper-button-prev');
        const nextButton = document.querySelector('.swiper-button-next');

        if (prevButton && nextButton) {
            prevButton.addEventListener('click', () => {
                swiper.slidePrev();
            });

            nextButton.addEventListener('click', () => {
                swiper.slideNext();
            });
        } else {
            console.error('Swiper navigation buttons not found.');
        }
    } else {
        console.log('Swiper element not found on this page.');
    }
});
