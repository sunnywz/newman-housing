<?php
/**
 * Block template file: blocks/home-hero/block-home-hero.php
 *
 * Home Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'home-hero-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-home-hero';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<!-- First Slider (Content) -->
    <div class="owl-carousel home-hero-slider" id="homeHero">
        <?php 
        $i = 0;
        if ( have_rows( 'home_page_hero_slides' ) ) :
            while ( have_rows( 'home_page_hero_slides' ) ) : the_row(); ?>
                <div class="home-hero-slide home-hero-slide-<?php echo $i % 2; ?>" data-slide="<?php echo $i; ?>">
                    <div class="home-hero-slide-content">
                        <?php
                        $headline = get_sub_field( 'hph_headline' );
                        if($headline) : ?>
                            <h2 class="home-hero-headline">
                                <?php echo $headline; ?>
                            </h2>
                        <?php
                        endif;
                    
                        $subhead = get_sub_field( 'hph_subhead' );
                        if($subhead) : ?>
                            <p class="home-hero-subhead">
                                <?php echo $subhead; ?>
                            </p>
                        <?php
                        endif; ?>

                        <?php
                        $cta = get_sub_field( 'hph_cta' );
                        $cta_text = $cta['button_text'];
                        $cta_link = $cta['button_link'];
                        $cta_target = $cta['button_target'];
                        if($cta_link && $cta_text && $cta_target) : ?>
                            <p class="home-hero-cta">
                                <a href="<?php echo $cta_link; ?>" target="<?php echo $cta_target; ?>" class="button button-white">
                                    <?php echo $cta_text; ?>
                                </a>
                            </p>
                        <?php
                        endif; ?>
                    </div>
                    <?php
                    $hph_image = get_sub_field( 'hph_image' ); 
                    if ( $hph_image ) : ?>
                        <div class="home-hero-slide-image">
                            <div class="home-hero-image" style="background-image: url(<?php echo esc_url( $hph_image['url'] ); ?>)">
                                <img src="<?php echo esc_url( $hph_image['url'] ); ?>" style="visibility: hidden" >
                            </div>
                        </div>
                    <?php 
                    endif; ?>
                </div>
            <?php 
            $i++;
            endwhile; 
        endif; ?>
    </div>
</section>

<?php 
if ( have_rows( 'hphfq' ) ) : ?>
    <section class="home-page-quote-container background-purple text-white">
        <div class="inner">
            <?php 
            while ( have_rows( 'hphfq' ) ) : the_row(); ?>
                <div class="home-page-quote">
                    <?php 
                    $icon = get_sub_field( 'icon' );
                    if ( $icon ) : ?>
                        <div class="home-quote-icon">
                            <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                        </div>
                    <?php 
                    endif; ?>
                    <div class="home-quote-content">
                        <?php
                        $quote = get_sub_field( 'quote' );
                        if($quote) : ?>
                            <p class="home-quote-line">
                                <?php echo $quote; ?>
                            </p>
                        <?php
                        endif;

                        $byline = get_sub_field( 'byline' );
                        if($byline) : ?>
                            <p class="home-quote-byline">
                                <?php echo $byline; ?>
                            </p>
                        <?php
                        endif; ?>
                    </div>
                </div>
            <?php 
            endwhile; ?>
        </div>
    </section>
<?php 
endif; ?>

                        


        