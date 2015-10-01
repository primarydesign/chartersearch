        </div> <!-- disc::inner-content-container -->
      </div> <!-- disc::content-container -->

      <?php
        $slider_header_footer_style = uxbarn_get_slider_header_footer_style();
        $display_footer_widget_area = ot_get_option('uxbarn_to_setting_display_footer_widget_area');
        $footer_widget_area_columns = (int)ot_get_option('uxbarn_to_setting_footer_widget_area_columns');
        $has_any_widgets = false;
        $footer_bar_top_margin_class = '';
        for($i = 1; $i <= $footer_widget_area_columns; $i++) {
          $sidebar_id = 'footer-widget-area-' . $i;
          /*$widgets_count = uxbarn_count_sidebar_widgets($sidebar_id, false);
          if($widgets_count > 0) {
          $has_any_widgets = true;
          }*/
          // Check if the current sidebar has any widgets
          if(is_active_sidebar($sidebar_id)) {
          $has_any_widgets = true;
          }
        }
        if (!$has_any_widgets || $display_footer_widget_area == '') {
            $footer_bar_top_margin_class = ' top-margin ';
        }
      ?>

      <div id="footer-root-container"<?php echo $slider_header_footer_style; ?>>

        <?php if($display_footer_widget_area && $has_any_widgets) : ?>
          <div id="footer-content-container">
            <div id="footer-content-inner-wrapper" class="content-width">
              <div id="footer-content" class="row top-margin">
                <div class="footer-column footer-information">
                  <img class="footer-logo" src="<?php echo get_stylesheet_directory_uri();?>/images/logo-small-white.svg" alt="CharterSearch logo">
                  <p class="footer-quote"><a href="contact-us">CONTACT US FOR A QUOTE TODAY</a></p>
                  <p class="contact-info">(800) 270-8790 <i>|</i> <a href="mailto: info@CharterSearch.com">info@CharterSearch.com</a></p>
                  <p class="social-icons">
                    <?php $uploads = wp_upload_dir(); ?>
                    <a href="http://www.twitter.com/gochartersearch" target="_blank"><img class="twittericon" src="<?php echo $uploads['baseurl']?>/2013/08/chartersearchtwitter.png" alt="CharterSearch Twitter"></a>
                  </p>
                  <p class="fine-print">CharterSearch is an Air Charter Arrangement Service Company and is not a direct or indirect "Air Carrier". CharterSearch does not own or operate any aircraft.  All chartered flights arranged by CharterSearch are operated byFAR Part 121 or FAR Part 135 air carriers who shall maintain full operational control of charter flights at all times.</p>
                  <p class="legal-print">© 2014 New England Flight Watch, LLC dba CharterSearch<br/>All Rights Reserved.</p>
                </div>
                <div class="footer-column">
                  <?php $navargs = array(
                    'theme_location'=>'header-menu',
                    'container_class'=>'footer-sitemap',
                    'container_id'=>'footer-sitemap',
                    'container'=>'nav',
                    'menu_class'=>'',
                    'menu_id'=>'',
                    'fallback_cb'=>false);
                    echo wp_nav_menu($navargs); ?>
                </div>
              </div><!-- end::footer-content -->
            </div><!-- end::footer-content-inner-wrapper -->
          </div><!-- end::footer-content-container -->
        <?php endif; ?>

        <!-- Footer Bar -->
        <?php
          $copyright_column = ' large-12 center ';
          $social_string = uxbarn_get_footer_social_list_string();
          if($social_string != '') {
          $copyright_column = ' large-6 ';
          }
        ?>

        <div id="footer-bar-container" class="row <?php echo $footer_bar_top_margin_class; ?>">
          <div id="footer-bar-inner-wrapper" class="content-width">
            <div class="uxb-col <?php echo $copyright_column; ?> columns less-padding">
              Website by <a href="http://www.primarydesign.com" target="_blank">Primary Design</a>
            </div>
            <?php if($social_string != '') : ?>
              <div class="uxb-col large-6 columns less-padding">
                <div id="footer-social">
                  <span><?php _e('Connect with us:', 'uxbarn'); ?></span>
                  <ul class="bar-social"><?php echo $social_string; ?></ul>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div> <!-- end::footer-bar-container -->

      </div> <!-- end::footer-root-container -->
    </div><!-- disc::body-wrapper -->

    <?php wp_footer(); ?>

    <script type='text/javascript'> <!--Image hover-->
      jQuery(document).ready(function($){
        $('.hover-effect').hover(function () {
          $(this).animate({opacity:'1'});
        }, function () {
          $(this).animate({opacity:'0'});
        });
      });
    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-51618937-1', 'chartersearch.com');
      ga('send', 'pageview');
    </script>
  </body>
</html>
