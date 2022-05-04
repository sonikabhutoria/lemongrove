<?php
global $post;
$start_date = get_event_start_date();
$start_time = get_event_start_time();
$end_date   = get_event_end_date();
$end_time   = get_event_end_time();
$event_type = get_event_type();
$venues_name = get_event_venue_name();

$event_url = $post->_event_url;

if (is_array($event_type) && isset($event_type[0]))
    $event_type = $event_type[0]->slug;

$thumbnail  = get_event_thumbnail($post,'full');
?>
<style>
    
.wpem-col-lg-4 .wpem-event-layout-action-wrapper{
    display: none !important;
}
.wpem-event-listing-header-title .wpem-heading-text{
    display: none !important;
}
</style>

<a href="<?php display_event_permalink(); ?>">
<div class="col-12 col-sm-12 col-md-6 col-lg-4">
  <div class="card">
    <img class="card-img" src="<?php echo $thumbnail ?>" alt="Bologna">

    <div class="card-body">
    <div class="card-img-overlay">
      <a href="#" class="btn btn-light btn-sm"><?php display_event_venue_name(); ?></a>
    </div>
      <h4 class="card-title"><?php echo get_the_title(); ?></h4>
      <p class="card-text">
        <?php
        if (!empty($start_date))
        {
            ?>
           
            <?php echo date_i18n('l', strtotime($start_date)); ?>
            <?php echo date_i18n('d', strtotime($start_date)); ?>
            <?php echo date_i18n('F', strtotime($start_date)); ?>
           
        <?php } ?> 

        
            <?php 
             if (!empty($start_time))
             {
            ?>
                <span class="card-time"><?php echo date_i18n('h:i a', strtotime($start_time)); //echo display_event_start_time();?>  </span>     
            <?php
             }
             ?>
       
        </p>
      <!-- <a href="<?php //display_event_permalink(); ?>" class="btn btn-book">BOOK NOW</a> -->
      <a href="<?php echo $event_url; ?>" class="btn btn-book">BOOK NOW</a>
    </div>

  </div>
</div>
</a>