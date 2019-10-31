/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

	function openingAnimation() {

		if ($(window).width() > 640) {

			var pageIntro   	= $('.page-intro'),
			rightCol 			= $('.right-col'),
			leftCol 			= $('.left-col'),
			animationContainer	= $('.svg-icon-container'),
			aboutHeader			= $('#home-why-create'),
			portfolioHeader		= $('#home-what-create');

			pageIntro.fadeIn().addClass('animated fadeIn');

			if ( portfolioHeader.length > 0 ) {

				rightCol.fadeIn().addClass('fadeInRight');
				leftCol.fadeIn().addClass('fadeInUp');

				setTimeout( function() {
					animationContainer.fadeIn().addClass('animated fadeInRight');
				}, 100);

			}
			else {

				rightCol.fadeIn().addClass('fadeInUp');
				leftCol.fadeIn().addClass('fadeInLeft');

				setTimeout( function() {
					animationContainer.fadeIn().addClass('animated fadeInleft');
				}, 100);

			}

		}

	}

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
		// JavaScript to be fired on all pages

        $(window).load(function() {
			$(".loader-overlay").fadeOut( 'slow', function(){ 
				$('body').removeAttr('id');
			});
		});

		var wrapperMargin = $('.banner').height();
		$('.wrap').css("padding-top", wrapperMargin);

        //blur content

        function timeoutSingleToggle(classname, classtoadd, timeoutime) {
			setTimeout( function(){
				if ( $(classname).hasClass(classtoadd) ) {
					$(classname).removeClass(classtoadd);
				}
				else {
					$(classname).removeClass(classtoadd);
				} 
			}, timeoutime);
		}

		  //Vars
		  
		  var headerBkg 	= $('.banner'),
		  	  navPrimary 	= $('.nav-primary'),
		  	  scrollHeight 	= $(document).scrollTop(),
		  	  windowWidth 	= $(window).width(),
		  	  siteNavMenu	= $('.site-menu'),
		  	  toggleBar		= $('.bar');
		  

		if ($(window).width() < 640) { 
			$('*').removeClass('opaque-hide');
			headerBkg.addClass('active');
		}
		 
		//Header Scroll Functionality
		  
		$(document).scroll(function() {

			if ($(window).width() > 640) {
			
				if (navPrimary.hasClass('active')) {
					headerBkg.removeClass('active');
				}
				else {

					if ($(document).scrollTop() >= 50) {
					  headerBkg.addClass('active');
					} 
					else {
					  headerBkg.removeClass('active');
					}
					
				}
			}
			else {
				headerBkg.addClass('active');
			}

		});
		  
		$(function () {
		
			//Navigation Functionality
			navPrimary.hide();
			
			siteNavMenu.on('click', function() {
				
				//Hamburger icon animation
				
				toggleBar.toggleClass('active');

				//blur content

				setTimeout( function(){
					if ( $('.wrap').hasClass('blur') ) {
						$('.wrap').removeClass('blur');
					}
					else {
						$('.wrap').addClass('blur');
					} 
				}, 300);
				
				//Nav overlay
				
				if (navPrimary.hasClass('active')) {
					navPrimary.removeClass('active fadeInDownBig');
					navPrimary.addClass('animated fadeOutUpBig');
					
					//Check scroll height and Add header background
					
					if ($(document).scrollTop() >= 50) {
						headerBkg.addClass('active').removeClass('disable');
					}
					else {
						headerBkg.removeClass('active').removeClass('disable');
					}
					
				}
				else {
					navPrimary.removeClass('fadeOutUpBig');
					navPrimary.fadeIn().addClass('active animated fadeInDownBig');

					//Add Cool Overlay
					//console.log('hello');

					//Remove header background
					headerBkg.addClass('disable');
				}
				
				//Nav Layout Content
				
				var navLayout = $('.nav-layout');

				if ($(window).width() < 640) {

					if ( navLayout.hasClass('active') ) {
						navLayout.removeClass('active animated fadeInDown');
					}
					else {
						navLayout.fadeIn().addClass('active animated fadeInDown');
					}

				}
				else {

					setTimeout( function(){
						
						if ( navLayout.hasClass('active') ) {
							navLayout.removeClass('active animated fadeInDown');
						}
						else {
							navLayout.fadeIn().addClass('active animated fadeInDown');
						}
						
					}, 650);

				}
				
				//Button Label Animation
				
				var menuLabel =  $('.menu-label');
				
				setTimeout( function(){
					
					if ( menuLabel.hasClass('active') ) {
						menuLabel.hide().removeClass('active');
						menuLabel.fadeIn().addClass('animated bounceIn');
					}
					else {
						menuLabel.hide();
						menuLabel.fadeIn().addClass('active animated bounceIn');
					}
					
				}, 450);
				
			});

		});

		//Portfolio Navigation

		if ( $('.portfolio-navigation').length > 0 ) {

			///wp-json/wp/v2/pages?parent=63

			var urlTarget = "/wp-json/wp/v2/pages?parent=63&per_page=50",
			loadSpinContainer = '<div class="load-spin"> <i class="fa fa-cog fa-spin fa-3x fa-fw"></i> <span class="loading-portfolio-navigation gallery-pulse">Loading Portfolio</span></div>',
			loadSpinSelector = $('.load-spin');

			//Parse portfolio elements

			$('.navigation-tab').on('click', function(e) {

				//blur content

				setTimeout( function(){
					if ( $('.et_builder_outer_content').hasClass('blur') ) {
						$('.et_builder_outer_content').removeClass('blur');
					}
					else {
						$('.et_builder_outer_content').addClass('blur');
					} 
				}, 350);

				$(this).toggleClass('active');
				
				e.preventDefault();
				
				//Portfolio nav overlay
				
				if ( $('.portfolio-navigation-overlay').hasClass('active') ) {
					
					$('.portfolio-navigation-overlay').removeClass('active');
					$('.portfolio-navigation-overlay').addClass('animated fadeOutUp');

					//Check scroll height and Add header background
					
					if ($(document).scrollTop() >= 50) {
						headerBkg.addClass('active');
					}
					else {
						headerBkg.removeClass('active');
					}
					
				}
				else {
					
					$('.portfolio-navigation-overlay').removeClass('fadeOutUp');
					$('.portfolio-navigation-overlay').fadeIn().addClass('active animated fadeInDown');

					//Add Cool Overlay
					//alert('hello');


					//Remove header background
					headerBkg.removeClass('active');
				}

				$.ajax( urlTarget, {
				    type: 'GET',
				    dataType: 'json',
				    beforeSend: function() {

				    	if ( ! $('.portfolio-navigation').hasClass('loaded') ) {
					        $('.portfolio-navigation').append(loadSpinContainer).fadeIn('slow');
					        $('.card').addClass('opaque-hide');
				    	}

				    },
				    success: function( portfolio ) {

				    	if ( ! $('.portfolio-navigation').hasClass('loaded') ) {

					        $('.load-spin').fadeOut('fast');

					        $.each( portfolio , function( index, portfolioListing ) {

									var portfolioBuild = '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">';
									portfolioBuild += '<div class="card opaque-hide">';
									portfolioBuild += '<a href=" ' + portfolioListing.link + ' ">';
								  	portfolioBuild += '<div class="card-block">';
								    portfolioBuild += '<h4 class="card-title">' + portfolioListing.title.rendered + '</h4>';
								  	portfolioBuild += '</div>';
								  	portfolioBuild += '<div class="img-cover"></div>';
								  	portfolioBuild += '<div class="img-blur" style="background-image:url(' + portfolioListing.better_featured_image.source_url + ')!important; background-size:cover!important; background-position:center center;"></div>';
								  	portfolioBuild += '</a>';
									portfolioBuild += '</div>';
									portfolioBuild += '</div>';

									$('.portfolio-navigation').append(portfolioBuild);

									$('.card').each(function(i, obj) {
										setTimeout( function() {
											$('.card:eq('+ i +')').fadeIn('slow').addClass( 'animated fadeIn' );
										}, i * 120);
									});
					            
					        });

				    	}

				        if ( $(window).width() > 640 ) {

				        	var halfWindow 				= $(window).height() / 2,
				        		portfolioWindowHeight 	= $('.portfolio-navigation').height();

				        	if (portfolioWindowHeight > halfWindow) {
				        		$('.portfolio-navigation-overlay').addClass('scroll');
				        	}

				        	$('.card').on({ 
							    mouseenter: function(){
							        $(this).find('.card-block').addClass('active');
							        $(this).find('.img-cover').addClass('gallery-pulse');
							        $(this).find('.img-blur').addClass('blur');
							    },
							    mouseleave: function(){
							        $(this).find('.card-block').removeClass('active');
							        $(this).find('.img-cover').removeClass('gallery-pulse');
							        $(this).find('.img-blur').removeClass('blur');
							    },
							    touchstart: function(){
							        $(this).find('.card-block').addClass('active');
							        $(this).find('.img-cover').addClass('gallery-pulse');
							        $(this).find('.img-blur').addClass('blur');
							    },
							     touchend: function(){
							        $(this).find('.card-block').removeClass('active');
							        $(this).find('.img-cover').removeClass('gallery-pulse');
							        $(this).find('.img-blur').removeClass('blur');
							    }
							});

							$('.card').tilt({
							    scale: 1.05,
							    reset: true,
							    perspective: 1000,
							    transition:  true
							});

						}

						$('.portfolio-navigation').addClass('loaded');
				    },
				    error: function( req, status, err ) {
				        console.log( 'something went wrong', status, err );
				    }
				});

			});

		}



      },
  finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
		// JavaScript to be fired on the home page
		
		particlesJS.load('particles-js', '/wp-content/themes/carbonbased-new/dist/particlesjs-config.json', function() {
			console.log('callback - particles.js config loaded');
		});
	

        //Waypoints for fade in elements

        	var rightCol 		= $('.right-col'),
        		leftCol 		= $('.left-col'),
        		whyRightCol 	= $('#home-why-create .right-col'),
        		whyleftCol 		= $('#home-why-create .left-col'),
        		whatRightCol 	= $('#home-what-create .right-col'),
        		whatLeftCol 	= $('#home-what-create .left-col'),
        		howRightCol		= $('#home-how-create .right-col'),
        		howLeftCol 		= $('#home-how-create .left-col');

	        /**if ( $(window).width() > 640 ) {

	        	$('#home-why-create, #home-what-create, #home-how-create').addClass('opaque-hide');

	        	rightCol.addClass('opaque-hide');
	        	leftCol.addClass('opaque-hide');

				var whyCreate = new Waypoint({
					element: document.getElementById('home-why-create'),
					handler: function(direction) {

						if ( ! whyRightCol.hasClass('fadeInDown') && ! whyleftCol.hasClass('fadeInLeft') ) {
							$('#home-why-create').fadeIn().addClass('animated fadeIn');
							whyRightCol.fadeIn().addClass('fadeInUp');
							whyleftCol.fadeIn().addClass('fadeInLeft');

							setTimeout( function() {
								
								$('#heart').fadeIn().addClass('animated fadeInLeft');
								$('#heart .big-heart').fadeIn().addClass('heartbeat');
								$('#heart path.little-line').fadeIn().addClass('glitter');
								
							}, 100);
						}

					},
					offset: 150
				});

				var whatCreate = new Waypoint({
					element: document.getElementById('home-what-create'),
					handler: function(direction) {

						if ( ! whatRightCol.hasClass('fadeInRight') && ! whatLeftCol.hasClass('fadeInDown') ) {
							$('#home-what-create').fadeIn().addClass('animated fadeIn');
							whatRightCol.fadeIn().addClass('fadeInRight');
							whatLeftCol.fadeIn().addClass('fadeInUp');

							setTimeout( function() {
								
								$('#eye').fadeIn().addClass('animated fadeInRight');
								$('#eye .sliding-eye').fadeIn().addClass('look-around');
								$('#eye path.little-line').fadeIn().addClass('glitter');

							}, 100);
						}

					},
					offset: 250
				});

				var howCreate = new Waypoint({
					element: document.getElementById('home-how-create'),
					handler: function(direction) {

						if ( ! howRightCol.hasClass('fadeInDown') && ! howLeftCol.hasClass('fadeInLeft') ) {
							$('#home-how-create').fadeIn().addClass('animated fadeIn');
							howRightCol.fadeIn().addClass('fadeInUp');
							howLeftCol.fadeIn().addClass('fadeInLeft');

							setTimeout( function() {
								
								$('#brain').fadeIn().addClass('animated fadeInLeft');
								$('#brain path.little-line').fadeIn().addClass('glitter');
								
							}, 100);
							
						}

					},
					offset: 150
				});

			}**/

        // Lead Text 
        
        	var leadText 				= $('.home-lead-text'),
        		leadTextElements 		= $('.home-lead-text').children(),
        		headerAnimationClasses	= "animated fadeInDown",
        		reverseAnimationClasses	= "animated fadeOutUp",
        		scrollArrow				= $('.scroll-arrow'),
        		timeOut 				= 650;

        		function headerAnimationIterator() {
					leadTextElements.each(function(i, obj) {
						setTimeout( function() {
							$(obj).addClass( headerAnimationClasses );		
						}, i * timeOut);
					});
				}

				//First Animation

		if ($(window).width() > 640) {
        		leadText.fadeIn().addClass( headerAnimationClasses );
				scrollArrow.fadeIn();

				headerAnimationIterator();


	        $(document).scroll(function() {

		        if ($(document).scrollTop() > 50) {
		        	leadText.removeClass( headerAnimationClasses );
		        	leadText.fadeOut('slow');
		        	scrollArrow.fadeOut('slow');
				}
				else {
					headerAnimationIterator();
					leadText.fadeIn().addClass( headerAnimationClasses );
					scrollArrow.fadeIn();
				}

			});
	    }
		  
		//Scroll To Element
		  
			$(".scroll").on('click', function(e) {

				e.preventDefault();

				$('html, body').animate({
					scrollTop: $("#home-why-create").offset().top-110
				}, 1000);

			});
  
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about': {
      init: function() {
        // JavaScript to be fired on the about us page

	        //openingAnimation();

			instafetch.init({
				accessToken: '306192029.1677ed0.d982023a5c524df68a810a265fe0f749',
				target: 'instagram-list',
				numOfPics: 4,
				caption: false
			});

      }
    },
    'solutions': {
      init: function() {

      	openingAnimation();

      	if ($(window).width() > 640) {

      		//var ourSolutionsArray = ['#our-expertise','.first-element','.second-element','.third-element','.fourth-element'];

      		/*for(i = 0; i < ourSolutionsArray.length; i++) {
      			$(ourSolutionsArray[i]).addClass('opaque-hide');
      		}

	      	$('.expertise-element').tilt({
			    scale: 1.05,
			    reset: false,
			    perspective: 1000,
			    transition:  true
			});*/

      	}

      	if ($(window).width() > 640) {

	      	/*var expertiseScroll = new Waypoint({
				element: document.getElementById('our-expertise'),
				handler: function(direction) {

					$('#our-expertise').fadeIn().addClass('animated fadeIn');
					$('.first-element').fadeIn().addClass('fadeInDown');

					setTimeout( function() {
						
						$('.second-element').fadeIn().addClass('fadeInDown');		
							
					}, 700);
					setTimeout( function() {
						
						$('.third-element').fadeIn().addClass('fadeInDown');	
							
					}, 1400);
					setTimeout( function() {
						
						$('.fourth-element').fadeIn().addClass('fadeInDown');	
							
					}, 2100);

					this.destroy();
				},
				offset: 600
			});*/

      	}
   
	  }
    },
    'work': {
      init: function() {

	openingAnimation();

	function shuffle(array) {
	var currentIndex = array.length, temporaryValue, randomIndex;

	while (0 !== currentIndex) {

		randomIndex = Math.floor(Math.random() * currentIndex);
		currentIndex -= 1;

		temporaryValue = array[currentIndex];
		array[currentIndex] = array[randomIndex];
		array[randomIndex] = temporaryValue;
	}

	return array;
	}


	// Get Events - /wp-json/wp/v2/pages?parent=63

	var urlTarget = "/wp-json/wp/v2/pages?parent=63&per_page=20&order=asc",
	loadSpinContainer = '<div class="load-spin"> <i class="fa fa-cog fa-spin fa-3x fa-fw"></i> <span class="loading gallery-pulse">Loading Portfolio</span></div>',
	loadSpinSelector = $('.load-spin');

		//Parse portfolio elements

		$.ajax( urlTarget, {
			type: 'GET',
			dataType: 'json',
			beforeSend: function() {
				$('.portfolio-list').append(loadSpinContainer).fadeIn('slow');
				$('.card').addClass('opaque-hide');
			},
			success: function( portfolio ) {

				var portShuffle = shuffle(portfolio);
				
				$('.load-spin').fadeOut('fast');

				$.each( portShuffle , function( index, portfolioListing ) {

						portfolioBuild = '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">';
						portfolioBuild += '<div class="card opaque-hide">';
						portfolioBuild += '<a href=" ' + portfolioListing.link + ' ">';
						portfolioBuild += '<div class="card-block">';
						portfolioBuild += '<h4 class="card-title">' + portfolioListing.title.rendered + '</h4>';
						portfolioBuild += '</div>';
						portfolioBuild += '<div class="img-cover"></div>';
						portfolioBuild += '<div class="img-blur" style="background-image:url(' + portfolioListing.better_featured_image.source_url + ')!important; background-size:cover!important; background-position:center center;"></div>';
						portfolioBuild += '</a>';
						portfolioBuild += '</div>';
						portfolioBuild += '</div>';

						$('.portfolio-list').append(portfolioBuild);

						$('.card').each(function(i, obj) {
							setTimeout( function() {
								$('.card:eq('+ i +')').fadeIn('slow').addClass( 'animated fadeIn' );
							}, i * 120);
						});
				});

				if ( $(window).width() > 640 ) {

					$('.card').on({ 
						mouseenter: function(){
							$(this).find('.card-block').addClass('active');
							$(this).find('.img-cover').addClass('gallery-pulse');
							$(this).find('.img-blur').addClass('blur');
						},
						mouseleave: function(){
							$(this).find('.card-block').removeClass('active');
							$(this).find('.img-cover').removeClass('gallery-pulse');
							$(this).find('.img-blur').removeClass('blur');
						},
						touchstart: function(){
							$(this).find('.card-block').addClass('active');
							$(this).find('.img-cover').addClass('gallery-pulse');
							$(this).find('.img-blur').addClass('blur');
						},
							touchend: function(){
							$(this).find('.card-block').removeClass('active');
							$(this).find('.img-cover').removeClass('gallery-pulse');
							$(this).find('.img-blur').removeClass('blur');
						}

					});

				}

			},
			error: function( req, status, err ) {
				console.log( 'something went wrong', status, err );
			}
		});

    },
    'blog': {
     
    },
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
