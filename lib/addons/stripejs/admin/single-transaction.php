<?php

/* 
 * Template Name: Transaction View Template
 */

if (!current_user_can('administrator')) {
    wp_die('You are not authorized for this operation');
    exit;
} else {
    get_header();
    
    global $post;
    
    $transaction = json_decode($post->post_content);

    ?>
    <h2>Transaction for user: <b><?php echo $post->post_title; ?></b></h2>
    <table>
        <tr>
            <th>Amount</th>
            <td><b>$<?php echo number_format($transaction->amount/100,2); ?></b></td>
        </tr>
        <tr>
            <th>Transaction Date</th>
            <td><b><?php echo $post->post_date; ?></b></td>
        </tr>
        <tr>
            <th valign="top">Response</th>
            <td><pre><?php print_r($transaction); ?></pre></td>
        </tr>
    </table>
    <?php
    get_footer();
}

?>