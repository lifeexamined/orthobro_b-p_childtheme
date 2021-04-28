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
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'highlights',
    'posts_per_page' => 6,
);
$arr_posts = new WP_Query( $args );
 
if ( $arr_posts->have_posts() ) :
 
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        ?>

		<div class="news post-grid-wrapper">
			<a href="<?php the_permalink(); ?>">
				<figure class="article">
					<div class="post-grid" style="background: url( '<?php echo get_the_post_thumbnail_url(); ?>'); background-position: center;"></div>
						<figcaption>
							<h3><?php the_title(); ?></h3>
							<br>
							<?php the_excerpt(); ?>
				</figure>
			</a>
		</div>

 
        <?php
    endwhile;
endif;


        // printf( '<div class="post-grid-wrapper"><div style="background:url(\'%3$s\'); background-size: cover" class="post-grid"><a href="%1$s">%2$s</a></div></div>',
        //      esc_url( get_permalink( $recent['ID'] ) ),
		// 	 apply_filters( 'the_title', $recent['post_title'], $recent['ID'] ),
		// 	 esc_url( get_the_post_thumbnail_url($recent['ID']) ),
		// 	 apply_filters( 'the_excerpt', $recent['post_excerpt'], $recent['ID'] ),

		//  );

		//  printf( '<div class="news"><div class="post-grid" style="background: url(\'%3$s\');"></div><a href="%1$s"><figure class="article"><figcaption><h3>%2$s</h3><p>%4$s</p></figcaption></figure></a></div>',
		//  esc_url( get_permalink( $recent['ID'] ) ),
		//  apply_filters( 'the_title', $recent['post_title'], $recent['ID'] ),
		//  esc_url( get_the_post_thumbnail_url($recent['ID']) ),
		//  apply_filters( 'the_description', $recent['post_description'], $recent['ID'] )

		// printf( '<div class="news post-grid-wrapper"><a href="%1$s"><figure class="article"><div class="post-grid" style="background: url(\'%3$s\');"></div><figcaption><h3>%2$s</h3><p>%4$s</p></figcaption></figure></a></div>',
		// esc_url( get_permalink( $post['ID'] ) ),
		// apply_filters( 'the_title', $post['post_title'], $post['ID'] ),
		// esc_url( get_the_post_thumbnail_url($post['ID']) ),
		// apply_filters( 'the_excerpt', $post['post_excerpt'], $post['ID'] )

		wp_reset_postdata();

?>

</div>

	<main id="main" class="site-main">
		
		<div class="single-page-header">
    		<h1 class="single-page-title"><?php the_title(); ?></h1>
    	</div>
		
		<?php if ( is_active_sidebar( 'header-two' ) ) : ?> <?php if ( is_active_sidebar( 'header-three' ) ) : ?>

		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'header-two' ); ?>
		</div>

		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">

			<?php dynamic_sidebar( 'header-three' ); ?>

		</div>

		<?php endif; ?> <?php endif; ?>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'front' );

				// /**
                //  * Comment Template
                //  * 
                //  * @hooked blossom_pin_comment
                // */
                do_action( 'blossom_pin_after_page_content' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
<?php
get_sidebar();
get_footer();
