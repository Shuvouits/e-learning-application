<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('frontend/js/jquery-2.min.js')}}"></script> <!-- jquery library js -->
    <script src="{{asset('frontend/js/colorbox.js')}}"></script> <!-- colorbox js -->
    <script src="{{asset('frontend/js/bootstrap.bundle.js')}}"></script> <!-- bootstrap js -->
    <script src="{{asset('frontend/vendor/counter/waypoints.min.js')}}"></script> <!-- facts count js required for jquery.counterup.js file -->
    <script src="{{asset('frontend/vendor/counter/jquery.counterup.js')}}"></script> <!-- facts count js-->
    <script src="{{asset('frontend/vendor/owl/js/owl.carousel.min.js')}}"></script> <!-- owl carousel js -->
    <script src="{{asset('frontend/vendor/smoothscroll/smooth-scroll.js')}}"></script> <!-- smooth scroll js -->
    <script src="{{asset('frontend/vendor/popup/jquery.magnific-popup.min.js')}}"></script> <!-- popup js-->
    <script src="{{asset('frontend/vendor/navigation/menumaker.js')}}"></script> <!-- navigation js-->
    <script src="{{asset('frontend/vendor/mailchimp/jquery.ajaxchimp.js')}}"></script> <!-- mail chimp js -->
    <script src="{{asset('frontend/vendor/protip/protip.js')}}"></script> <!-- protip js -->
    <script src="{{asset('frontend/js/theme.js')}}"></script> <!-- custom js -->
    <script src="{{asset('frontend/js/FWDUVPlayer.js')}}"></script> <!-- player js -->
    <script src="{{asset('frontend/js/jquery.owl-filter.js')}}"></script> <!-- filter js -->
    <script src="{{asset('frontend/js/fontawesome-iconpicker.js')}}"></script><!-- iconpicker js -->
    <script src="{{asset('frontend/js/tinymce.min.js')}}"></script>
    <script src="{{asset('frontend/js/protip.js')}}"></script> <!-- protip js -->
    <script src="{{asset('frontend/js/select2.min.js')}}"></script> <!-- select2 -->
    <script src="{{asset('frontend/js/pace.min.js')}}"></script>
    <script src="{{asset('frontend/js/custom-js.js')}}"></script>

    <script src="{{asset('frontend/js/share.js')}}"></script>

    <script src='../../../www.google.com/recaptcha/api.js'></script>
    <script src="js/sweetalert2%409.js"></script>


    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-31923653-1"></script>

    <script src="{{asset('frontend/js/venom-button.min.js')}}"></script>

    <script src="{{asset('frontend/js/jquery.lazy.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.lazy.plugins.min.js')}}"></script>
    <script src="{{asset('frontend/js/OneSignalSDK.js')}}"></script>



    <script>
        $(function() {

            "use strict";

            $('.lazy').lazy({

                effect: "fadeIn",
                effectTime: 1000,
                scrollDirection: 'both',
                threshold: 0

            });

        });
    </script>



    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-31923653-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-31923653-1');
    </script>


    <!-----Bizpage------>

    <!-- Vendor JS Files -->
    <script src="{{asset('bizpage/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('bizpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('bizpage/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('bizpage/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('bizpage/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('bizpage/assets/vendor/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('bizpage/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('bizpage/assets/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('bizpage/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('bizpage/assets/vendor/aos/aos.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('bizpage/assets/js/main.js')}}"></script>

    <!----End Bizpage Script--->










    <script>
        $('.prime-cat').on('click', function() {

            var url = $(this).data('url');

            location.href = url;

        });

        $('.sub-cate').on('click', function() {

            var url = $(this).data('url');

            location.href = url;

        });

        $('.child-cate').on('click', function() {

            var url = $(this).data('url');

            location.href = url;

        });
    </script>




    <script>
        var ONESIGNAL_APP_ID = "";
        var USER_ID = '';
    </script>
    <script src="{{asset('frontend/js/onesignal.js')}}"></script>


    <script>
        (function($) {
            "use strict";
            $(function() {
                $("#home-tab").trigger("click");
            });
        })(jQuery);
    </script>

<script>
// Hide the extra content initially, using JS so that if JS is disabled, no problemo:
    $('.read-more-content').addClass('hide_content')
    $('.read-more-show, .read-more-hide').removeClass('hide_content')

    // Set up the toggle effect:
    $('.read-more-show').on('click', function(e) {
      $(this).next('.read-more-content').removeClass('hide_content');
      $(this).addClass('hide_content');
      e.preventDefault();
    });

    // Changes contributed by @diego-rzg
    $('.read-more-hide').on('click', function(e) {
      var p = $(this).parent('.read-more-content');
      p.addClass('hide_content');
      p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
      e.preventDefault();
    });
</script>

<script>
(function($) {
  "use strict";
  $(document).ready(function(){

    $(".group1").colorbox({rel:'group1'});
    $(".group2").colorbox({rel:'group2', transition:"fade"});
    $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
    $(".group4").colorbox({rel:'group4', slideshow:true});
    $(".ajax").colorbox();
    $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
    $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
    $(".iframe").colorbox({iframe:true, width:"50%", height:"50%"});
    $(".inline").colorbox({inline:true, width:"50%"});
    $(".callbacks").colorbox({
      onOpen:function(){ alert('onOpen: colorbox is about to open'); },
      onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
      onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
      onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
      onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
    });

    $('.non-retina').colorbox({rel:'group5', transition:'none'})
    $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});


    $("#click").click(function(){
      $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
      return false;
    });
  });
})(jQuery);
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(this).on("click", ".koh-faq-question", function() {
        $(this).parent().find(".koh-faq-answer").toggle();
        $(this).find(".fa").toggleClass('active');
    });
});
</script>

<script type="text/javascript">
    function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

}
// FSMS
function toggleAllSections() {
    $("div[id*='collapseTwo']").collapse('toggle');
    $(".courseToggle").toggle();
}
// FSMS
</script>