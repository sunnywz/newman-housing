<?php
/**
 * Template part for displaying call-to-action superfooter
 * defined in ACF field groups "Superfooter Options" and "Site Settings"
 *
 * @package Newman_Base_Theme
 */

if ( get_field( 'display_cta_superfooter' ) == 1 ) :
    $superfooter_cta_image = get_field( 'superfooter_cta_image', 'option' ); ?>
    <section class="housing-superfooter-cta-container text-white" 
             <?php if($superfooter_cta_image) echo 'style="background-image: url(' . $superfooter_cta_image['url'] . ')"'; ?>>
        <div class="inner-medium">
            <div class="housing-superfooter-content text-center">
                <?php echo get_field( 'superfooter_cta_content', 'option' ); ?>
            </div>
        </div>
    </section>    
<?php 
endif; ?>
