<?php

/* 
 * Metabox Implementation
 */

// Custom metabox for Image size settings for payment success and failure page images
add_action('add_meta_boxes', 'add_stripejs_image_meta');
add_action('add_meta_boxes', 'add_stripejs_post_template' );

function add_stripejs_image_meta()
{
    global $post;
    if(!empty($post)) {
        if ($post->post_type != 'post') {
            $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        } else {
            $pageTemplate = get_post_meta($post->ID,'_post_template', true);
        }

        if($pageTemplate == 'payment-success.php' || $pageTemplate == 'payment-failed.php') {
			add_meta_box(
				'stripejs_image_meta', // $id
				'StripeJS Payment Success/Failure Image Size Settings', // $title
				'display_image_settings', // $callback
				'post', // $page
				'normal', // $context
				'high'
			); // $priority
        }
    }	
}

function add_stripejs_post_template() {
		add_meta_box(
                    'postparentdiv',
                    __('StripeJS Custom Template'),
                    'stripejs_custom_post_template_meta_box',
                    'post',
                    'side', 
                    'core'
		);
    
}

function stripejs_custom_post_template_meta_box($post) {
	if ( $post->post_type != 'page' ) {
		$template = get_post_meta($post->ID,'_post_template',true);
	?>
		<label class="screen-reader-text" for="post_template"><?php _e('Post Template') ?></label>
		<select name="post_template" id="post_template">
			<option value='default'><?php _e('Default Template'); ?></option>
			<?php stripejs_custom_post_template_dropdown($template); ?>
		</select>
		<p><i><?php _e( 'Some themes have custom templates you can use for single posts template selecting from dropdown.'); ?></i></p>
	<?php
	}
}

function stripejs_custom_post_template_dropdown($default = '') {
    $templates = array();
    $templates['StripeJS Payment Success'] = 'payment-success.php';
    $templates['StripeJS Payment Failed'] = 'payment-failed.php';

    
    //ksort( $templates );
  
    foreach (array_keys( $templates ) as $template ) {
        if ( $default == $templates[$template] ) {
            $selected = " selected='selected'";
        } else {
            $selected = '';
        }
  
        echo "\n\t<option value='".$templates[$template]."' $selected>$template</option>";
    }
}

?>