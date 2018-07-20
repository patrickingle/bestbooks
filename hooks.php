<?php
// hooks.php

if (!function_exists('bestbooks_create_account')) {
	add_action('bestbooks_create_account','bestbooks_create_account', 10, 2);

	function bestbooks_create_account($name, $type) {
	    $coa = new ChartOfAccounts();
	    $coa->add($name, $type);
	}
}

if (!function_exists('bestbooks_add_credit')) {
	add_action('bestbooks_add_credit', 'bestbooks_add_credit', 10, 4);

	function bestbooks_add_credit($account, $date, $description, $amount) {
		$account->addcredit($wpdb, $date, $description, $amount);
	}
}

if (!function_exists('bestbooks_add_debit')) {
	add_action('bestbooks_add_debit', 'bestbooks_add_debit', 10, 4);

	function bestbooks_add_debit($account, $date, $description, $amount) {
		$account->adddebit($date, $description, $amount);
	}
}


/**
 * Debit Accounts: Assets & Expenses
 * From: https://www.keynotesupport.com/accounting/accounting-basics-debits-credits.shtml
 * 
 * Because Asset and Expense accounts maintain positive balances, they are positive, or debit 
 * accounts. Accounting books will say “Accounts that normally have a positive balance are
 *  increased with a Debit and decreased with a Credit.” Of course they are! Look at the 
 * number line. If you add a positive number (debit) to a positive number, you get a bigger
 * positive number. But if you start with a positive number and add a negative number 
 * (credit), you get a smaller positive number (you move left on the number line). 
 * The asset account called Cash, or the checking account, is unique in that it routinely
 * receives debits and credits, but its goal is to maintain a positive balance!
 */

if (!function_exists('bestbooks_asset')) {
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
}

if (!function_exists('bestbooks_expense')) {
	add_action('bestbooks_expense', 'bestbooks_expense', 10, 4);

	function bestbooks_expense($account, $txdate, $description, $amount) {
		$coa = new ChartOfAccounts();
		$coa->add($account, "Asset");

		$expense = new Expense($account);

		if ($amount < 0) {
			$expense->decrease($txdate, $description, $amount);
		} else {
			$expense->increase($txdate, $description, $amount);
		}
	}
}

/**
 * Credit Accounts: Liabilities, Equity, & Revenue
 * From: https://www.keynotesupport.com/accounting/accounting-basics-debits-credits.shtml
 *
 * Liability, Equity, and Revenue accounts usually receive credits, so they maintain negative 
 * balances. They are called credit accounts. Accounting books will say “Accounts that 
 * normally maintain a negative balance are increased with a Credit and decreased with a 
 * Debit.” Again, look at the number line. If you add a negative number (credit) to a 
 * negative number, you get a larger negative number! (moving left on the number line). But 
 * if you start with a negative number and add a positive number to it (debit), you get a 
 * smaller negative number because you move to the right on the number line.
 * 
 * We have not discussed crossing zero on the number line. If we have $100 in our checking
 * account and write a check for $150, the check will bounce and Cash will have a negative 
 * value - an undesirable event. A negative account might reach zero - such as a loan account 
 * when the final payment is posted. And many accounts, such as Expense accounts, are reset 
 * to zero at the beginning of the new fiscal year. But credit accounts rarely have a 
 * positive balance and debit accounts rarely have a negative balance at any time.
 * 
 * [Remember: A debit adds a positive number and a credit adds a negative number. But you 
 * NEVER put a minus sign on a number you enter into the accounting software.] 
 */

if (!function_exists('bestbooks_liability')) {
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
}

if (!function_exists('bestbooks_equity')) {
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
}

if (!function_exists('bestbooks_revenue')) {
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
}

if (!function_exists('bestbooks_journal_add')) {
	add_action('bestbooks_journal_add', 'bestbooks_journal_add', 10, 5);

	function bestbooks_journal_add($txdate,$ref,$account,$debit,$credit) {
		$journal = new Journal();
		$journal->add($txdate,$ref,$account,$debit,$credit);
	}
}

if (!function_exists('bestbooks_journal_inbalance')) {
	add_action('bestbooks_journal_inbalance', 'bestbooks_journal_inbalance', 10, 0);

	function bestbooks_journal_inbalance() {
		$journal = new Journal();
		return $journal->inBalance();
	}
}

