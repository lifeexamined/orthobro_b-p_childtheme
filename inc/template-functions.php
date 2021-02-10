<? php 
function blossom_pin_post_thumbnail() {
	global $wp_query;
    $image_size  = 'thumbnail';
    $ed_featured = get_theme_mod( 'ed_featured_image', true );
    
    if( !( is_archive() || is_search() )  && !is_singular() ) : ?>
        <div class="holder">
            <div class="top">
    <?php endif;

    if( is_home() ){        
        if( has_post_thumbnail() ){                        
            echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
            the_post_thumbnail( 'post-image-custom', array( 'itemprop' => 'image' ) );    
            echo '</a>';
        }       
    }elseif( is_archive() || is_search() ){
        if( has_post_thumbnail() ){
            echo '<div class="post-thumbnail"><a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
            the_post_thumbnail( 'blossom-pin-archive', array( 'itemprop' => 'image' ) );    
            echo '</a></div>';
        }
    }elseif( is_singular() ){
        if( is_single() ){
            if( $ed_featured ) {
                echo '<div class="post-thumbnail">';
                the_post_thumbnail( 'post-image-custom', array( 'itemprop' => 'image' ) );
                echo '</div>';
            }
        }else{
            echo '<div class="post-thumbnail">';
            the_post_thumbnail( 'post-image-custom', array( 'itemprop' => 'image' ) );
            echo '</div>';
        }
    }
}
endif;
add_action( 'blossom_pin_before_page_entry_content', 'blossom_pin_post_thumbnail', 20 );
add_action( 'blossom_pin_before_post_entry_content', 'blossom_pin_post_thumbnail', 10 );
add_action( 'blossom_pin_single_post_entry_content', 'blossom_pin_post_thumbnail', 15 );
