jQuery(document).ready( function() {
	
	// Mobile Menu
	$('#menu').slicknav({
		label: '',
	});
	
	// Dropdown
	$(".dropdown").hover(function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('span', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('span', this).toggleClass("caret caret-up");                
    });
	
	$("#owl-1").owlCarousel({
		items : 4,
		lazyLoad : true,
		navigation : false,
		pagination : true,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [991,2],
		itemsTablet: [768,1],
		itemsMobile : [479,1]
	});
	
	$("#owl-2").owlCarousel({
		items : 2,
		lazyLoad : true,
		navigation : false,
		pagination : true,
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [980,1],
		itemsTablet: [768,1],
		itemsMobile : [479,1]
	});
	
	$("#owl-3").owlCarousel({
		items : 4,
		lazyLoad : true,
		navigation : true,
		pagination : false,
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [980,2],
		itemsTablet: [768,2],
		itemsMobile : [479,1],
		navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
	});
	
	$("#owl-4").owlCarousel({
		items : 3,
		lazyLoad : false,
		navigation : false,
		pagination : false,
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [980,3],
		itemsTablet: [768,3],
		itemsMobile : [479,2]
	});
	
	$('.bxslider2').bxSlider({
		minSlides: 1,
		maxSlides: 3,
		slideWidth: 206,
		slideMargin: 25,
		pager: false,
		auto: true,
		pause: 5000,
		speed: 500,
		responsive: true
	});
	
	$(document).ready(function(){
		  $('.bxslider').bxSlider({
			mode: 'vertical',
			slideMargin: 40,
			pagerCustom: '#bx-pager',
			auto: true,
			pause: 3000,
			speed: 500
		  });
		 
		});
	
	// Custom Select
	$(".custom-select").each(function() {
	  var classes = $(this).attr("class"),
		  id      = $(this).attr("id"),
		  name    = $(this).attr("name");
	  var template =  '<div class="' + classes + '">';
		  template += '<span class="custom-select-trigger">' + $(this).attr("name") + '</span>';
		  template += '<div class="custom-options">';
		  $(this).find("option").each(function() {
			template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
		  });
	  template += '</div></div>';
	  
	  $(this).wrap('<div class="custom-select-wrapper"></div>');
	  $(this).hide();
	  $(this).after(template);
	});
	
	$(".custom-option:first-of-type").hover(function() {
	  $(this).parents(".custom-options").addClass("option-hover");
	}, function() {
	  $(this).parents(".custom-options").removeClass("option-hover");
	});
	
	$(".custom-select-trigger").on("click", function(e) {
	  $('html').on('click',function() {
		$(".custom-select").removeClass("opened");
	  });
	  $(this).parents(".custom-select").toggleClass("opened");
	  e.stopPropagation();
	});
	
	$(".custom-option").on("click", function() {
	  $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
	  $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
	  $(this).addClass("selection");
	  $(this).parents(".custom-select").removeClass("opened");
	  $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
	});
	
	
	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
		disableOn: 0,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,

		fixedContentPos: false
	});
	
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small>by Vedant Lms</small>';
			}
		}
	});
	
	$('#buttonsearch').click(function(){
				$('#formsearch').slideToggle( "fast",function(){
					 $( '#content' ).toggleClass( "moremargin" );
				} );
				$('#searchbox').focus()
				$('.openclosesearch').toggle();
	});
	
	
});