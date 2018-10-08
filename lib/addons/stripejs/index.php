<?php 
/*
 * Plugin Name: StripeJS Checkout
 * Version: 4.3.0
 * Description: The functionality to invoke a Stripe JavaScript popup checkout dialog
 * Plugin URI: https://github.com/phkcorporation/stripejs
 * Author: PHK Corporation
 * Author URI: https://phkcorp.com 
 * License: MIT
 */

require dirname(__FILE__).'/stripe/init.php';
require_once dirname(__FILE__).'/page-template.php';
require_once dirname(__FILE__).'/admin/menu.php';
require_once dirname(__FILE__).'/admin/dashboard.php';
require_once dirname(__FILE__).'/ajax.php';
require_once dirname(__FILE__).'/shortcode.php';
require_once dirname(__FILE__).'/metabox.php';



add_action('wp_head', 'stripejs_add_scripts');


function stripejs_add_scripts() {
    echo '<script type="text/javascript" src="https://checkout.stripe.com/checkout.js"></script>';
}

?>