/**
 * Example 1: Owner Invests Capital in the Company
 * From: https://www.keynotesupport.com/accounting/accounting-transactions.shtml
 *
 * Owner invests $5,000.   Analysis: Since money is deposited into the checking account, Cash 
 * is debited (the balance increased by $5,000). What account receives a credit? An Equity 
 * account called Owner’s Equity or Capital Contribution. Since Equity accounts are 
 * ‘negative’ accounts, crediting this Equity account increases its balance by $5,000.
 *
 * Debit Cash (increase its balance)
 * 
 * Credit Owner’s Equity|Capital (increases its balance)
 */
if (!function_exists('bestbooks_investment')) {
	add_action('bestbooks_investment', 'bestbooks_investment', 10, 4);

	function bestbooks_investment($txdate, $description, $amount, $equity='Owners Equity') {
		$coa = new ChartOfAccounts();
		$coa->add('Cash', 'Cash');
		$coa->add($equity, 'Equity');

		$cash = new Cash('Cash');
		$cash->increase($txdate, $description, $amount);

		$equity = new Equity($equity);
		$equity->increase($txdate, $description, $amount);
	}
}

/**
 * Example 2: Company Takes Out a Loan
 * From: https://www.keynotesupport.com/accounting/accounting-transactions.shtml
 *
 * The company borrows $8,000 from a bank.   Analysis: Since the money will be deposited into 
 * the checking account, Cash is debited (the balance increased by $8,000.) The account to 
 * receive the credit is a Liability account called Loans Payable (you may create a separate 
 * account or sub-account for each loan). Liability accounts are credit accounts, so 
 * crediting the Liability account increases its negative balance by $8,000 (moves to the 
 * left on the number line).
 *
 * Debit Cash (increases its balance)
 * 
 * Credit Loans Payable (increases its balance)
 */
if (!function_exists('bestbooks_encumber')) {
	add_action('bestbooks_encumber', 'bestbooks_encumber', 10, 3);

	function bestbooks_encumber($txdate, $description, $amount) {
		$coa = new ChartOfAccounts();
		$coa->add('Cash', 'Cash');
		$coa->add('Loans Payable', 'Liability');

		$cash = new Cash('Cash');
		$cash->increase($txdate, $description, $amount);

		$liability = new Liability('Loans Payable');
		$liability->increase($txdate, $description, $amount);
	}
}

/**
 * Example 3: Monthly Statement Fee from Bank
 * From: https://www.keynotesupport.com/accounting/accounting-transactions.shtml
 *
 * Your bank charges a monthly statement fee of $14.   Analysis: This transaction is entered via a journal 
 * entry each month when the checking account is balanced. Since money was removed from the checking 
 * account, Cash is credited (the balance decreased by $14). The Expense account called Bank Service 
 * Charges receives the debit.
 *
 * Debit Bank Fees (increases its balance)
 *
 * Credit Cash (decreases its balance)
 */
if (!function_exists('bestbooks_bankfee')) {
	add_action('bestbooks_bankfee', 'bestbooks_bankfee', 10, 3);

	function bestbooks_bankfee($txdate, $description, $amount) {
		$coa = new ChartOfAccounts();
		$coa->add('Cash', 'Cash');
		$coa->add('Bank Service Charges', 'Expense');

		$cash = new Cash('Cash');
		$cash->decrease($txdate, $description, $amount);

		$expense = new Expense('Bank Service Charges');
		$expense->increase($txdate, $description, $amount);
	}
}


/**
 * Example 4: Making a Loan Payment
 * From: https://www.keynotesupport.com/accounting/accounting-transactions.shtml
 *
 * You pay $540, via check, on the $8,000 loan acquired in Example 2. Of this amount, $500 is applied to 
 * the principal, and $40 is applied to the loan interest.   Analysis: Since a check is being written, 
 * BestBooks will automatically credit Cash. In this case the debit is split between two accounts. To 
 * reflect the $500 that has been applied to the loan balance, debit the loan account. (Since it is a 
 * liability account, a debit will reduce its balance, which is what you want.) The $40 interest paid is 
 * an expense, so debit the expense account called Loan Interest. Remember that even though the debit is 
 * split between two accounts, the total debit must always equal the total credit.
 *
 * Debit Loans Payable $500 (decreases its balance)
 *
 * Debit Interest Expense $40 (increases its balance)
 *
 * Credit Cash $540 (decreases its balance)
 */
