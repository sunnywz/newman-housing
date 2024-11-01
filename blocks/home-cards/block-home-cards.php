<?php
/**
 * Block template file: blocks/home-cards/block-home-cards.php
 *
 * Cards Blog Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Prevent direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Create id attribute allowing for custom "anchor" value.
$id = 'cards-blog-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-cards-blog';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
?>

<section class="<?php echo esc_attr( $classes ); ?>" id="<?php echo esc_attr( $id ); ?>">
	<?php
	$section_title = get_field( 'bp_section_title' );
	$section_intro = get_field( 'bp_section_intro' );
	if($section_title || $section_intro) : ?>
		<div class="section-intro inner-narrow text-center">
			<?php
			if($section_title) : ?>
				<h2 class="section-title">
					<?php echo $section_title; ?>
				</h2>
			<?php
			endif;

			if($section_intro) : ?>
				<p>
					<?php echo $section_intro; ?>
				</p>
			<?php
			endif; ?>
		</div>
	<?php
	endif; ?>

	<?php 
	if ( have_rows( 'bp_cards' ) ) : ?>
		<div class="home-blog-cards-container">
			<div class="inner">
				<div class="home-blog-cards">
					<?php 
					while ( have_rows( 'bp_cards' ) ) : the_row(); 
						$blog_title = get_sub_field( 'blog_title' );
						$blog_excerpt = get_sub_field( 'blog_excerpt' );
						$blog_image = get_sub_field( 'blog_image' );
						$blog_link = get_sub_field( 'blog_link' );
						$blog_category = get_sub_field( 'blog_category' );
						if($blog_title && $blog_link) : ?>
							<div class="home-blog-card clickable-div">
								<?php
								if($blog_image) : ?>
									<div class="home-blog-card-image" style="background-image: url(<?php echo $blog_image['url']; ?>)">
									</div>
								<?php
								endif; ?>

								<div class="home-blog-card-content">
									<?php
									if($blog_category) : ?>
										<p class="category">
											<?php echo $blog_category; ?>
										</p>
									<?php
									endif; ?>

									<h3>
										<a href="<?php echo $blog_link; ?>" target="_blank">
											<?php echo $blog_title; ?>
										</a>
									</h3>

									<?php
									if($blog_excerpt) : ?>
										<p>
											<?php echo $blog_excerpt; ?>
										</p>
									<?php
									endif; ?>
								</div>

								<svg width="42" height="40" viewBox="0 0 42 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="home-blog-card-arrow">
									<path d="M0.201172 19.9995H38.7011" stroke="#33106A" stroke-width="2"/>
									<path d="M25.2505 5.45093L39.7995 19.9999L25.2505 34.5489" stroke="#33106A" stroke-width="2"/>
								</svg>
							</div>
						<?php
						endif;
					endwhile; ?>
				</div>
			</div>
		</div>
	<?php 
	endif; ?>

	<?php
	$cta_text = get_field( 'bp_cta_button_text' );
	$cta_link = get_field( 'bp_cta_button_link' );
	$cta_target = get_field( 'bp_cta_button_target' );
	if($cta_link && $cta_text && $cta_target) : ?>
		<div class="home-blog-cta text-center">
			<div class="inner">
				<p>
					<a href="<?php echo $cta_link; ?>" target="<?php echo $cta_target; ?>" class="button">
						<?php echo $cta_text; ?>
					</a>
				</p>
			</div>
		</div>
	<?php
	endif; ?>
</section>