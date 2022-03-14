<?php
/**
 * The template for displaying the footer.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

	</div>
</div>

<?php
/**
 * generate_before_footer hook.
 *
 * @since 0.1
 */
do_action( 'generate_before_footer' );
?>

<div <?php generate_do_attr( 'footer' ); ?>>
	<?php
	/**
	 * generate_before_footer_content hook.
	 *
	 * @since 0.1
	 */
	do_action( 'generate_before_footer_content' );

	/**
	 * generate_footer hook.
	 *
	 * @since 1.3.42
	 *
	 * @hooked generate_construct_footer_widgets - 5
	 * @hooked generate_construct_footer - 10
	 */
	do_action( 'generate_footer' );

	/**
	 * generate_after_footer_content hook.
	 *
	 * @since 0.1
	 */
	do_action( 'generate_after_footer_content' );
	?>
</div>

<?php
/**
 * generate_after_footer hook.
 *
 * @since 2.1
 */
do_action( 'generate_after_footer' );

wp_footer();
?>

 <!-- -------Nav Modal --- -->
      <div class="modal fade modal-fullscreen  footer-to-bottom" id="myModalFullscreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog animated fadeInDown">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">01392 723511</h4>
               </div>
               <div class="modal-body">
                  <div id='cssmenu'>
                  	<?php 
                  	if ( function_exists('has_nav_menu') && has_nav_menu('mobile-menu') ) {
					    wp_nav_menu( array(
					      'depth' => 6,
					      'sort_column' => 'menu_order',
					      'container' => 'ul',
					      'menu_id' => '',
					      'menu_class' => '',
					      'theme_location' => 'mobile-menu',
					      'walker' => new IBenic_Walker_MobileMenu()
					    ) );
					    } else {
					       echo "<ul class='nav mobile-menu'> <font style='color:red'>Mobile Menu has not been set</font> </ul>";
					}

                  	// wp_nav_menu( array( 'theme_location' => 'mobile-menu') ); ?>
                     <!-- <ul>
                        <li class="active"><a href='index.html'><span>HOME</span></a></li>
                        <li><a href='whats_on.html'><span>WHAT'S ON</span></a></li>
                        <li class="dropdown" id="dropdown-venues">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">VENUES <i class="fa fa-arrow-down"></i> <span class="caret"></span>
                           </a>
                           <ul class="dropdown-menu drpmenu-venues">
                              <li><a href="lemon_grove.html">LEMON GROVE</a></li>
                              <li><a href="the_ram_bar.html">THE RAM BAR</a></li>
                              <li><a href="great_hall.html">GREAT HALL</a></li>
                              <li><a href="forum_kitchen.html">FORUM KITCHEN</a></li>
                           </ul>
                        </li>
                        <li><a href="private_hire.html">PRIVATE HIRE</a></li>
                        <li class="dropdown">
                           <a href="blog.html" class="dropdown-toggle disabled" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BLOG <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="story1.html">STORY 1</a></li>
                              <li><a href="story2.html">STORY 2</a></li>
                              <li><a href="story3.html">STORY 3</a></li>
                              <li><a href="story4.html">STORY 4</a></li>
                           </ul>
                        </li>
                        <li><a href="contact.html">CONTACT</a></li>
                     </ul> -->
                  </div>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!--------- /.modal --------->

</body>
</html>
