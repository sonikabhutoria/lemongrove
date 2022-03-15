<?php 

global $post;
$post_slug = $post->post_name;

if($post_slug == "lemon-grove")
{
    $color = "#6C5E93";
    $banner_image_width = "width: 10% !important; margin-top: 9rem !important;";
    $media_css = "#header h1 { font-size: 27px !important;}
            .logo-img-mob { width:27% !important; margin-top: 3rem !important;}";

    // $banner_image_width = "width: 10% !important; margin-top: 9rem !important;";
}
else if($post_slug == "the-ram-bar")
{
    $color = "#738626";
    $banner_image_width = "width: 6% !important; margin-top: 8rem !important;";
    $media_css = "#aboutus { margin-top: 70px !important;}
            .logo-img-mob { width: 19% !important;}";
}
else if($post_slug == "great-hall")
{
    $color = "#BB9650";
    $banner_image_width = "width: 8% !important; margin-top: 8rem !important;";
    $media_css = "#aboutus { margin-top: 70px !important;}
            .logo-img-mob { width: 19% !important;}
            #header h1 { font-size: 26px !important;}";
}
else if($post_slug == "forum-kithcen")
{
    $color = "#FF9300";
    $banner_image_width = "width: 8% !important; margin-top: 8rem !important;";
    $media_css = "#aboutus { margin-top: 0px !important;}
            .logo-img-mob { width: 32% !important;}
            #header h1 { font-size: 24px !important;}";
}


$venue = get_post($venue_id); 
if( get_field('background_image') ){
    $file = get_field('background_image');
    $file_url = $file['url'];
}
if( get_field('mobile_background_image') ){
    $mb_file = get_field('mobile_background_image');
    $mobile_file_url = $mb_file['url'];
} 

?>
<style>
    body{
        background-image: url(<?php echo $file_url;?>);
        background-size: 100%!important;
        background-repeat: no-repeat!important;
        background-color:#141414 ;
        font-family: 'Nunito Sans'!important;
    }
    #aboutus {margin-top: 100px;}

   #banner-img .logo-img{<?php echo $banner_image_width; ?>}
    
    .wo-au-text-heading {color: <?php echo $color; ?>;!important;     }
    .check-out-text { color: <?php echo $color; ?>;}
    #booking .book-subhead{color: <?php echo $color; ?>;}

    .modal-content{
        background-image: url(<?php echo $mobile_file_url;?>);
        background-size: cover;
    }

    #focused-events{ margin-top: 100px;}

    .dropdown-menu {
        position: absolute;
        text-align: left;
    }

    #navbar-main .nav .active a {color: #CE000D;}

    @media (max-width: 500px) {
        body{ 
            background-image: url(<?php echo $mobile_file_url;?>)!important;
            background-size: 100%!important;
            background-repeat: no-repeat!important;
        }

        #header{background-image: unset;}
        .dropdown-menu {
            position: inherit;
            text-align: left!important;
        }

        <?php echo $media_css; ?>

    }

    .wpem-single-venue-profile-wrapper {
        border: opx solid var(--wpem-gray-border-color) !important;
        border-radius: 4px;
         padding: 0px !important; 
        margin-bottom: 30px;
    }
</style>

<div class="wpem-single-venue-profile-wrapper" id="wpem_venue_profile">
    <div class="wpem-venue-profile">

        <?php do_action('single_event_listing_venue_start'); ?>
        <div class="wpem-row">
            <!-- <div class="wpem-col-md-3">
                <div class="wpem-venue-logo-wrapper">
                    <div class="wpem-venue-logo">
                        <a><?php display_venue_logo('', '', $venue); ?></a>
                    </div>
                    <?php /** <div class="wpem-venue-logo-title wpem-heading-text"><a><span><?php echo $venue_name; ?></span></a></div> */ ?>
                </div>
            </div> -->
            <div class="wpem-col-md-12 wpem-col-sm-12">
                <div class="wpem-venue-infomation-wrapper">
                   <!--  <div class="wpem-venue-name wpem-heading-text">
                        <span><?php //echo $venue->post_title; ?></span>
                    </div> -->
                    <div class="wpem-venue-description"><?php printf(__('%s', 'wp-event-manager'), get_venue_description($venue)); ?></div>
                    <div class="wpem-venue-social-links">
                        <div class="wpem-venue-social-lists">
                            <?php do_action('single_event_listing_venue_social_start'); ?>
                            <?php
                            $venue_website  = get_venue_website($venue);
                            $venue_facebook = get_venue_facebook($venue);
                            $venue_instagram = get_venue_instagram($venue);
                            $venue_twitter  = get_venue_twitter($venue);
                            $venue_youtube  = get_venue_youtube($venue);
                            ?>
                            <?php
                            if (!empty($venue_website))
                            {
                                ?>
                                <div class="wpem-social-icon wpem-weblink">
                                    <a href="<?php echo esc_url($venue_website); ?>" target="_blank" title="<?php _e('Get Connect on Website', 'wp-event-manager'); ?>"><?php _e('Website', 'wp-event-manager'); ?></a>
                                </div>
                                <?php
                            }

                            if (!empty($venue_facebook))
                            {
                                ?> 
                                <div class="wpem-social-icon wpem-facebook">
                                    <a href="<?php echo esc_url($venue_facebook); ?>" target="_blank" title="<?php _e('Get Connect on Facebook', 'wp-event-manager'); ?>"><?php _e('Facebook', 'wp-event-manager'); ?></a>
                                </div>
                                <?php
                            }

                            if (!empty($venue_instagram))
                            {
                                ?> 
                                <div class="wpem-social-icon wpem-instagram">
                                    <a href="<?php echo esc_url($venue_instagram); ?>" target="_blank" title="<?php _e('Get Connect on Instagram', 'wp-event-manager'); ?>"><?php _e('Instagram', 'wp-event-manager'); ?></a>
                                </div>
                                <?php
                            }

                            if (!empty($venue_twitter))
                            {
                                ?>
                                <div class="wpem-social-icon wpem-twitter">
                                    <a href="<?php echo esc_url($venue_twitter); ?>" target="_blank" title="<?php _e('Get Connect on Twitter', 'wp-event-manager'); ?>"><?php _e('Twitter', 'wp-event-manager'); ?></a>
                                </div>
                                <?php
                            }
                            if (!empty($venue_youtube))
                            {
                                ?>
                                <div class="wpem-social-icon wpem-youtube">
                                    <a href="<?php echo esc_url($venue_youtube); ?>" target="_blank" title="<?php _e('Get Connect on Youtube', 'wp-event-manager'); ?>"><?php _e('Youtube', 'wp-event-manager'); ?></a>
                                </div>
                            <?php } ?>

                            <?php do_action('single_event_listing_venue_single_social_end', $venue_id); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wpem-venue-contact-actions">
            <?php do_action('single_event_listing_venue_action_start', $venue_id); ?>

            <?php do_action('single_event_listing_venue_action_end', $venue_id); ?>
        </div>

        <?php do_action('single_event_listing_venue_end'); ?>
    </div>
</div>