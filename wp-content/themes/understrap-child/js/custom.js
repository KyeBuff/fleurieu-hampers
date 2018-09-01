jQuery(document).ready(function() {

	let $ = jQuery;
	$('.featured-products__carousel').slick({
	  dots: true,
	  infinite: false,
	  speed: 300,
	  slidesToShow: 4,
	  slidesToScroll: 4,
	  responsive: [
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 576,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
	});

	$('.main__carousel').slick({
		infinite: false,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
	});

	$('.additional-info__toggle').on('click', function() {
		const button = $(this);
		const icon = button.children();
		const isPlus = icon.text() === '+';

		if(isPlus) {
			icon.text('-');
			button.next().removeClass('d-none');

		} else {
			icon.text('+');
			button.next().addClass('d-none');
		}
	});

	const cartPreview = $('.cart-preview');

	const closeCart = $('#close-cart');

	$('#show-cart').on('click', function() {
		cartPreview.toggleClass('slide-in');
	});

	closeCart.on('click', function() {
		closeCart.toggleClass('rotate-left');
		cartPreview.toggleClass('slide-in');
	});


	$('.cart-preview__overlay').on('click', function() {
		closeCart.toggleClass('rotate-left');
		cartPreview.toggleClass('slide-in');
	});

	$('.btn-action').on('click', function(e) {
		e.preventDefault();
		$(this).next().toggleClass('hide-form-meta-field');
	});


	// Sticky footer 
	const body = $('body'),
	bodyHeight = body.height(),
	footer = $('.footer-wrapper');

	footer.offset({top: bodyHeight - footer.height()});

});