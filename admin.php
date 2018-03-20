<?php
/**
 * Administration
 */

//add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )

function bestbooks_dashboard() {
	add_menu_page("BestBooks", "BestBooks", "manage_options", 'bestbooks', 'bestbooks_dashboard_page', 'dashicons-portfolio', 2 );

	/* Sales */
	add_submenu_page( 'bestbooks', 'Sales', 'Sales', 'manage_options', 'bestbooks_sales', 'bestbooks_dashboard_sales' ); 
	add_submenu_page( 'bestbooks_sales', 'Estimates', 'Estimates', 'manage_options', 'bestbooks_sales_estimates', 'bestbooks_dashboard_sales_estimates');
	add_submenu_page( 'bestbooks_sales', 'Invoices', 'Invoices', 'manage_options', 'bestbooks_sales_invoices', 'bestbooks_dashboard_sales_invoices');
	add_submenu_page( 'bestbooks_sales', 'Recurring Invoices', 'Recurring Invoices', 'manage_options', 'bestbooks_sales_recurringinvoices', 'bestbooks_dashboard_sales_recurringinvoices');
	add_submenu_page( 'bestbooks_sales', 'Payments', 'Payments', 'manage_options', 'bestbooks_sales_payments', 'bestbooks_dashboard_sales_payments');
	add_submenu_page( 'bestbooks_sales', 'Customer Statements', 'Customer Statements', 'manage_options', 'bestbooks_sales_customerstatements', 'bestbooks_dashboard_sales_customerstatements');
	add_submenu_page( 'bestbooks_sales', 'Customers', 'Customers', 'manage_options', 'bestbooks_sales_customers', 'bestbooks_dashboard_sales_customers');
	add_submenu_page( 'bestbooks_sales', 'Products &amp; Services', 'Products &amp; Services', 'manage_options', 'bestbooks_sales_productsnservices', 'bestbooks_dashboard_sales_productsnservices');

	/* Purchases */
	add_submenu_page( 'bestbooks', 'Purchases', 'Purchases', 'manage_options', 'bestbooks_purchases', 'bestbooks_dashboard_purchases' ); 
	add_submenu_page( 'bestbooks_purchases', 'Bills', 'Bills', 'manage_options', 'bestbooks_purchases_bills', 'bestbooks_dashboard_purchases_bills');
	add_submenu_page( 'bestbooks_purchases', 'Receipts', 'Receipts', 'manage_options', 'bestbooks_purchases_receipts', 'bestbooks_dashboard_purchases_receipts');
	add_submenu_page( 'bestbooks_purchases', 'Vendors', 'Vendors', 'manage_options', 'bestbooks_purchases_vendors', 'bestbooks_dashboard_purchases_vendors');
	add_submenu_page( 'bestbooks_purchases', 'Products &amp; Services', 'Products &amp; Services', 'manage_options', 'bestbooks_purchases_productsnservices', 'bestbooks_dashboard_purchases_productsnservices');

	/* Accounting */
	add_submenu_page( 'bestbooks', 'Accounting', 'Accounting', 'manage_options', 'bestbooks_accounting', 'bestbooks_dashboard_accounting' ); 
	add_submenu_page( 'bestbooks_accounting', 'Transactions', 'Transactions', 'manage_options', 'bestbooks_accounting_transactions', 'bestbooks_dashboard_accounting_transactions');
	add_submenu_page( 'bestbooks_accounting', 'Chart of Accounts', 'Chart of Accounts', 'manage_options', 'bestbooks_accounting_chartofaccounts', 'bestbooks_dashboard_accounting_chartofaccounts');
	add_submenu_page( 'bestbooks_accounting', 'Journal Transactions', 'Journal Transactions', 'manage_options', 'bestbooks_accounting_journaltransactions', 'bestbooks_dashboard_accounting_journaltransactions');
	add_submenu_page( 'bestbooks_accounting', 'Starting Balances', 'Starrting Balances', 'manage_options', 'bestbooks_accounting_startingbalances', 'bestbooks_dashboard_accounting_startingbalances');

	/* Banking */
	add_submenu_page( 'bestbooks', 'Banking', 'Banking', 'manage_options', 'bestbooks_banking', 'bestbooks_dashboard_banking' ); 

	/* Payroll */
	add_submenu_page( 'bestbooks', 'Payroll', 'Payroll', 'manage_options', 'bestbooks_payroll', 'bestbooks_dashboard_payroll' );

	/* Reports */ 
	add_submenu_page( 'bestbooks', 'Reports', 'Reports', 'manage_options', 'bestbooks_reports', 'bestbooks_dashboard_reports' ); 
	add_submenu_page( 'bestbooks_reports', 'Bakance Sheet', 'Balance Sheet', 'manage_options', 'bestbooks_reports_balancesheet', 'bestbooks_dashboard_reports_balancesheet');
	add_submenu_page( 'bestbooks_reports', 'Income Statement', 'Income Statement', 'manage_options', 'bestbooks_reports_incomestatement', 'bestbooks_dashboard_reports_incomestatement');
	add_submenu_page( 'bestbooks_reports', 'Sales Tax Report', 'Sales Tax Report', 'manage_options', 'bestbooks_reports_salestaxreport', 'bestbooks_dashboard_reports_salestaxreport');
	add_submenu_page( 'bestbooks_reports', 'Payroll Wage &amp; Tax Report', 'Payroll Wage &amp; Tax Report', 'manage_options', 'bestbooks_reports_payrollwagetaxreport', 'bestbooks_dashboard_reports_payrollwagetaxreport');
	add_submenu_page( 'bestbooks_reports', 'Income by Customer', 'Income by Customer', 'manage_options', 'bestbooks_reports_incomebycustomer', 'bestbooks_dashboard_reports_incomebycustomer');
	add_submenu_page( 'bestbooks_reports', 'Aged Receivables', 'Aged Receivables', 'manage_options', 'bestbooks_reports_agedreceivables', 'bestbooks_dashboard_reports_agedreceivables');
	add_submenu_page( 'bestbooks_reports', 'Expense by Vendor', 'Expense by Vendor', 'manage_options', 'bestbooks_reports_expensebyvendor', 'bestbooks_dashboard_reports_expensebyvendor');
	add_submenu_page( 'bestbooks_reports', 'Aged Payables', 'Aged Payables', 'manage_options', 'bestbooks_reports_agedpayables', 'bestbooks_dashboard_reports_agedpayables');
	add_submenu_page( 'bestbooks_reports', 'General Ledger', 'General Ledger', 'manage_options', 'bestbooks_reports_general_ledger', 'bestbooks_dashboard_reports_general_ledger');
	add_submenu_page( 'bestbooks_reports', 'Account Transactions', 'Account Transactions', 'manage_options', 'bestbooks_reports_account_transactions', 'bestbooks_dashboard_reports_account_transactions');
	add_submenu_page( 'bestbooks_reports', 'Trial Balance', 'Trial Balance', 'manage_options', 'bestbooks_reports_trialbalance', 'bestbooks_dashboard_reports_trialbalance');
	add_submenu_page( 'bestbooks_reports', 'Gain/Loss on foreign Currency Exchange', 'Gain/Loss on foreign Currency Exchange', 'manage_options', 'bestbooks_reports_gainlossonforeigncurrencyexchange', 'bestbooks_dashboard_reports_gainlossonforeigncurrencyexchange');

}

