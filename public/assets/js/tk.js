;(function () {
  "use strict";

  var $window, $document, $body;

  $window = $(window);
  $document = $(document);
  $body = $("body");

  

    $(window).bind("load", function() {
        $('#playagain-section').hide();
    });
 
 

    function emailRetry() {
      $('#form-register').fadeOut('fast'); 
      $('#raceagainsttime').fadeOut('fast'); 
      $('#playagain-section').fadeIn('slow'); 

       $('html, body').animate({
          scrollTop: $("#playagain-section").offset().top
      }, 2000);
 
    }

     
    $("#playagain-btn").click(function() { 
      console.log('register-btn button clicked')
       emailRetry();
    }); 


})(jQuery);


