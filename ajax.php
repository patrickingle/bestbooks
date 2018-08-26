<?php
// ajax.php

add_action( 'wp_ajax_bestbooks_add_chartofaccount', 'bestbooks_add_chartofaccount' );
add_action( 'wp_ajax_nopriv_bestbooks_add_chartofaccount', 'bestbooks_add_chartofaccount' );

function bestbooks_add_chartofaccount() {
	//require_once dirname(__FILE__).'/vendor/autoload.php';

	$name = $_POST['aname'];
	$type = $_POST['atype'];

	$coa = new ChartOfAccounts();
	$coa->add($name, $type);
	echo "Account $name of $type added successfully!";
	exit;
}

add_action( 'wp_ajax_bestbooks_delete_chartofaccount', 'bestbooks_delete_chartofaccount' );
add_action( 'wp_ajax_nopriv_bestbooks_delete_chartofaccount', 'bestbooks_delete_chartofaccount' );

function bestbooks_delete_chartofaccount() {
	$name = $_POST['aname'];
	$coa = new ChartOfAccounts();
	echo $coa->remove($name);
	exit;
}

add_action( 'wp_ajax_bestbooks_add_transaction', 'bestbooks_add_transaction' );
add_action( 'wp_ajax_nopriv_bestbooks_add_transaction', 'bestbooks_add_transaction' );

function bestbooks_add_transaction() {
	/*
	$txdate = $_POST['tdate'];
	$description = $_POST['tdesc'];
	$amount = doubleval($_POST['tamount']);
	$account = $_POST['taccount'];
	$type = $_POST['ttype'];
	if (strtolower($type) === 'revenue') {
		do_action('bestbooks_credit_sale', $txdate, $description, abs($amount), $account );
	}

	echo "Added new transaction successfully";
	*/
	echo "NOT IMPLEMENTED";
	exit;
}
?>