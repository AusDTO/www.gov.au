    // Smooth Scrolling
    $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
        || location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top - 10
          }, 500);
          jQuery('#' + this.hash.slice(1) + ' h2').addClass('anchorHighlight');
          return false;
        }
      }
    });


    // clickable boxes
    $('.panel.panel-default').click(function(e) {
      e.preventDefault();
      window.location = $('.panel-body a', this).attr('href');
    });

    
    // only change the cursor if jQuery is working..
    $('.panel.panel-default').css('cursor', 'pointer');
