<?php
// echo "my event detail file";
global $post;
$start_date = get_event_start_date();
$end_date   = get_event_end_date();
$venue_name   = get_event_venue_name();
$end_time   = get_event_end_time();
$start_time = get_event_start_time();
$event_type = get_event_type();
$event_venue_id = get_post(get_event_venue_ids()); 

$post_slug = get_post_field( 'post_name', $event_venue_id);

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

wp_enqueue_script('wp-event-manager-slick-script');
wp_enqueue_style('wp-event-manager-slick-style');
do_action('set_single_listing_view_count');
$event = $post;


if( get_field('background_image',$event_venue_id) ){
    $file = get_field('background_image',$event_venue_id);
    $file_url = $file['url'];
}
if( get_field('mobile_background_image',$event_venue_id) ){
    $mb_file = get_field('mobile_background_image',$event_venue_id);
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

    #banner-img .logo-img{<?php echo $banner_image_width; ?>}

    .card-body{    padding: 28px;}

     @media (max-width: 500px) {
        body{ 
            background-image: url(<?php echo $mobile_file_url;?>)!important;
            background-size: 100%!important;
            background-repeat: no-repeat!important;
        }
    }
   
     .wpem-single-event-page .wpem-single-event-wrapper
     {
        border: unset !important;
     }
    

</style>

<div class="single_event_listing">

    <div class="wpem-main wpem-single-event-page">
        <?php if (get_option('event_manager_hide_expired_content', 1) && 'expired' === $post->post_status): ?>
            <div class="wpem-alert wpem-alert-danger" ><?php _e('This listing has been expired.', 'wp-event-manager'); ?></div>
        
        <?php else: ?>
            <?php if (is_event_cancelled()): ?>
                <div class="wpem-alert wpem-alert-danger">
                    <span class="event-cancelled"><?php _e('This event has been cancelled.', 'wp-event-manager'); ?></span>
                </div>
            <?php elseif (!attendees_can_apply() && 'preview' !== $post->post_status): ?>
                <div class="wpem-alert wpem-alert-danger">
                    <span class="listing-expired"><?php _e('Registrations have closed.', 'wp-event-manager'); ?></span>
                </div>
            <?php endif; ?>
            <?php
            /**
             * single_event_listing_start hook
             */
            do_action('single_event_listing_start');
            ?>
            <div class="wpem-single-event-wrapper">
                <div class="wpem-single-event-header-top">
                    <div class="wpem-row">

                        <div class="wpem-col-xs-12 wpem-col-sm-12 wpem-col-md-12 wpem-single-event-images">
                            <?php
                            $event_banners = get_event_banner();
                            if (is_array($event_banners) && sizeof($event_banners) >= 1):
                                ?>
                                <div class="wpem-single-event-slider-wrapper">
                                    <div class="wpem-single-event-slider">
                                        <?php foreach ($event_banners as $banner_key => $banner_value): ?>
                                            <div class="wpem-slider-items">
                                                <img src="<?php echo $banner_value; ?>" alt="<?php the_title(); ?>" />
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="wpem-event-single-image-wrapper">
                                    <div class="wpem-event-single-image"><?php display_event_banner(); ?></div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="wpem-single-event-body card-body">
                    <div class="wpem-row">
                        <div class="wpem-col-xs-12 wpem-col-sm-12 wpem-col-md-12 ">
                            <div class="wpem-single-event-short-info">                        
                                <div class="wpem-event-details">
                                    <div><?php echo $venue_name; ?></div>
                                    <?php 
                                     if (!empty($start_time))
                                     {
                                    ?>
                                        <span class="card-time"><?php echo display_event_start_time();?>  </span>     
                                    <?php
                                     }
                                     ?>

                                    <div class="wpem-event-title">
                                        <h3 class="wpem-heading-text" style="color:#D10000;"><?php the_title(); ?></h3>
                                    </div>



                                    <?php if(get_option('enable_event_organizer')) : ?>
                                       <!--  <div class="wpem-event-organizer">
                                            <div class="wpem-event-organizer-name">
                                                <?php do_action('single_event_organizer_name_start'); ?>
                                                 <?php printf(__('by %s', 'wp-event-manager'), get_organizer_name($post, true)); ?>
                                                <?php do_action('single_event_organizer_name_end'); ?>
                                            </div>
                                        </div> -->
                                    <?php endif; ?>

                                    <?php
                                    $view_count = get_post_views_count($post);
                                    if ($view_count) :
                                        ?>                                        
                                        <div class="wpem-viewed-event wpem-tooltip wpem-tooltip-bottom"><i class="wpem-icon-eye"></i><?php printf(__(' %d', 'wp-event-manager'), $view_count); ?>                                        
                                            <span class="wpem-tooltiptext"><?php printf(__('%d people viewed this event.', 'wp-event-manager'), $view_count); ?></span>
                                        </div>                                        
                                    <?php endif; ?>

                                    <p class="card-text">
                                    <?php
                                    if (!empty($start_date))
                                    {
                                        ?>
                                       
                                        <?php echo date_i18n('l', strtotime($start_date)); ?>
                                        <?php echo date_i18n('d', strtotime($start_date)); ?>
                                        <?php echo date_i18n('F', strtotime($start_date)); ?>
                                       
                                    <?php } ?> 

                                    
                                        
                                   
                                    </p>
                                    <div class="col-md-offset-4 col-md-4">
                                        <a href="<?php display_event_permalink(); ?>" class="btn btn-book">BOOK NOW</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                          
                         
            <!-- / wpem-wrapper end  -->            
        <?php endif; ?>
        <!-- Main if condition end -->
    </div>
    <!-- / wpem-main end  -->
</div>
<!-- override the script if needed -->

