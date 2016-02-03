<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>


<section id="footer">
  <ul class="icons">
    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
    <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
    <li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
    <li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
    <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
    <li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
  </ul>
  <div class="copyright">
    <ul class="menu">
      <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>
  </div>
</section>

</div><!-- .site -->



<!-- Scripts -->
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery.scrolly.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery.poptrox.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery.form.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/skel.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/util.js"></script>
<!--[if lte IE 8]><script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/ie/respond.min.js"></script><![endif]-->
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/clock.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/main.js"></script>
<script>
  // wait for the DOM to be loaded 
  $(document).ready(function() {
    // bind 'myForm' and provide a simple callback function 
    $("#confirm").submit(function(event) {
      event.preventDefault();
      var emailaddress = $("#confirm_email").val();

      if (!isValidEmailAddress(emailaddress)) {
        alert('Dovresti specificare un indirizzo email valido :(');
      } else {
        $.ajax({
          url: 'submit.php',
          type: 'post',
          data: $('#confirm').serialize(),
          success: function(data) {
            alert(data.message);
          }
        });
      }
    });
  });

  function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
  }
  ;
</script> 
</body>
</html>
