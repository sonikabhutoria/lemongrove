<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
<style>	
	.logo-img{width: 25%;}	
		.modal-content{
	    background-image: url("images/home-drp.png");
	    background-size: cover;
	}

	#story {margin-top: 10rem;}
	.story-head{
		color: #fff;
    	font-size: 18px;
    	font-weight: 800;
	}
    #focused-events{ margin-top: 100px;}

	.dropdown-menu {
	    position: absolute;
	    text-align: left;
	}
	.web-height{
		height: 100px;
	}

	#navbar-main .nav .active a {color: #CE000D;}

	@media (max-width: 500px) {
	    
	    #header{background-image: unset;}
		.dropdown-menu {
		    position: inherit;
		    text-align: left!important;
		}

	    .logo-img { width: 80%;}
	    .story-writter .story-date::after {
		    content: "\a";
		    white-space: pre;
		}
		.web-height{
			height: unset;
		}

	}


	</style>

	<div <?php generate_do_attr( 'content' ); ?>>
		<main <?php generate_do_attr( 'main' ); ?>>
			<?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			// do_action( 'generate_before_main_content' );

			if ( generate_has_default_loop() ) {
				while ( have_posts() ) :

				?>
				<section id="story">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="story-head">
									<p class="story-writter"> <span class="story-date">WRITTEN BY <?php echo get_the_author(); ?></span> | <?php echo get_the_date(); ?></p>
								</div>
							</div>
							<div class="col-md-12">
								<?php 

								the_post();

								the_content(); 

								?>
							</div>
						</div>
					</div>
				</section>
				<?php
					// generate_do_template_part( 'single' );

				endwhile;
			}

			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			// do_action( 'generate_after_main_content' );
			?>
		</main>
		<div class="col-md-12">
	  		<p class="heading">OUR VENUES</p>
	  	</div>
		<?php echo do_shortcode('[whatonpagevenues]');?>
		<div class="web-height"></div>
	</div>

	<?php
	/**
	 * generate_after_primary_content_area hook.
	 *
	 * @since 2.0
	 */
	// do_action( 'generate_after_primary_content_area' );

	// generate_construct_sidebars();

	get_footer();
