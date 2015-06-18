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

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        var open = false;

        function Article(articleNode)
        {
            var thisObj = this;
            thisObj.articleNode = articleNode;
            thisObj.likes = 0;
            thisObj.liked = false;
            thisObj.likesHidden = false;
            thisObj.MIN_LIKES = 10;

            thisObj.articleNode.find('.like-post a').click(function(e)
            {
                e.preventDefault();
                if(!thisObj.liked)
                {
                    thisObj.liked=true;
                    thisObj.articleNode.find('.ldc-button').trigger('click');
                    thisObj.likes = thisObj.likes + 1;
                    if(thisObj.likes > thisObj.MIN_LIKES)
                    {
                        thisObj.articleNode.find('.like-counter').html('' + thisObj.likes + ' Likes');
                        if(thisObj.likesHidden)
                        {
                            thisObj.articleNode.find('.like-counter').fadeIn();
                        }
                    }
                    else
                    {
                        thisObj.articleNode.find('.like-counter').html('Awesome, thanks.').fadeIn();
                    }
                }
            });

            thisObj.articleNode.find('.ul_cont_like span').each(function(){
                thisObj.likes = parseInt($(this).html());
                if(thisObj.likes > thisObj.MIN_LIKES)
                {
                    thisObj.articleNode.find('.like-counter').html('' + thisObj.likes + ' Likes');
                }
                else
                {
                    thisObj.likesHidden=true;
                    thisObj.articleNode.find('.like-counter').hide();
                }
            });

        }


        var s;

        // tranparent to white background in the navigation when scrolling to bottom
        function windowOnScroll(e) {
            if( $(window).outerWidth() > 767 && !$('body').hasClass('single') ) {
                $('.site-header').attr('data-top', 'background: rgba(255,255,255,0); border-bottom-color: rgba(255, 255, 255, 0.4)');
            }
        }

        windowOnScroll();
        $(window).bind('scroll', windowOnScroll);


        // Add data attr to main nav <li>
        //if( !$('body').hasClass('single') ) {

            $('.main-nav a').attr({
                'data-anchor-target': '.hero-bg',
                'data-top': 'color: rgba(255,255,255,1);',
                'data-70-top-bottom': 'color: rgba(0,0,0,1);'
            });
        //}


        // Open contact modal
        $('.menu-contact a').click(function(e){
            e.preventDefault();
            $("#contactModal").modal('show');
        });


        // Scroll to content button
        $('#scroll-to-content').on("click", function(e)
        {
            e.preventDefault();
            var top = $("#main").offset().top;
            /*$('html, body').animate({
                scrollTop: top - 69
            }, 500);
            */
            s.animateTo(top-69, {duration:500});
        });

        $('.responsive-title').click(function()
        {
           if(s !== undefined)
           {
               s.animateTo(0, {duration:500});
           }
            else
           {
               $('html, body').animate({scrollTop: 0}, 500);
           }
        });

        // Toggle Responsive menu
        $('#toggle-menu').click(function()
        {
            if(!open){
                $(this).addClass('close');
                open = true;
            } else {
                $(this).removeClass('close');
                open = false;
            }

            if(!$(this).hasClass('close')) {
                $('.main-nav').removeClass('show');
            } else {
                $('.main-nav').addClass('show');
            }
        });


        if($('.hero-bg').length>0)
        {
            // Parallax effect on the hero image
            s = skrollr.init({
                forceHeight: false,
                smoothScrolling: false,
                mobileDeceleration: 0.004
            });
        }
        else
        {
            $('.responsive-title').css('opacity','1');
            $('#toggle-menu').find('.lines').css('background','#000');
        }

        //this will prevent the touch events from your element to bubble up to the document (where skrollr listens for them)
        $('.modal').on('touchstart touchmove touchend', function(e) {
            e.stopPropagation();
        });


        var onNext = function(e)
        {
            var nextPost = $(this);
            var article = nextPost.data('article');
            var articleInit = nextPost.data('article-initialised');
            if(articleInit === undefined)
            {
                nextPost.data('article-initialised',true);
                initNext(article.find('.next-post'));
                article.show();
            }

            var top = article.offset().top;
            $('html, body').animate({scrollTop: top - 69}, 500);
            return false;
        };


        var initNext = function(nextPost)
        {
            var link = nextPost.find('a');
            var href = link.attr('href');
            link.attr('href','');
            $.get(href, function(response)
            {
                var thisArticle = $('article').last();
                var page = $(response);
                var article = page.find('article');
                article.insertAfter(thisArticle);
                article.addClass('with-divider');
                article.hide();
                nextPost.data('article',article);
                try{
                    FB.XFBML.parse();
                }catch(ex){}

                new Article(article);
            });
            nextPost.click(onNext);
        };

        var nextPost = $('.next-post');
        if(nextPost.length > 0)
        {
            initNext(nextPost);
        }

        $('.responsive-toggle-menu-overlay').click(function()
        {
           $('#toggle-menu').click();
        });

        $('article').each(function(){
            new Article($(this));
        });

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
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
