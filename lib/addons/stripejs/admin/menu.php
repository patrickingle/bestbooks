<?php

/* 
 * Admin Menu Settings  
 */

require_once dirname(__FILE__).'/activate.php';

// Settings page
if ( is_admin() ){ // admin actions
  add_action( 'admin_menu', 'add_stripejs_menu' );
} else {
  // non-admin enqueues, actions, and filters
}

function add_stripejs_menu() {
	//create new top-level menu
	add_menu_page('StripeJS Settings', 'StripeJS Settings', 'administrator', __FILE__, 'stripejs_plugin_settings_page');
	
    add_submenu_page(__FILE__, 'Transactions', 'Transactions', 'administrator', 'edit.php?post_type=transaction'); 

    add_submenu_page(__FILE__, 'Help', 'Help', 'administrator', 'admin.php?page=stripejs%2Findex.php&subpage=help'); 
	
	//call register settings function	
	add_action( 'admin_init', 'register_stripejs_settings' );
}

function register_stripejs_settings() {
	add_settings_field(
		'company_name',
		'Company Name',
		'stripejs_textbox_callback',
		'stripejs-group'
	);
			
	register_setting( 'stripejs-group', 'company_name' );
	register_setting( 'stripejs-group', 'company_logo' );
	register_setting( 'stripejs-group', 'stripe_test_secret_key' );
	register_setting( 'stripejs-group', 'stripe_test_published_key' );
	register_setting( 'stripejs-group', 'stripe_live_secret_key' );	
	register_setting( 'stripejs-group', 'stripe_live_published_key' );	
	register_setting( 'stripejs-group', 'stripe_live_test' );	
	register_setting( 'stripejs-group', 'success_callback' );	
	register_setting( 'stripejs-group', 'failure_callback' );	
}

function stripejs_textbox_callback($args) {  // Textbox Callback
    echo '<tr valign="top">';
    echo '<th scope="row">Company Name</th>';
    echo '<td><input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="" /></td>';
    echo '</tr>';
    //echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}	

function stripejs_plugin_settings_page() {
	if (isset($_POST['submit'])) {
            update_option('stripe_company_name',$_POST['stripe_company_name']);
            update_option('stripe_company_logo',$_POST['stripe_company_logo']);
            update_option('stripe_test_secret_key',$_POST['stripe_test_secret_key']);
            update_option('stripe_test_published_key',$_POST['stripe_test_published_key']);
            update_option('stripe_live_secret_key',$_POST['stripe_live_secret_key']);
            update_option('stripe_live_published_key',$_POST['stripe_live_published_key']);
            update_option('stripe_live_test',$_POST['stripe_live_test']);
            update_option('stripe_success_callback',$_POST['stripe_success_callback']);
            update_option('stripe_failure_callback',$_POST['stripe_failure_callback']);
            update_option('stripe_checkout_jsfunc',$_POST['stripe-checkout-jsfunc']);
            update_option('stripe_api_version',$_POST['stripe_api_version']);
	}
	$livetest = get_option('stripe_live_test');
?>
<div class="wrap">
<?php
	if (isset($_GET['subpage']) && $_GET['subpage']=='help') :
?>
		<h1>StripeJS Help</h1>
		
		<p>An introduction tutorial video.</p>

		<video width="320" height="240" controls>
			<source src="<?php echo plugins_url('stripejs/extra/help.mp4'); ?>" type="video/mp4">
			Your browser does not support the video tag.
		</video> 		
		
		<p>For issues and change requests, visit <a href="https://githib.com/phkcorporation/stripejs" target="_blank">https://githib.com/phkcorporation/stripejs</a></p>

<?php else : ?>
		<h1>StripeJS</h1>

		<form method="post" >
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Company Name</th>
				<td><input type="text" name="stripe_company_name" value="<?php echo esc_attr( get_option('stripe_company_name') ); ?>" /></td>
				</tr>

				<tr valign="top">
				<th scope="row">Company Logo</th>
				<td><input type="text" size="80" name="stripe_company_logo" value="<?php echo esc_attr( get_option('stripe_company_logo') ); ?>" /></td>
				</tr>
                <tr>
                    <th>Stripe</th>
                    <td>
                        <fieldset>
                            <table>
                                <tr valign="top">
                                <th scope="row">Stripe Live/Test</th>
                                <td>
                                        <select name="stripe_live_test" >
                                                <option value="" <?php echo($livetest == '' ? 'selected':''); ?>>Select</option>
                                                <option value="test" <?php echo( $livetest == 'test' ? 'selected':'' ); ?>>Test</option>
                                                <option value="live" <?php echo( $livetest == 'live' ? 'selected':'' ); ?>>Live</option>
                                        </select>
                                </td>
                                </tr>
                                <tr>
                                    <th>Stripe API Version</th>
                                    <td><input type="text" size="80" name="stripe_api_version" id="stripe_api_version" value="<?php echo esc_attr(get_option('stripe_api_version')); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>Stripe CheckOut JS Function</th>
                                    <td><input type="text" size="80" name="stripe-checkout-jsfunc" id="stripe-checkout-jsfunc" value="<?php echo esc_attr(get_option('stripe_checkout_jsfunc')); ?>" /></td>
                                </tr>

                                <tr valign="top">
                                <th scope="row">Stripe Test Secret Key</th>
                                <td><input type="text" size="80" name="stripe_test_secret_key" value="<?php echo esc_attr( get_option('stripe_test_secret_key') ); ?>" /></td>
                                </tr>

                                <tr valign="top">
                                <th scope="row">Stripe Test Published Key</th>
                                <td><input type="text" size="80" name="stripe_test_published_key" value="<?php echo esc_attr( get_option('stripe_test_published_key') ); ?>" /></td>
                                </tr>

                                <tr valign="top">
                                <th scope="row">Stripe Live Secret Key</th>
                                <td><input type="text" size="80" name="stripe_live_secret_key" value="<?php echo esc_attr( get_option('stripe_live_secret_key') ); ?>" /></td>
                                </tr>

                                <tr valign="top">
                                <th scope="row">Stripe Live Published Key</th>
                                <td><input type="text" size="80" name="stripe_live_published_key" value="<?php echo esc_attr( get_option('stripe_live_published_key') ); ?>" /></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
				<tr valign="top">
				    <th scope="row">Success Page Callback</th>
				    <td><input type="text" size="80" name="stripe_success_callback" value="<?php echo esc_attr( get_option('stripe_success_callback') ); ?>" /></td>
				</tr>

				<tr valign="top">
				    <th scope="row">Failure Page Callback</th>
				    <td><input type="text" size="80" name="stripe_failure_callback" value="<?php echo esc_attr( get_option('stripe_failure_callback') ); ?>" /></td>
				</tr>
			</table>
    
		<?php submit_button(); ?>
	</form>
<?php endif; ?>
</div>
<?php 	
}

?>