if (!function_exists('bestbooks_loanpayment')) {
	add_action('bestbooks_loanpayment', 'bestbooks_loanpayment', 10, 4);

	function bestbooks_loanpayment($txdate, $description, $amount, $interest) {
		$coa = new ChartOfAccounts();
		$coa->add('Cash', 'Cash');
		$coa->add('Loans Payable', 'Liability');
		$coa->add('Interest Expense', 'Expense');

		$cash = new Cash('Cash');
		$cash->decrease($txdate, $description, ($amount + $interest));

		$liability = new Liability('Loans Payable');
		$liability->decrease($txdate, $description, $amount);

		$expense = new Expense('Interest Expense');
		$expense->increase($txdate, $description, $interest);
	}
}

/**
 * Example 5: Company Writes a Check to Pay for an Asset
 * From: https://www.keynotesupport.com/accounting/accounting-transactions.shtml
 *
 * The Company writes a check for $8,500 of equipment.   Analysis: Since a check was written, BestBooks 
 * will automatically credit Cash. The item is too costly to be considered an expense, so it must be 
 * entered into the accounting system as an asset. So we will debit an Asset account called Equipment or 
 * something similar. In addition, assets must be depreciated over time, with journal entries entered each 
 * year for a proscribed number of years. Depreciation is complicated, so be sure to see your accountant 
 * when purchasing company assets.
 *
 * Debit Equipment (increases its balance)
 *
 * Credit Cash (decreases its balance)
 *
 * [Remember: A debit adds a positive number and a credit adds a negative number. But you NEVER put a 
 * minus sign on a number you enter into the accounting software.] 
 */
if (!function_exists('bestbooks_payassetbycheck')) {
	add_action('bestbooks_payassetbycheck', 'bestbooks_payassetbycheck', 10, 4);

	function bestbooks_payassetbycheck($txdate, $description, $amount, $account) {
		$coa = new ChartOfAccounts();
		$coa->add('Cash', 'Cash');
		$coa->add($account, 'Asset');

		$cash = new Cash('Cash');
		$cash->decrease($txdate, $description, $amount);

		$asset = new Asset($account);
		$asset->increase($txdate, $description, $amount);
	}
}

/**
 * Example 6: Company Writes Check to Pay for Expenses
 * From: https://www.keynotesupport.com/accounting/accounting-transactions.shtml
 *
 * The Company writes a check to pay for $318 of office supplies.   Analysis: Since a check was written, 
 * BestBooks will automatically credit Cash. We debit the Expense account called Office.
 *
 * Debit Office (increases its balance)
 *
 * Credit Cash (decreases its balance)
 */
if (!function_exists('bestbooks_payexpensebycheck')) {
	add_action('bestbooks_payexpensebycheck', 'bestbooks_payexpensebycheck', 10, 4);

	function bestbooks_payexpensebycheck($txdate, $description, $amount, $account) {
		$coa = new ChartOfAccounts();
		$coa->add('Cash', 'Cash');
		$coa->add($account, 'Expense');

		$cash = new Cash('Cash');
		$cash->decrease($txdate, $description, $amount);

		$expense = new Expense($account);
		$expense->increase($txdate, $description, $amount);
	}
}

/**
 * Example 7: Company Uses Credit Card to Pay for Expenses
 * From: https://www.keynotesupport.com/accounting/accounting-transactions.shtml
 *
 * The Company purchases $318 of office supplies and pays with a company credit card. Back in the office, 
 * the bill is entered into the accounting software.   Analysis: When you enter a bill, BestBooks will 
 * automatically credit the Liability account called Accounts Payable. And since you purchased office 
 * supplies, an expense account called Office (or similar) should receive the debit.
 *
 * Debit Office (increase its balance)
 *
 * Credit Accounts Payable (increases its balance)
 */
