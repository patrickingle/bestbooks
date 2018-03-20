<?php
// hooks.php

add_action('bestbooks_create_account','bestbooks_create_account', 10, 2);

function bestbooks_create_account($name, $type) {
	global $wpdb;

	$coa = get_coa_instance();
	$coa->add($wpdb, $name, $type);

	do_action('bestbooks_create_account');
}

add_action('bestbooks_add_credit', 'bestbooks_add_credit', 10, 4);

function bestbooks_add_credit($account, $date, $description, $amount) {
	global $wpdb;

	$account->addcredit($wpdb, $date, $description, $amount);

	do_action('bestbooks_add_credit');
}

add_action('bestbooks_add_debit', 'bestbooks_add_debit', 10, 4);

function bestbooks_add_debit($account, $date, $description, $amount) {
	global $wpdb;

	$account->adddebit($date, $description, $amount);

	do_action('bestbooks_add_debit');
}
?>