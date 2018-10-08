<?php
/**
 * Admin Dashboard Features - wp-list-tables
 */
add_filter( 'post_row_actions', 'stripejs_remove_row_actions', 10, 1 );
function stripejs_remove_row_actions( $actions )
{
    if( get_post_type() === 'transaction' )
        unset( $actions['edit'] );
        unset( $actions['trash'] );
        unset( $actions['inline hide-if-no-js'] );
    return $actions;
}

add_filter( 'bulk_actions-edit-transaction', 'stripejs_transaction_bulk_actions' );
function stripejs_transaction_bulk_actions( $actions ){
    unset( $actions[ 'edit' ] );
    unset( $actions['trash'] );
    return $actions;
}

function stripejs_get_transaction_template($single_template) {
     global $post;

     if ($post->post_type == 'transaction') {
          $single_template = dirname( __FILE__ ) . '/single-transaction.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'stripejs_get_transaction_template' );

add_action('manage_transaction_posts_columns','manage_columns_for_transaction');

function manage_columns_for_transaction($columns) {
    unset($columns['title']);
    unset($columns['comments']);
    unset($columns['author']);
    unset($columns['date']);
    
    $columns['email'] = '<b style="color:blue;">Customer Email</b>';
    $columns['amount'] = '<b style="color:green;">Amount</b>';
    $columns['txdate'] = '<b style="color:orange;">Transaction Date</b>';
    $columns['txncode'] = '<b>Transaction Code</b>';
    $columns['balancetx'] = '<b>Balance Transaction</b>';
    
    return $columns;
}

add_action('manage_transaction_posts_custom_column','transaction_recipe_columns',10,2);

function transaction_recipe_columns($column,$post_id) {
    
    switch ($column) {
        case 'email':
            $post = get_post($post_id);
            $transaction = json_decode($post->post_content);
            if ($transaction->object != 'subscription') {
                echo '<b style="color:blue;">'.$transaction->source->name.'<b>';
            } else {
                echo '<b style="color:blue;">'.$transaction->customer.'<b>';
            }
            break;
        case 'amount':
            $post = get_post($post_id);
            $transaction = json_decode($post->post_content);
            if ($transaction->object != 'subscription') {
                echo '<b style="color:green;">$'.number_format($transaction->amount/100,2).'</b>';
            } else {
                $amount = $transaction->plan->amount;
                echo '<b style="color:green;">$'.number_format($amount/100,2).'</b>';
            }
            break;
        case 'balancetx':
            $post = get_post($post_id);
            $transaction = json_decode($post->post_content);
            if (isset($transaction->balance_transaction)) {
                echo '<b style="color:black;">'.$transaction->balance_transaction.'</b>';
            } else {
                echo '<b style="color:black;">N/A</b>';
            }
            break;
        case 'txncode':
            $post = get_post($post_id);
            $transaction = json_decode($post->post_content);
            echo '<b style="color:black;">'.$transaction->id.'</b>';
            break;
        case 'txdate':
            $post = get_post($post_id);
            echo '<b style="color:orange;">'.date('m/d/Y h:i:s',strtotime($post->post_date)).'<b>';
            break;
    }
    
}

// For StripeJS Image setting save
add_action('save_post','save_stripejs_custom_post_template',10,2);
add_filter('single_template','stripejs_get_custom_post_template_for_template_loader');

function save_stripejs_custom_post_template($post_id,$post) {
  if ($post->post_type !='page' && !empty($_POST['post_template']))
    update_post_meta($post->ID,'_post_template',$_POST['post_template']);    
}

function stripejs_get_custom_post_template_for_template_loader($template) {
  global $wp_query;
  $post = $wp_query->get_queried_object();
  if ($post) {
    $post_template = get_post_meta($post->ID,'_post_template',true);

    if (!empty($post_template) && $post_template!='default')
      $template = dirname(__FILE__)."/{$post_template}";
  }

  return $template;
}

function display_image_settings()
{
	global $post;
	 
	wp_nonce_field(basename(__FILE__), "stripejs-imagesettings-nonce");

    ?>
        <div>
            <label for="stripejs-image-width">Width</label>
            <input name="stripejs-image-width" type="number" value="<?php echo get_post_meta($post->ID, "stripejs-image-width")[0]; ?>" placeholder="512" />
            <label for="stripejs-image-height">Height</label>
            <input name="stripejs-image-height" type="number" value="<?php echo get_post_meta($post->ID, "stripejs-image-height")[0]; ?>" placeholder="512" />
			<i>Default values shown as (512,512)</i>,
			&nbsp;Default Image:&nbsp; 
			<span id="default-image-success" style="display:none;">
				<img src="<?php echo plugins_url('/stripejs/images/payment-received.jpg'); ?>" width="30" height="30" />
			</span>
			<span id="default-image-failure" style="display:none;">
				<img src="<?php echo plugins_url('/stripejs/images/payment-failed.jpg'); ?>" width="30" height="30" />
			</span>
			&nbsp;(<i>When a <b>featured image</b> has been added, will override this image.</i>)
        </div>
    <?php  
}

function save_stripejs_image_settings($post_id, $post, $update)
{
    if (!isset($_POST["stripejs-imagesettings-nonce"]) || !wp_verify_nonce($_POST["stripejs-imagesettings-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

	$stripejs_image_width = "512";
	$stripejs_image_height = "512";
	
    if(isset($_POST["stripejs-image-width"]))
    {
        $stripejs_image_width = $_POST["stripejs-image-width"];
    }   
    update_post_meta($post_id, "stripejs-image-width", $stripejs_image_width);

    if(isset($_POST["stripejs-image-height"]))
    {
        $stripejs_image_height = $_POST["stripejs-image-height"];
    }   
    update_post_meta($post_id, "stripejs-image-height", $stripejs_image_height);
}

add_action("save_post", "save_stripejs_image_settings", 10, 3);

// Show image size meta box only when Success or Failue payment templates are selected
add_action('admin_enqueue_scripts', 'stripejs_admin_script');
function stripejs_admin_script()
{
    wp_enqueue_script('stripejs-admin', plugins_url('/stripejs/js/stripeJSadmin.js'), array('jquery'));
}

?>