if (!function_exists('bestbooks_payexpensebycard')) {
	add_action('bestbooks_payexpensebycard', 'bestbooks_payexpensebycard', 10, 4);

	function bestbooks_($txdate, $description, $amount, $account) {
		$coa = new ChartOfAccounts();
		$coa->add($account, 'Expense');
		$coa->add('Accounts Payable', 'Liability');

		$liability = new Liability('Accounts Payable');
		$liability->increase($txdate, $description, $amount);

		$expense = new Expense($account);
		$expense->increase($txdate, $description, $amount);
	}
}


/**
 * Example 8: Company Pays the Credit Card Bill
 * From: https://www.keynotesupport.com/accounting/accounting-transactions.shtml
 *
 * You pay the bill for the $318 of office supplies purchased in Example 7.   Analysis: When the bill was 
 * entered, an expense account called Office (or similar) was debited and Accounts Payable was credited. 
 * Now as we write a check to pay the bill, BestBooks will automatically credit Cash. And the accounting 
 * software will debit Accounts Payable - in effect, reversing the earlier credit.
 *
 * Debit Accounts Payable (decreases its balance)
 *
 * Credit Cash (decrease its balance)
 */
if (!function_exists('bestbooks_cardpayment')) {
	add_action('bestbooks_cardpayment', 'bestbooks_cardpayment', 10, 3);

	function bestbooks_cardpayment($txdate, $description, $amount) {
		$coa = new ChartOfAccounts();
		$coa->add('Cash', 'Cash');
		$coa->add('Accounts Payable', 'Liability');

		$cash = new Cash('Cash');
		$cash->decrease($txdate, $description, $amount);

		$liability = new Liability('Accounts Payable');
		$liability->decrease($txdate, $description, $amount);
	}
}

/**
 * Example 9: Company Pays Cash for a Cost of Good Sold (COGS)
 * From: https://www.keynotesupport.com/accounting/accounting-transactions.shtml
 *
 * The Company pays $450 cash for Product A - a COGS part.   Analysis: When you write the check, 
 * BestBooks will automatically credit Cash. In the check window, choose the COGS account from the 
 * Expenses tab, or choose an Item from the Items tab that is associated with the COGS account. Either 
 * way, the COGS account receives the debit.
 *
 * Debit COGS (increase its balance)
 *
 * Credit Cash (decrease its balance)
 */
if (!function_exists('bestbooks_payment_cash')) {
	add_action('bestbooks_payment_cash', 'bestbooks_payment_cash', 10, 3);

	function bestbooks_payment_cash($txdate, $description, $amount) {
		$coa = new ChartOfAccounts();
		$coa->add('Cash', 'Cash');
		$coa->add('Cost of Goods Sold', 'Expense');

		$cash = new Cash('Cash');
		$cash->decrease($txdate, $description, $amount);

		$cogs = new Expense('Cost of Goods Sold');
		$cogs->increase($txdate, $description, $amount);
	}
}

/**
 * Example 10: Company Receives Cash Payment for a Sale
 * From: https://www.keynotesupport.com/accounting/accounting-transactions.shtml
 *
 * The Company sells Product A for $650 cash.   
 * Analysis: When you enter the cash sale, BestBooks will automatically debit Cash. 
 * You will have to choose an Item for the sale … it might be “Prod A income” and 
 * associated with the Sales account.
 *
 * Debit Cash (increases its balance)
 * 
 * Credit Sales (increases its balance)
 */
if (!function_exists('bestbooks_sales_cash')) {
	add_action('bestbooks_sales_cash', 'bestbooks_sales_cash', 10, 3);

	function bestbooks_sales_cash($txdate, $description, $amount) {
		$coa = new ChartOfAccounts();
		$coa->add("Sales", "Revenue");
		$coa->add("Cash", "Cash");

		$sales = new Revenue("Sales");
		$sales->increase($txdate, $description, $amount);

		$cash = new Cash("Cash");
		$cash->increase($txdate, $description, $amount);
	}
}

