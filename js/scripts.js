// DOM Ready

jQuery(function() {
	
	// SVG fallback
	// toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script#update
	// if (!Modernizr.svg) {
	// 	var imgs = document.getElementsByTagName('img');
	// 	var dotSVG = /.*\.svg$/;
	// 	for (var i = 0; i != imgs.length; ++i) {
	// 		if(imgs[i].src.match(dotSVG)) {
	// 			imgs[i].src = imgs[i].src.slice(0, -3) + "png";
	// 		}
	// 	}
	// }

	$(window).load(function() {
	  // The slider being synced must be initialized first
	  // $('#thumbs').flexslider({
	  //   animation: "fade",
	  //   controlNav: false,
	  //   animationLoop: false,
	  //   slideshow: false,
	  //   itemWidth: 80,
	  //   itemMargin: 5,
	  //   asNavFor: '#slider'
	  // });
	   
	  // SLIDER HOME
	  $('#slider').flexslider({
	    animation: Modernizr.touch ? "slide" : "fade",
	    controlNav: "thumbnails",
	    directionNav : false,
	    animationLoop: true,
	    slideshow: true
	  });


	  // POPUP CONNEXION
	  $('.open-popup-link').magnificPopup({
		  type:'inline',
		  removalDelay: 500,
		  midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
	  	  callbacks: {
		    beforeOpen: function() {
		       this.st.mainClass = this.st.el.attr('data-effect');
		    }
		  },
	  });
	});
});