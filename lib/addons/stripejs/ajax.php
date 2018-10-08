<?php

/*
 * AJAX Interfaces
 */

// AJAX callback code to process charge with token
add_action( 'wp_ajax_stripejs_process', 'stripejs_checkout_process' );
add_action( 'wp_ajax_nopriv_stripejs_process', 'stripejs_checkout_process' );

function stripejs_checkout_process() {
    date_default_timezone_set('America/New_York');
    $currency = 'usd';
    $amount = $_POST['amount'];
    $livetest = get_option('stripe_live_test');
    if ($livetest == 'live') {
       $stripe_secret_key = get_option('stripe_live_secret_key');
    } else {
       $stripe_secret_key = get_option('stripe_test_secret_key');
    }

    if (isset($_POST['token'])) {
        $token = $_POST['token'];
        $id = $token['id'];
        $uid = $_POST['uid'];
        $plan = $_POST['plan'];


        \Stripe\Stripe::setApiKey($stripe_secret_key);
        \Stripe\Stripe::setApiVersion(get_option('stripe_api_version'));


        try {
            $customer_email = $token['email'];
            $customer_id = get_user_meta($uid,'stripe_customer_id')[0];
            $txdate = date('Y-m-d H:i:s');
            if (empty($customer_id)) {
                $customer = \Stripe\Customer::create(array(
                    "email" => $token['email'],
                    "description" => $token['email'],
                    "source" => $id // obtained with Stripe.js
                ));
                $customer_id = $customer->id;
                $customer_email = $customer->email;
                update_user_meta($uid,'stripe_customer_id',$customer_id);
                update_user_meta($uid,'paid_date',$txdate);
            }
            if (empty($plan)) {
                $charge = \Stripe\Charge::create(array(
                'amount' => $amount, // amount in cents, again
                'currency' => $currency,
                'source' => $id,
                'description' => $_POST['description']
                    ));

            } else {
                $charge = \Stripe\Subscription::create(array(
                    "customer" => $customer_id,
                    "plan" => $plan
                ));

            }

            $args = array(
                  'post_type' => 'transaction',
                  'post_title' => $_POST['email'],
                  'post_content' => json_encode($charge),
                  'post_status' => 'publish'
            );
            if (isset($charge->status) && $charge->status === "active") {
                wp_insert_post($args);

                // Notify listeners that a payment was processed successfullu
                do_action('stripejs_payment_processed', $charge, $amount, $uid, $plan);

                // Update BestBooks of this sale
                do_action('bestbooks_sales_card', $txdate, $_POST['description'], ($amount/100));
            }
                  
            echo json_encode($charge);
        } catch(Exception $e) {
            // The card has been declined
            echo json_encode($e);
        }
    } else {
        echo json_encode($_POST);
    }
    exit;
}

add_action( 'wp_ajax_calculate_shipping', 'stripejs_calculate_shipping' );
add_action( 'wp_ajax_nopriv_calculate_shipping', 'stripejs_calculate_shipping' );

function stripejs_calculate_shipping() {
    $prodid = $_POST['prodid'];

    $livetest = get_option('stripe_live_test');
    if ($livetest == 'live') {
       $stripe_secret_key = get_option('stripe_live_secret_key');
    } else {
       $stripe_secret_key = get_option('stripe_test_secret_key');
    }


    \Stripe\Stripe::setApiKey($stripe_secret_key);
    \Stripe\Stripe::setApiVersion(get_option('stripe_api_version')); // 2016-03-07

    $product = \Stripe\Product::retrieve($prodid);
    echo $product;
}

add_action( 'wp_ajax_refund_request', 'stripejs_refund_request' );
add_action( 'wp_ajax_nopriv_refund_request', 'stripejs_refund_request' );
function stripejs_refund_request() {
    $id = $_POST['id'];
    $amount = $_POST['amount'];

    $current_user_id = get_current_user_id();
    $content = 'Customer ID: '.$id.', Amount: '.$amount;
    $status = stripejs_send_message($current_user_id,1,'Refund Request',$content);
    if ($status) {
        echo json_encode(
                array(
                    'status'=>'success',
                    'message'=>'Refund request for $'.$amount.' has been received. You will receive another confirmation email shortly.'
                )
            );
    } else {
        echo json_encode(
                array(
                    'status'=>'error',
                    'message'=>'Refund request NOT received due to an unknown error occurring'
                )
            );
    }
    exit;
}

add_action( 'wp_ajax_cancel_subscription', 'stripejs_cancel_subscription' );
add_action( 'wp_ajax_nopriv_cancel_subscription', 'stripejs_cancel_subscription' );
function stripejs_cancel_subscription() {
    $id = $_POST['id'];

    $current_user_id = get_current_user_id();
    $content = 'Subscription ID: '.$id;
    $status = stripejs_send_message($current_user_id,1,'Subscription Cancellation Request',$content);
    if ($status) {
        echo json_encode(
                array(
                    'status'=>'success',
                    'message'=>'Subscription cancellation request has been received.'
                )
            );
    } else {
        echo json_encode(
                array(
                    'status'=>'error',
                    'message'=>'Subscription request NOT received due to an unknown error occurring'
                )
            );
    }
    exit;
}

function stripejs_send_message($sender,$rec,$subject,$content) {
    global $wpdb;
    
    $query = 'CREATE TABLE IF NOT EXISTS ' . $wpdb->prefix . 'pm (
            `id` bigint(20) NOT NULL auto_increment,
            `subject` text NOT NULL,
            `content` text NOT NULL,
            `sender` varchar(60) NOT NULL,
            `recipient` varchar(60) NOT NULL,
            `date` datetime NOT NULL,
            `read` tinyint(1) NOT NULL,
            `deleted` tinyint(1) NOT NULL,
            PRIMARY KEY (`id`)
    ) COLLATE utf8_general_ci;';

    // Note: deleted = 1 if message is deleted by sender, = 2 if it is deleted by recipient

    $wpdb->query( $query );
        
    $new_message = array(
            'id'        => NULL,
            'subject'   => $subject,
            'content'   => $content,
            'sender'    => $sender,
            'recipient' => $rec,
            'date'      => current_time( 'mysql' ),
            'read'      => 0,
            'deleted'   => 0
    );
    // insert into database
    if ( $wpdb->insert( $wpdb->prefix . 'pm', $new_message, array( '%d', '%s', '%s', '%s', '%s', '%s', '%d', '%d' ) ) )
    {
        return true;
    }
    
    return false;
}

?>