/**
 * Example 11: Company Makes a Credit Card Sale
 * From: https://www.keynotesupport.com/accounting/accounting-transactions.shtml
 *
 * The Company sells Product A for $650 on credit.   Analysis: When you create an invoice, 
 * you must specify an Item for each separate charge on the invoice. BestBooks will 
 * automatically credit the revenue account(s) associated with these Items. And BestBooks 
 * will automatically debit the invoice amount to Accounts Receivable.
 *
 * Debit Accounts Receivable (increases the balance)
 *
 * Credit Sales (increases the balance)
 */
if (!function_exists('bestbooks_sales_card')) {
	add_action('bestbooks_sales_card', 'bestbooks_sales_card', 10, 3);

	function bestbooks_sales_card($txdate, $description, $amount) {
		$coa = new ChartOfAccounts();
		$coa->add("Sales", "Revenue");
		$coa->add("Account Receivable", "Asset");

		$sales = new Revenue("Sales");
		$sales->increase($txdate, $description, $amount);

		$ar = new Asset("Account Receivable");
		$ar->increase($txdate, $description, $amount);
	}
}

/**
 * Example 12: Company Receives Payment on an Invoice
 * From: https://www.keynotesupport.com/accounting/accounting-transactions.shtml
 *
 * The Company receives a payment for the $650 invoice above.   Analysis: When you created the invoice, 
 * BestBooks debited the Accounts Receivable account. When you post the invoice payment, BestBooks will 
 * credit A/R - in effect reversing the earlier debit. The accounting software will also debit Cash - 
 * increasing its balance.
 *
 * Debit Cash (increases the balance)
 * 
 * Credit A/R (decreases the balance)
 */
if (!function_exists('bestbooks_accountreceivable_payment')) {
	add_action('bestbooks_accountreceivable_payment', 'bestbooks_accountreceivable_payment', 10, 3);

	function bestbooks_accountreceivable_payment($txdate, $description, $amount) {
		$coa = new ChartOfAccounts();
		$coa->add('Cash', 'Cash');
		$coa->add("Account Receivable", "Asset");

		$cash = new Cash('Cash');
		$cash->increase($txdate, $description, $amount);

		$ar = new Asset("Account Receivable");
		$ar->decrease($txdate, $description, $amount);

	}
}

/**
 * Example 13: Owner Takes Money Out of the Company - a Distribution
 * From: https://www.keynotesupport.com/accounting/accounting-transactions.shtml
 *
 * The owner’s writes himself a check for $1,000.   Analysis: Since a check was written, BestBooks will 
 * automatically credit Cash. The account you chose for the debit is an Equity account called Draw (Sole 
 * Proprietor) or Distribution (Corporation). Note: These are the only non-contra Equity accounts that are 
 * positive accounts and receive debits.
 *
 * Debit Owner’s Draw (increases its balance)
 *
 * Credit Cash (decrease its balance)
 */
if (!function_exists('bestbooks_distribution')) {
	add_action('bestbooks_distribution', 'bestbooks_distribution', 10, 3);

	function bestbooks_distribution($txdate, $description, $amount) {
		$coa = new ChartOfAccounts();
		$coa->add('Cash', 'Cash');
		$coa->add('Distribution', 'Equity');

		$cash = new Cash('Cash');
		$cash->decrease($txdate, $description, $amount);

		$equity = new Equity('Distrbution');
		$equity->increase($txdate, $description, $amount);

	}
}

/**
 * woocommerce_payment_successful_result filter
 *
 * update BestBooks after a successful payment through WooCommerce
 *
 * See: https://docs.woocommerce.com/wc-apidocs/source-class-WC_Checkout.html#808
 *      https://docs.woocommerce.com/wc-apidocs/class-WC_Order.html
 */
if (!function_exists('bestbooks_woocommerce_payment_successful_result')) {
	add_filter('woocommerce_payment_successful_result', 'bestbooks_woocommerce_payment_successful_result', 10, 2 );

	function bestbooks_woocommerce_payment_successful_result($result, $order_id) {
		// https://docs.woocommerce.com/wc-apidocs/class-WC_Order.html
		$order = new WC_Order( $order_id );
		$txdate = $order->get_date_completed()->__toString();
		$description = "WooCommerce Order #$order_id at ".$order->get_view_order_url();
		$amount = $order->get_formatted_order_total();

		bestbooks_sales_card($txdate, $description, $amount);

		return $result;
	}
}

?>