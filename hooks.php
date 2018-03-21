<?php
// hooks.php

add_action('bestbooks_create_account','bestbooks_create_account', 10, 2);

function bestbooks_create_account($name, $type) {
    $coa = new ChartOfAccounts();
    $coa->add($name, $type);
}

add_action('bestbooks_add_credit', 'bestbooks_add_credit', 10, 4);

function bestbooks_add_credit($account, $date, $description, $amount) {
	$account->addcredit($wpdb, $date, $description, $amount);
}

add_action('bestbooks_add_debit', 'bestbooks_add_debit', 10, 4);

function bestbooks_add_debit($account, $date, $description, $amount) {
	$account->adddebit($date, $description, $amount);
}

add_action('bestbooks_sales', 'bestbooks_sales', 10, 4);

function bestbooks_sales($account, $txdate, $description, $amount) {
    $coa = new ChartOfAccounts();
    $coa->add($account, "Revenue");

	$sales = new Revenue($account);
	$sales->increase($txdate, $description, $amount);
}

add_action('bestbooks_asset', 'bestbooks_asset', 10, 4);

function bestbooks_asset($account, $txdate, $description, $amount) {
    $coa = new ChartOfAccounts();
    $coa->add($account, "Asset");

    $asset = new Asset($account);

    if ($amount < 0) {
    	$asset->decrease($txdate, $description, $amount);
    } else {
    	$asset->increase($txdate, $description, $amount);
    }
}

add_action('bestbooks_revenue', 'bestbooks_revenue', 10, 4);

function bestbooks_revenue($account, $txdate, $description, $amount) {
    $coa = new ChartOfAccounts();
    $coa->add($account, "Revenue");

	$revenue = new Revenue($account);
	if ($amount < 0) {
		$revenue->decrease($txdate, $description, $amount);
	} else {
		$revenue->increase($txdate, $description, $amount);
	}
}

add_action('bestbooks_liability', 'bestbooks_liability', 10, 4);

function bestbooks_liability($account, $txdate, $description, $amount) {
    $coa = new ChartOfAccounts();
    $coa->add($account, "Liability");

    $liability = new Liability($account);
    if ($amount < 0) {
    	$liability->decrease($txdate, $description, $amount);
    } else {
    	$liability->increase($txdate, $description, $amount);
    }
}

add_action('bestbooks_equity', 'bestbooks_equity', 10, 4);

function bestbooks_equity($account, $txdate, $description, $amount) {
    $coa = new ChartOfAccounts();
    $coa->add($account, "Equity");

    $equity = new Equity($account);
    if ($amount < 0) {
    	$equity->increase($txdate, $description, $amount);
    } else {
    	$equity->decrease($txdate, $description, $amount);
    }
}

add_action('bestbooks_journal_add', 'bestbooks_journal_add', 10, 5);

function bestbooks_journal_add($txdate,$ref,$account,$debit,$credit) {
	$journal = new Journal();
	$journal->add($txdate,$ref,$account,$debit,$credit);
}

add_action('bestbooks_journal_inbalance', 'bestbooks_journal_inbalance', 10, 0);

function bestbooks_journal_inbalance() {
	$journal = new Journal();
	return $journal->inBalance();
}

?>