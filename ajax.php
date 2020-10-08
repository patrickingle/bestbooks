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

?>