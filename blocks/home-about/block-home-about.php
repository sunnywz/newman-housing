<?php
/**
 * Block template file: blocks/home-about/block-home-about.php
 *
 * Home About Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'home-about-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-home-about';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
?>

<?php 
$home_page_about_background = get_field( 'home_page_about_background' ); ?>
<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>"> 
    <div class="home-about-background"
        <?php if ( $home_page_about_background ) : ?>
            style="background-image: url('<?php echo esc_url( $home_page_about_background['url'] ); ?>');"
        <?php endif; ?>>

        <?php 
        if ( have_rows( 'hpa_cards' ) ) : ?>
            <div class="inner home-about-cards-container">
                <div class="home-about-cards">
                    <?php 
                    while ( have_rows( 'hpa_cards' ) ) : the_row(); ?>
                        <div class="home-about-card">
                            <?php
                            $card_icon = get_sub_field( 'hpac_card_icon' );
                            if($card_icon) : ?>
                                <img src="<?php echo $card_icon['url']; ?>" 
                                    alt="<?php echo $card_icon['alt']; ?>" 
                                    class="home-card-icon" />
                            <?php
                            endif;

                            $card_title = get_sub_field( 'hpac_card_title' );
                            if($card_title) : ?>
                                <p class="home-card-title">
                                    <?php echo $card_title; ?>
                                </p>
                            <?php
                            endif;

                            $card_subtitle = get_sub_field( 'hpac_card_subtitle' );
                            if($card_subtitle) : ?>
                                <hr />
                                <p class="home-card-subtitle">
                                    <?php echo $card_subtitle; ?>
                                </p>
                            <?php
                            endif; ?>

                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php 
        endif; ?>
        
        <?php 
        if ( have_rows( 'hpa_ctas' ) ) : ?>
            <div class="inner home-about-ctas-container" id="homeAboutCtas">
                <div class="home-about-ctas">
                    <?php 
                    $i = 0;
                    while ( have_rows( 'hpa_ctas' ) ) : the_row(); 
                        $card_background = get_sub_field( 'card_background' );
                        $card_title = get_sub_field( 'card_title' );
                        $card_description = get_sub_field( 'card_description' );
                        $cta = get_sub_field( 'hpc_card_cta' );
                        $cta_text = $cta['button_text'] ?? '';
                        $cta_link = $cta['button_link'] ?? '';
                        $cta_target = $cta['button_target'] ?? '_self'; ?>
                        
                        <div class="cta-card cta-card-<?php echo $i % 2; ?> background-purple <?php if($i == 0) echo 'active'; ?>" 
                            <?php 
                            if ( $card_background ) : ?> 
                                data-background="<?php echo esc_url( $card_background['url'] ); ?>"
                            <?php 
                            endif;
                            if ( $i == 0 ) : ?>
                                style="background-image: url(<?php echo esc_url( $card_background['url'] ); ?>)";
                            <?php
                            endif; ?>
                            >
                            
                            <?php if ( $card_title ) : ?>
                                <h2><?php echo esc_html( $card_title ); ?></h2> <!-- Title outside of content to show by default -->
                            <?php endif; ?>

                            <div class="cta-card-content" <?php if($i == 0) echo 'style="display: block;"'; ?>>
                                <?php if ( $card_description ) : ?>
                                    <p><?php echo esc_html( $card_description ); ?></p>
                                <?php endif; ?>

                                <?php if ( $cta_text && $cta_link ) : ?>
                                    <p>
                                        <a href="<?php echo esc_url( $cta_link ); ?>" target="<?php echo esc_attr( $cta_target ); ?>" class="button">
                                            <?php echo esc_html( $cta_text ); ?>
                                        </a>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    <?php 
                    $i++;
                    endwhile; ?>
                </div>
            </div>
        <?php 
        endif; ?>

    </div>
</section>