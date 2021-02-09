<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Pin
 */

get_header(); 
?>
<?php if ( is_active_sidebar( 'header-one' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'header-one' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?>
<div class="post-grid-double-wrapper">
<?php
    $args = array( 'numberposts' => '6' );
	$recent_posts = wp_get_recent_posts( $args );
	$bgcolor = get_the_post_thumbnail_url(get_the_ID(),'full');
    foreach( $recent_posts as $recent ){
        // printf( '<div class="post-grid-wrapper"><div style="background:url(\'%3$s\'); background-size: cover" class="post-grid"><a href="%1$s">%2$s</a></div></div>',
        //      esc_url( get_permalink( $recent['ID'] ) ),
		// 	 apply_filters( 'the_title', $recent['post_title'], $recent['ID'] ),
		// 	 esc_url( get_the_post_thumbnail_url($recent['ID']) ),
		// 	 apply_filters( 'the_excerpt', $recent['post_excerpt'], $recent['ID'] ),

		//  );
		 printf( '<div class="news"><a href="%1$s"><figure class="article"><img src="%3$s" /><figcaption><h3>%2$s</h3><p>%4$s</p></figcaption></figure></a></div>',
		 esc_url( get_permalink( $recent['ID'] ) ),
		 apply_filters( 'the_title', $recent['post_title'], $recent['ID'] ),
		 esc_url( get_the_post_thumbnail_url($recent['ID']) ),
		 apply_filters( 'the_description', $recent['post_description'], $recent['ID'] )
	 );
    }
?>
</div>

		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				/**
                 * Comment Template
                 * 
                 * @hooked blossom_pin_comment
                */
                do_action( 'blossom_pin_after_page_content' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
