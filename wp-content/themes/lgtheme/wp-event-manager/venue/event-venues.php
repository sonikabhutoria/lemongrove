<!-- venue Counter -->
  <section id="our-venues">
<div class="wpem-venue-connter">

    <?php if(count($venues) > 0) : ?>

        <!-- <div class="venue-related-data-counter">

            <div class="venue-counter-number-icon">
                <div class="venue-counter-upper-wrap">
                    <div class="venue-counter-icon-wrap"><i class="wpem-icon-location2"></i></div>
                    <div class="venue-counter-number-wrap"><?php echo count($venues); ?></div>
                </div>
                
                <div class="venue-counter-bottom-wrap"><?php _e('Venues', 'wp-event-manager'); ?></div>
            </div>


            <div class="wpem-available-events-number-icon">
                <a href="<?php echo get_the_permalink(get_option('event_manager_events_page_id')); ?>" class="wpem-list-group-item" title="<?php _e('Browse events', 'wp-event-manager'); ?>">
                    <div class="venue-counter-upper-wrap">
                        <div class="venue-counter-icon-wrap"><i class="wpem-icon-calendar"></i></div>
                        <div class="venue-counter-number-wrap"><?php echo $countAllEvents; ?></div>
                    </div>

                    <div class="venue-counter-bottom-wrap"><?php _e('Available events', 'wp-event-manager'); ?></div>
                </a>
            </div>

        </div> -->
        <!-- end venue Counter -->

        

        <!-- shows venue related data -->
              
                <div class="row">
                    <?php
                    foreach ($venues_array as $letter => $venues)
                    {
                        foreach($venues as $k => $v)
                        {
                            $new_venues_array[$k] = $v;
                        }
                    }
                    ksort($new_venues_array);
                   
                    foreach ($new_venues_array as $venue_id => $venue_name) : ?>
                        <div id="show_<?php echo $venue_id; ?>" class="col-md-6 ov-box">
                            
                                    <?php //foreach ($venues as $venue_id => $venue_name) :
                                        
                                        $count = get_event_venue_count($venue_id); 
                                        $venue = get_post($venue_id); ?>
                                          
                                         <a href="<?php echo get_the_permalink($venue_id) ?>" title="<?php _e('Click here, for more info.', 'wp-event-manager'); ?>" >     
                                        <?php display_venue_logo('', '', $venue); ?>

                                            
                                        </a>
                                        <div class="ov-vm">
                                        <p>VIEW VENUE <span><i class="fa fa-arrow-right"></i></span></p>
                                        </div>
                                  
                                        

                                    <?php // endforeach; ?>
                                
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="no-venue wpem-d-none">
                    <div class="wpem-alert wpem-alert-info">
                        <?php _e( 'There are no venues.', 'wp-event-manager' ); ?>
                    </div>
                </div>
           
            <!-- ends class col-md-12 -->
       

    <?php else : ?>
        <div class="wpem-alert wpem-alert-info">
            <?php _e( 'There are no venues.', 'wp-event-manager' ); ?>
        </div>
    <?php endif; ?>
    
</div>
</section>
<!-- end venue Counter -->