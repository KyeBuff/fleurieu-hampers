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

	$('#show-cart').on('click', function() {
		const cartPreview = $('.cart-preview');
		if(cartPreview.hasClass('d-none')) {
			cartPreview.removeClass('d-none');
			cartPreview.hide();
		}
		cartPreview.fadeIn();
	});

	$('#close-cart').on('click', function() {
		$('.cart-preview').fadeOut();
	});

					
	$('.btn-action').on('click', function(e) {
		e.preventDefault();
		$(this).next().toggleClass('hide-form-meta-field');
	});
});