function bestbooks_dashboard_page() {
	?>
	<div class="wrap">
		<h2>BestBooks</h2>
	</div>
	<?php
}

function bestbooks_dashboard_sales() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - Sales</h2>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_sales_estimates'); ?>">Estimates</a><br/>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_sales_invoices'); ?>">Invoices</a><br/>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_sales_recurringinvoices'); ?>">Recurring Invoices</a><br/>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_sales_payments'); ?>">Payments</a><br/>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_sales_customerstatements'); ?>">Customer Statements</a><br/>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_sales_customers'); ?>">Customers</a><br/>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_sales_productsnservices'); ?>">Products &amp; Services</a><br/>
	</div>
	<?php	
}

function bestbooks_dashboard_sales_estimates() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>
			BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Estimates&nbsp;
			<input type="button" class="w3-button w3-blue" name="add-estimate" id="add-estimate" value="Create an Estimate" />
		</h2>
		<table>
			<th>Status</th>
			<th>Date</th>
			<th>Number</th>
			<th>Customer</th>
			<th>Amount</th>
			<tr>
				<td></td><td></td><td></td><td></td><td></td>
			</tr>
		</table>
	</div>
	<?php	
}

function bestbooks_dashboard_sales_invoices() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Invoices&nbsp;
			<input type="button" class="w3-button w3-blue" id="add-invoice" value="Create an Invoice" />
		</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_sales_recurringinvoices() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Recurring Invoices&nbsp;
			<input type="button" class="w3-button w3-blue" id="add-recurring-invoice" value="Create an Recurring Invoice" />
		</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_sales_payments() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Payments</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_sales_customerstatements() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Customer Statements</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_sales_customers() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Customers&nbsp;
			<input type="button" class="w3-button w3-blue" id="add-customer" value="Add a Customer" />
		</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_sales_productsnservices() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Products &amp; Services&nbsp;
			<input type="button" class="w3-button w3-blue" id="add-product-service" value="Add a product or service" />
		</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_purchases() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - Purchases</h2>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_purchases_bills'); ?>">Bills</a><br/>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_purchases_receipts'); ?>">Receipts</a><br/>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_purchases_vendors'); ?>">Vendors</a><br/>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_purchases_productsnservices'); ?>">Product &amp; Services</a><br/>
	</div>
	<?php	
}

