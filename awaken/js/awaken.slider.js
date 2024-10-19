const awakenSwiper = new Swiper('.awaken-swiper', {
	effect: 'fade',
	loop: true,
	speed: 600,
	autoplay: {
		delay: 6000,
		disableOnInteraction: false,
		pauseOnMouseEnter: true
	},

	// Navigation arrows
	navigation: {
	  nextEl: '.awaken-swiper-button-next',
	  prevEl: '.awaken-swiper-button-prev',
	},
	containerModifierClass: 'awaken-swiper-',
	noSwipingClass: 'awaken-swiper-no-swiping',
	slideActiveClass: 'awaken-swiper-slide-active',
	slideBlankClass: 'awaken-swiper-slide-invisible-blank',
	slideClass: 'awaken-swiper-slide',
	slideDuplicateActiveClass: 'awaken-swiper-slide-duplicate-active',
	slideDuplicateClass: 'awaken-swiper-slide-duplicate',
	slideDuplicateNextClass: 'awaken-swiper-slide-duplicate-next',
	slideDuplicatePrevClass: 'awaken-swiper-slide-duplicate-prev',
	slideNextClass: 'awaken-swiper-slide-next',
	slidePrevClass: 'awaken-swiper-slide-prev',
	slideVisibleClass: 'awaken-swiper-slide-visible',
	wrapperClass: 'awaken-swiper-wrapper'
});