<?php

/* 
 * Shortcode Implementation
 */

add_action('init', 'stripejs_shortcodes_init');

function stripejs_shortcodes_init()
{
    add_shortcode('stripejs_checkout', 'stripejs_checkout_form_shortcode');
}


// shortcode to add Stripe form
function stripejs_checkout_form_shortcode($atts = [], $content = null, $tag = '') {
	// normalize attribute keys, lowercase
    $atts = array_change_key_case((array)$atts, CASE_LOWER);
	
    $livetest = get_option('stripe_live_test');
    if ($livetest == 'live') {
            $stripe_secret_key = get_option('stripe_live_secret_key');
            $stripe_published_key = get_option('stripe_live_published_key');
    } else {
            $stripe_secret_key = get_option('stripe_test_secret_key');
            $stripe_published_key = get_option('stripe_test_published_key');
    }
 
    // override default attributes with user attributes
    $stripejs_atts = shortcode_atts([
                                    'handler' => 'handler',
                                    'amount' => 999,
                                    'name' => get_option('company_name'),
                                    'description' => 'Renewal',
                                    'email' => '',
                                    'image' => get_option('company_logo'),
                                    'key' => $stripe_published_key,
                                    'label' => 'Proceed to Payment',
                                    'id' => 'contact-submit',
                                    'data_submit' => '...Loading',
                                    'style' => '',
                                    'billing' => 'true',
                                    'shipping' => 'false',
                                    'prodid' => '',
                                    'class' => '',
                                    'button' => '',
                                    'plan' => ''
                                 ], $atts, $tag);
 
	$jquery_url = home_url('/wp-includes/js/jquery/jquery.js');
	$ajax_url = admin_url('admin-ajax.php');
	
	$success_url = get_option('stripe_success_callback');
	$failure_url = get_option('stripe_failure_callback');
        
    $checkout_callback = '';
    if (!empty($stripejs_atts['js_cb'])) {
        $checkout_callback = $stripejs_atts['js_cb'].'("'.$stripejs_atts['handler'].'");';
    } else {
        $stripe_js_callback = get_option('stripe_checkout_jsfunc');
        if (!empty($stripe_js_callback)) {
            $checkout_callback = $stripe_js_callback.'("'.$stripejs_atts['handler'].'");';
        }
    }

    global $current_user;
    $current_user = wp_get_current_user();

    $button_code = '<button name="'.$stripejs_atts['id'].'" type="submit" id="'.$stripejs_atts['id'].'" data-submit="'.$stripejs_atts['data_submit'].'" class="'.$stripejs_atts['class'].'" style="'.$stripejs_atts['style'].'" data-plan="'.$stripejs_atts['plan'].'" >'.$stripejs_atts['label'].'</button>';
    if (!empty($stripejs_atts['button'])) {
        $button_code = '<img src="'.$stripejs_atts['button'].'" name="'.$stripejs_atts['id'].'" id="'.$stripejs_atts['id'].'" data-submit="'.$stripejs_atts['data_submit'].'" class="'.$stripejs_atts['class'].'" style="'.$stripejs_atts['style'].'" data-plan="'.$stripejs_atts['plan'].'" >';
    }        
    // start output
    $o = '';	
    $o = <<<EOT
                
$button_code

<script>

jQuery(document).ready(function($){
    $('#$stripejs_atts[id]').bind('click',function(evt){
        $stripejs_atts[handler]_stripeCheckout();
    });
    
    $stripejs_atts[handler]_stripeCheckout = function() {
        // Open Checkout with further options:
        var billingShipping = $stripejs_atts[billing];
        if (billingShipping != false) {
            $stripejs_atts[handler].open({
                name: '$stripejs_atts[name]',
                description: '$stripejs_atts[description]',
                amount: $stripejs_atts[amount],
                email: '$stripejs_atts[email]',
                shippingAddress: true,
                billingAddress: true,
            });
        } else {
            $stripejs_atts[handler].open({
                name: '$stripejs_atts[name]',
                description: '$stripejs_atts[description]',
                amount: $stripejs_atts[amount],
                email: '$stripejs_atts[email]',
            });
        }
    }

	$stripejs_atts[handler]_processPayment = function(token,id,email) {
		$.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				'action': 'stripejs_process',
				'token': token,
				'id': id,
				'email': email,
				'amount': $stripejs_atts[amount],
				'description': '$stripejs_atts[description]',
                'uid': $current_user->ID,
                'plan': '$stripejs_atts[plan]'
			},
			success: function(results){
				//createCookie('stripe-response',results,1);
                var charge = $.parseJSON(results);
                console.log(charge);
				if (charge.status == "succeeded" || charge.status == "active") {
					window.location.href = '$success_url';
				} else {
					window.location.href = '$failure_url';
				}
			}
		});
	}
});
            
var $stripejs_atts[handler] = StripeCheckout.configure({
	key: '$stripejs_atts[key]',
	image: '$stripejs_atts[image]',
	locale: 'auto',
	token: function(token) {
		// You can access the token ID with `token.id`.
		// Get the token ID to your server-side code for use.
		$stripejs_atts[handler]_processPayment(token,token.id,token.email);
	}
});


// Close Checkout on page navigation:

window.addEventListener('popstate', function() {
  $stripejs_atts[handler].close();
});

</script>
EOT;

	return $o;
}

?>