function bestbooks_dashboard_purchases_bills() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_purchases'); ?>">Purchases</a> - Bills</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_purchases_receipts() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_purchases'); ?>">Purchases</a> - Receipts</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_purchases_vendors() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_purchases'); ?>">Purchases</a> - Vendors</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_purchases_productsnservices() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_purchases'); ?>">Purchases</a> - Products &amp; Services</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_accounting() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - Accounting</h2>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_accounting_transactions'); ?>">Transactions</a><br>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_accounting_chartofaccounts'); ?>">Chart of Accounts</a><br>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_accounting_journaltransactions'); ?>">Journal Transactions</a><br>
		<a class="primary_button button w3-button w3-block w3-blue" href="<?php echo admin_url('admin.php?page=bestbooks_accounting_startingbalances'); ?>">Starting Balances</a><br>
	</div>
	<?php	
}

function bestbooks_dashboard_accounting_transactions() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_accounting'); ?>">Accounting</a> - Transactions</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_accounting_chartofaccounts() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_accounting'); ?>">Accounting</a> - Chart of Accounts&nbsp;
			<input type="button" id="add_account" value="Add Account" class="w3-button w3-blue" />
		</h2>
		<?php
		$coa = get_coa_instance();
		echo '<pre>'; print_r($coa); echo '</pre>';
		?>
		<table>
			<tr class="w3-lightgrey">
				<th>Name</th>
				<th>Action</th>
			</tr>
		</table>
	</div>
	<div id="add-account-dialog" title="Add New Account" style="display:none;">
			<p>appear now</p>
	</div>		
	<script>
		jQuery(document).ready(function($){
			$("#add-account-dialog").dialog({
    			autoOpen : false, modal : true, show : "blind", hide : "blind"
  			});
			$('#add_account').bind('click', function(){
				$("#add-account-dialog").dialog("open");
				return false;
			});
		});
	</script>
	<?php	
}

function bestbooks_dashboard_accounting_journaltransactions() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_accounting'); ?>">Accounting</a> - Journal Transactions</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_accounting_startingbalances() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_accounting'); ?>">Accounting</a> - Starting Balances</h2>
	</div>
	<?php	
}


