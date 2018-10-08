<?php

/* 
 * Template Name: StripeJS Payment Failed
 */

global $post;

$_width = get_post_meta($post->ID, 'stripejs-image-width');
$_height =  get_post_meta($post->ID,'stripejs-image-height');

$width=0;
$height=0;

if (isset($_width[0])) {
    $width = $_width[0];
}
if (isset($_height[0])) {
    $height = $_height[0];
}

if ($width == 0) {
	$width = 512;
}
if ($height == 0) {
	$height=512;
}

$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
if (!empty($featured_image)) {
	$image = '<img src="'.$featured_image[0].'" width="'.$width.'" height="'.$height.'" />';	
} else {
	$image = '<img src="'.plugins_url('/stripejs/images/payment-failed.jpg').'" width="'.$width.'" height="'.$height.'" />';	
}

?>
<?php get_header(); ?>
    <div class="view" id="mainview">
        <header>
            <h1>Payment Failed</h1>
        </header>
        <div class="pages">
            <div class="panel" data-title="Payment Failed" id="failed-payment" selected="true">
                <center>
                    <div id="primary" class="site-content">
                        <div id="content" role="main">

                              <?php while ( have_posts() ) : the_post(); ?>
                                <?php the_content(); ?>
                              <?php endwhile; // end of the loop. ?>

                        </div><!-- #content -->
                    </div><!-- #primary -->
                    <?php echo $image; ?>
                </center>
            </div>
        </div>
    </div>
<?php get_footer(); ?>