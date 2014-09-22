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
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages

      //Page load
      jQuery(window).load(function () {

          $('#status').delay(300).fadeOut('slow');
          $('#preloader').delay(300).fadeOut('slow');
          $('body').delay(300).css({'overflow':'visible'});

      }); //End page load

      //Document Ready
      $(document).ready(function() {

        //buttons
        $('a.leave').click(function() {
          $("#preloader").fadeIn('slow');
          $('body').delay(300).css({'overflow':'visible'});
        });
        $('span.search-open').click(function() {
          $("#searcher").addClass('showme').fadeIn('slow');
        });
        $('span.search-close').click(function() {
          $("#searcher").removeClass('showme').fadeOut('slow');
        });
        //Lazy Load
        $("img.lazy").unveil(200, function() {
          $(this).load(function() {
            this.style.opacity = 1;
          });
        });
        // jQuery to collapse the navbar on scroll
        $(window).scroll(function() {
            if ($(".navbar").offset().top > 50) {
                $(".navbar-fixed-top").addClass("top-nav-collapse");
            } else {
                $(".navbar-fixed-top").removeClass("top-nav-collapse");
            }
        });
        //Same height
        $('.fix-height').matchHeight();

        //Sharing button
        var completed = 0;
        var windowLocation = window.location.href.replace(window.location.hash, '');

        //facebook
        function facebookShare() {
          window.open('https://www.facebook.com/sharer/sharer.php?u=' + windowLocation, "facebookWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0");
          return false;
        }
        $('.facebook-share').click(facebookShare);

        //Google Plus
        function googlePlusShare() {
          window.open('https://plus.google.com/share?url=' + windowLocation, "googlePlusWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0");
          return false;
        }
        $('.google-plus-share').click(googlePlusShare);

        //Twitter
        function twitterShare() {
        var $pageTitle = encodeURIComponent($("h1").text());
        window.open('http://twitter.com/intent/tweet?text=' + $pageTitle + ' ' + windowLocation, "twitterWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0");
          return false;
        }
        $('.twitter-share').click(twitterShare);

        //affix
        $('.ff-affix').affix({
          offset: {
            top: 140,
            bottom: function() {
              return  (this.bottom = $('#comments').outerHeight(true) );
            }
          }
        });


	  }); //End document ready

    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
      $(document).ready(function() {

        //random color
        $(".b-wrapper").each(function() {
          var colors = Please.make_color({
            colors_returned: 4,
            hue: 12, //set your hue manually
          });
          var rand = Math.floor(Math.random()*colors.length);
          $(this).css("background-color", colors[rand]);
        });
        //slide carousel
        $('.slide_carousel').each(function() {
          $(this).slick({
            centerMode: true,
            centerPadding: '20px',
            slidesToShow: 3,
            lazyLoad: 'ondemand',
            responsive: [
              {
                breakpoint: 768,
                settings: {
                  arrows: false,
                  centerMode: true,
                  centerPadding: '',
                  slidesToShow: 2
                }
              },
              {
                breakpoint: 480,
                settings: {
                  arrows: false,
                  centerMode: true,
                  centerPadding: '',
                  slidesToShow: 1
                }
              }
            ],
          });
        });
        //slide intro
        $('.slide_intro').each(function() {
          $(this).slick({
            dots: true,
            lazyLoad: 'ondemand',
          });
        });

      }); // End document ready
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