function bestbooks_dashboard_banking() {
	?>
	<div class="wrap">
		<h2>BestBooks - Banking</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_payroll() {
	?>
	<div class="wrap">
		<h2>BestBooks - Payroll</h2>
	</div>
	<?php	
}

function bestbooks_dashboard_reports() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - Reports</h2>
		<fieldset>
			<legend>Financial Statements</legend>
			<a href="<?php echo admin_url('admin.php?page=bestbooks_reports_balancesheet'); ?>" class="primary_button button w3-button w3-block w3-blue">Balance Sheet</a><br/>
			<a href="<?php echo admin_url('admin.php?page=bestbooks_reports_incomestatement'); ?>" class="primary_button button w3-button w3-block w3-blue">Income Statement</a>
		</fieldset>
		<fieldset>
			<legend>Taxes</legend>
			<a href="<?php echo admin_url('admin.php?page=bestbooks_reports_salestaxreport'); ?>" class="primary_button button w3-button w3-block w3-blue">Sales Tax Report</a><br/>
			<a href="<?php echo admin_url('admin.php?page=bestbooks_reports_payrollwagetaxreport'); ?>" class="primary_button button w3-button w3-block w3-blue">Payroll Wage &amp; Tax Report</a>
		</fieldset>
		<fieldset>
			<legend>Customers</legend>
			<a href="<?php echo admin_url('admin.php?page=bestbooks_reports_incomebycustomer'); ?>" class="primary_button button w3-button w3-block w3-blue">Income by Customer</a><br/>
			<a href="<?php echo admin_url('admin.php?page=bestbooks_reports_agedreceivables'); ?>" class="primary_button button w3-button w3-block w3-blue">Aged Receivables</a>
		</fieldset>
		<fieldset>
			<legend>Vendors</legend>
			<a href="<?php echo admin_url('admin.php?page=bestbooks_reports_expensebyvendor'); ?>" class="primary_button button w3-button w3-block w3-blue">Expense by Vendor</a><br/>
			<a href="<?php echo admin_url('admin.php?page=bestbooks_reports_agedpayables'); ?>" class="primary_button button w3-button w3-block w3-blue">Aged Payables</a>
		</fieldset>
		<fieldset>
			<legend>Other</legend>
			<a href="<?php echo admin_url('admin.php?page=bestbooks_reports_general_ledger'); ?>" class="primary_button button w3-button w3-block w3-blue">General Ledger</a><br/>
			<a href="<?php echo admin_url('admin.php?page=bestbooks_reports_account_transactions'); ?>" class="primary_button button w3-button w3-block w3-blue">Account Transactions</a><br/>
			<a href="<?php echo admin_url('admin.php?page=bestbooks_reports_trialbalance'); ?>" class="primary_button button w3-button w3-block w3-blue">Trial Balance</a><br/>
			<a href="<?php echo admin_url('admin.php?page=bestbooks_reports_gainlossonforeigncurrencyexchange'); ?>" class="primary_button button w3-button w3-block w3-blue">Gain/Loss on Foreign Currency Exchange</a>
		</fieldset>
	</div>
	<?php	
}

function bestbooks_dashboard_reports_balancesheet() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Balance Sheet</h2>
	</div>
	<?php
}

function bestbooks_dashboard_reports_incomestatement() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Income Statement</h2>
	</div>
	<?php
}

function bestbooks_dashboard_reports_salestaxreport() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Sales Tax Report</h2>
	</div>
	<?php
}

function bestbooks_dashboard_reports_payrollwagetaxreport() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Payroll Wage &amp; Tax Report</h2>
	</div>
	<?php
}

function bestbooks_dashboard_reports_incomebycustomer() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Income by Customer</h2>
	</div>
	<?php
}

function bestbooks_dashboard_reports_agedreceivables() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Aged Receivables</h2>
	</div>
	<?php
}

function bestbooks_dashboard_reports_expensebyvendor() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Expense by Vendor</h2>
	</div>
	<?php
}

function bestbooks_dashboard_reports_agedpayables() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Aged Payables</h2>
	</div>
	<?php
}

function bestbooks_dashboard_reports_general_ledger() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - General Ledger</h2>
	</div>
	<?php
}

function bestbooks_dashboard_reports_account_transactions() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Account Transactions</h2>
	</div>
	<?php
}

function bestbooks_dashboard_reports_trialbalance() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Trial Balance</h2>
	</div>
	<?php
}

function bestbooks_dashboard_reports_gainlossonforeigncurrencyexchange() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Gain/Loss on Foreign Currency Exchange</h2>
	</div>
	<?php
}

?>