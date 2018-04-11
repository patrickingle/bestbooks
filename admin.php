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

	/* Settings */
	add_submenu_page( 'bestbooks', 'Settings', 'Settings', 'manage_options', 'bestbooks_settings', 'bestbooks_dashboard_settings');
}

function bestbooks_dashboard_page() {
	?>
    <div class="wrap">
        <h2>BestBooks Accounting Application Framework</h2>
        <p>You have made a sale and now you need to add that sale to your accounting books?</p>
        <p>Before Bestbooks, the process was manual and tedious!</p>
        <p>
            Bestbooks allows you to update your accounting books and ledger/journal automatically by
    using the straightforward API's and hooks.
        </p>

        <fieldset class='options'>
            <legend><h2><u>Tips &amp; Techniques</u></h2></legend>
            <p>Available hooks:</p>
            <ul>
            	<li>bestbooks_create_account</li>
            	<li>bestbooks_add_credit</li>
            	<li>bestbooks_add_debit</li>
            	<li>bestbooks_asset</li>
            	<li>bestbooks_expense</li>
            	<li>bestbooks_liability</li>
            	<li>bestbooks_equity</li>
            	<li>bestbooks_revenue</li>
            	<li>bestbooks_journal_add</li>
            	<li>bestbooks_investment</li>
            	<li>bestbooks_encumber</li>
            	<li>bestbooks_bankfee</li>
            	<li>bestbooks_loanpayment</li>
            	<li>bestbooks_payassetbycheck</li>
            	<li>bestbooks_payexpensebycheck</li>
            	<li>bestbooks_payexpensebycard</li>
            	<li>bestbooks_cardpayment</li>
            	<li>bestbooks_payment_cash</li>
            	<li>bestbooks_sales_cash</li>
            	<li>bestbooks_sales_card</li>
            	<li>bestbooks_accountreceivable_payment</li>
            	<li>bestbooks_distribution</li>
            </ul>
            <p>Example using the hook:</p>
            <p>To update the BestBooks ledger when your ecommerce platform has made a successful, just invoke the do_action within your eccommerce platform code as shown below. The ledger will be pdated automatically, hence eliminating the need to double post.</p>
            <code>
            	do_action("bestbooks_sales_card", "2018-03-19", "Credit Card Sale", 10.00);
            </code>
            <p>Two ledger accounts will be created, if don't already exist for this action. These two new accounts will be <i>Sales</i> and <i>Account Receivable</i>, respectively.</p>
        </fieldset>
	<fieldset class='options'>
            <legend><h2><u>Wordpress Development</u></h2></legend>
            <p>
                <a href="https://phkcorp.com" target="_blank">PHK Corporation</a> 
                is available for custom Wordpress development which includes development of new plugins, modification of existing plugins, migration of HTML/PSD/Smarty themes to wordpress-compliant <b>seamless</b> themes.
            </p>
            <p>Please email at <a href="mailto:phkcorp2005@gmail.com">phkcorp2005@gmail.com</a> or <a href="tel:12128790758" target="_blank">Call us</a> with your programming requirements.</p>
	</fieldset>
                        
    <fieldset class="options">
        <legend><h2><u>BestBooks API</u></h2></legend>
        <p>To access the BestBooks, use the url <a href="<?php echo rest_url('bestbooks/v2/'); ?>" target="_blank"><?php echo rest_url('bestbooks/v2/'); ?></a></p>
        <p><u>Current Endpoints</u></p>
        <p>
            <ul>
                <li><a href="<?php echo rest_url('bestbooks/v2/chartofaccounts'); ?>" target="_blank">Chart Of Accounts</a></li>
                <li><a href="<?php echo rest_url('bestbooks/v2/account_types'); ?>" target="_blank">Account Types</a></li>
                <li><a href="<?php echo rest_url('bestbooks/v2/debit'); ?>" target="_blank">Debit</a></li>
                <li><a href="<?php echo rest_url('bestbooks/v2/credit'); ?>" target="_blank">Credit</a></li>
                <li><a href="<?php echo rest_url('bestbooks/v2/balance'); ?>" target="_blank">Balance</a></li>
                <li><a href="<?php echo rest_url('bestbooks/v2/add'); ?>" target="_blank">Add</a></li>
                <li><a href="<?php echo rest_url('bestbooks/v2/subtract'); ?>" target="_blank">Subtract</a></li>
            </ul>
        </p>
    </fieldset>
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
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
		<!--
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
		-->
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
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
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
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php	
}

function bestbooks_dashboard_sales_payments() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Payments</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php	
}

function bestbooks_dashboard_sales_customerstatements() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Customer Statements</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
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
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
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
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
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
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php	
}

function bestbooks_dashboard_purchases_receipts() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_purchases'); ?>">Purchases</a> - Receipts</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php	
}

function bestbooks_dashboard_purchases_vendors() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_purchases'); ?>">Purchases</a> - Vendors</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php	
}

function bestbooks_dashboard_purchases_productsnservices() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_purchases'); ?>">Purchases</a> - Products &amp; Services</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
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
	global $wpdb;

	$paged = (isset($_GET['paged']) ? $_GET['paged'] : 1);


	if (is_plugin_active_for_network('bestbooks/bestbooks.php')) {
		$sql = "SELECT * FROM ".$wpdb->base_prefix."bestbooks_ledger ORDER BY txdate DESC";
		$totals = "SELECT COUNT(*) as total FROM ".$wpdb->base_prefix."bestbooks_ledger ORDER BY txdate DESC";
	} else {
		$sql = "SELECT * FROM ".$wpdb->prefix."bestbooks_ledger ORDER BY txdate DESC";
		$totals = "SELECT COUNT(*) as total FROM ".$wpdb->prefix."bestbooks_ledger ORDER BY txdate DESC";
	}
	$results = $wpdb->get_results($totals);
	$total = $results[0]->total;
	$limit = 10;
	$pages = intval($total / $limit);
	$next = $pages + $paged;
	$start = $next;
	$prev = $paged - $limit;
	if ($paged == 1) {
		$start = 0;
		$prev = 1;
	}
	$sql .= " LIMIT $paged,$limit";
	$transactions = $wpdb->get_results($sql);
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_accounting'); ?>">Accounting</a> - Transactions&nbsp;
			<!--input type="button" id="add_income" value="Add Income" />
			<input type="button" id="add_expense" value="Add Expense"  /-->
		</h2>
		<table class="w3-table w3-block">
			<tr class="w3-grey">
				<th>Date</th>
				<th>Description</th>
				<th>Account</th>
				<th>Debit</th>
				<th>Credit</th>
			</tr>
			<?php foreach($transactions as $transaction) : ?>
            <tr>
                <td><?php echo $transaction->txdate; ?></td>
                <td><?php echo $transaction->note; ?></td>
                <td><?php echo $transaction->name; ?></td>
                <td><?php echo $transaction->debit; ?></td>
                <td><?php echo $transaction->credit; ?></td>
            </tr>
			<?php endforeach; ?>
			<tr>
				<td><small>Total: <?php echo $total; ?></small></td>
				<td></td>
				<td>
					<small>
					<a class="w3-button" href="<?php echo admin_url('admin.php?page=bestbooks_accounting_transactions&paged='.$prev); ?>" style="text-decoration: none;">&laquo;</a>
					<?php for($i=0; $i<$pages; $i++) : ?>
					<!--<a class="w3-button" href="<?php echo admin_url('admin.php?page=bestbooks_accounting_transactions&paged='.($i+$next+$limit)); ?>" style="text-decoration: none;"><?php echo $i+1; ?></a>-->
					<?php endfor; ?>
					<a class="w3-button" href="<?php echo admin_url('admin.php?page=bestbooks_accounting_transactions&paged='.$next); ?>" style="text-decoration: none;">&raquo;</a>
					</small>
				</td>
				<td></td>
				<td></td>
			</tr>            
		</table>
	</div>
	<?php	
}

function bestbooks_dashboard_accounting_chartofaccounts() {
	//require_once dirname(__FILE__).'/vendor/autoload.php';
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
		//echo '<pre>'; print_r($coa); echo '</pre>';
		$results = array();
    	$results = AccountTypes::getConstList();
    	//echo '<pre>'; print_r($results); echo '</pre>';
		?>
		<table class="w3-table w3-block">
			<tr class="w3-grey">
				<th>Name</th>
				<th>Type</th>
				<th>&nbsp;</th>
			</tr>
			<?php foreach($coa->account as $name => $type) : ?>
            <tr>
                <td><?php echo $name; ?></td>
                <td>
                    <?php echo $type; ?>
                </td>
                <td>
                    <?php if ($coa->in_use($name) === false) : ?>
                    <a href="#" data-id="<?php echo $name; ?>" class="delete-button fa fa-trash">Delete</a>
                    <?php endif; ?>
                </td>
            </tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="3">
					<small>
						<i>Delete is available when the account is NOT in use.</i>
					</small>
				</td>
			</tr>            
		</table>
	</div>
	<div id="add-account-dialog" title="Add New Account" style="display:none;">
		<label for="account_name">Name</label>
		<input type="text" id="account_name" name="account_name" value="" />
		<label for="account_type">Type</label>
		<select id="account_type" name="account_type">
			<option value="">Select</option>
			<?php foreach ($results as $type => $name) : ?>
				<option value="<?php echo $type; ?>"><?php echo $name; ?></option>
			<?php endforeach; ?>
		</select>
		<input type="button" id="add_account_action" name="add_account_action" value="Add" />
	</div>		
	<script>
		jQuery(document).ready(function($){
			$("#add-account-dialog").dialog({
    			autoOpen : false, modal : true, show : "blind", hide : "blind"
  			});
			$('#add_account').bind('click', function(){
				$('#account_type').val("");
				$('#account_name').val("");
				$("#add-account-dialog").dialog("open");
				return false;
			});
			$('#add_account_action').bind('click', function(){
				if ($('#account_type').val() == "") {
					alert("Missing Account Type!");
					return false;
				}
				if ($('#account_name').val() == "") {
					alert("Missing Account name");
					return false;
				}
				$.ajax({
					url: "<?php echo admin_url('admin-ajax.php'); ?>",
					type: "post",
					data: {
						action: "bestbooks_add_chartofaccount",
						aname: $('#account_name').val(),
						atype: $('#account_type').val()
					},
					success: function(results) {
						alert(results);
						$("#add-account-dialog").dialog("close");
						location.reload();
					}
				});
			});
			$('.delete-button').bind('click', function(){
				if (confirm("Delete account " + $(this).data('id'))) {
					$.ajax({
						url: "<?php echo admin_url('admin-ajax.php'); ?>",
						type: "post",
						data: {
							action: "bestbooks_delete_chartofaccount",
							aname: $(this).data('id')
						},
						success: function(results) {
							alert(results);
							location.reload();
						}
					});					
				}
			});
		});
	</script>
	<?php	
}

function bestbooks_dashboard_accounting_journaltransactions() {
	global $wpdb;

	$paged = (isset($_GET['paged']) ? $_GET['paged'] : 1);

	if (is_plugin_active_for_network('bestbooks/bestbooks.php')) {
		$sql = "SELECT * FROM ".$wpdb->base_prefix."bestbooks_journal ORDER BY txdate DESC";
		$totals = "SELECT COUNT(*) AS total FROM ".$wpdb->base_prefix."bestbooks_journal ORDER BY txdate DESC";
	} else {
		$sql = "SELECT * FROM ".$wpdb->prefix."bestbooks_journal ORDER BY txdate DESC";
		$totals = "SELECT COUNT(*) AS total FROM ".$wpdb->prefix."bestbooks_journal ORDER BY txdate DESC";
	}
	$results = $wpdb->get_results($totals);
	$total = $results[0]->total;
	$limit = 10;
	$pages = intval($total / $limit);
	$next = $pages + $paged;
	$start = $next;
	$prev = $paged - $limit;
	if ($paged == 1) {
		$start = 0;
		$prev = 1;
	}
	$sql .= " LIMIT $paged,$limit";
	$transactions = $wpdb->get_results($sql);
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_accounting'); ?>">Accounting</a> - Journal Transactions&nbsp;
			<!--input type="button" id="add_transaction" value="Add transaction" class="w3-button w3-blue" /-->
		</h2>
		<table class="w3-table w3-block">
			<tr class="w3-grey">
				<th>Date</th>
				<th>Account</th>
				<th>Debit</th>
				<th>Credit</th>
			</tr>
			<?php foreach($transactions as $transaction) : ?>
            <tr>
                <td><?php echo $transaction->txdate; ?></td>
                <td><?php echo $transaction->account; ?></td>
                <td><?php echo $transaction->debit; ?></td>
                <td><?php echo $transaction->credit; ?></td>
            </tr>
			<?php endforeach; ?>
			<tr>
				<td><small>Total: <?php echo $total; ?></small></td>
				<td></td>
				<td>
					<small>
					<a class="w3-button" href="<?php echo admin_url('admin.php?page=bestbooks_accounting_journaltransactions&paged='.$prev); ?>" style="text-decoration: none;">&laquo;</a>
					<?php for($i=0; $i<$pages; $i++) : ?>
					<!--<a class="w3-button" href="<?php echo admin_url('admin.php?page=bestbooks_accounting_journaltransactions&paged='.($i+$next+$limit)); ?>" style="text-decoration: none;"><?php echo $i+1; ?></a>-->
					<?php endfor; ?>
					<a class="w3-button" href="<?php echo admin_url('admin.php?page=bestbooks_accounting_journaltransactions&paged='.$next); ?>" style="text-decoration: none;">&raquo;</a>
					</small>
				</td>
				<td></td>
				<td></td>
			</tr>            
		</table>		
	</div>
	<?php	
}

function bestbooks_dashboard_accounting_startingbalances() {
	?>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_accounting'); ?>">Accounting</a> - Starting Balances</h2>
		Description: <input type="text" size="80" id="description" value="" /><br/>
		Date: <input type="date" id="transdate" value="<?php echo date('Y-m-d'); ?>" />
		<br/>
		<table class="w3-table w3-block">
			<tr class="w3-grey">
				<th>Account</th>
				<th>Debit</th>
				<th>Credit</th>
			</tr>
			<?php $coa = get_coa_instance(); ?>
			<?php foreach($coa->account as $name => $type) : ?>
				<?php 
				$ledger = new Ledger($name, $type);
				$debit_balance = number_format(0.00, 2);
				$credit_balance = number_format(0.00, 2);
				if ($type === "Liability" || $type === "Revenue" || $type === "Expense") {
					$credit_balance = $ledger->balance;
				} elseif ($type === "Asset" || $type === "Cash") {
					$debit_balance = $ledger->balance;
				}
				?>
				<tr>
					<td><?php echo $name; ?></td>
					<td><input type="number" id="debit_<?php echo $name;?>" value="<?php echo $debit_balance; ?>" /></td>
					<td><input type="number" id="credit_<?php echo $name;?>" value="<?php echo $credit_balance; ?>" /></td>
				</tr>
			<?php endforeach; ?>
			<!--
			<tr>
				<td>&nbsp;</td>
				<td align="center"><input type="button" class="w3-button w3-blue" id="save_balances" value="Save" /></td>
				<td>&nbsp;</td>
			</tr>
			-->
		</table>
	</div>
	<?php	
}


function bestbooks_dashboard_banking() {
	?>
	<div class="wrap">
		<h2>BestBooks - Banking</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php	
}

function bestbooks_dashboard_payroll() {
	?>
	<div class="wrap">
		<h2>BestBooks - Payroll</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
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
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php
}

function bestbooks_dashboard_reports_incomestatement() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Income Statement</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php
}

function bestbooks_dashboard_reports_salestaxreport() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Sales Tax Report</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php
}

function bestbooks_dashboard_reports_payrollwagetaxreport() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Payroll Wage &amp; Tax Report</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php
}

function bestbooks_dashboard_reports_incomebycustomer() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Income by Customer</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php
}

function bestbooks_dashboard_reports_agedreceivables() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Aged Receivables</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php
}

function bestbooks_dashboard_reports_expensebyvendor() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Expense by Vendor</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php
}

function bestbooks_dashboard_reports_agedpayables() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Aged Payables</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php
}

function bestbooks_dashboard_reports_general_ledger() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - General Ledger</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php
}

function bestbooks_dashboard_reports_account_transactions() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Account Transactions</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php
}

function bestbooks_dashboard_reports_trialbalance() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Trial Balance</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php
}

function bestbooks_dashboard_reports_gainlossonforeigncurrencyexchange() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Gain/Loss on Foreign Currency Exchange</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
	</div>
	<?php
}

function bestbooks_dashboard_settings() {
	?>
	<div class="wrap">
		<h2>BestBooks - Settings</h2>
		<label for="customer-role">Customer Role</label>
		<select name="customer-role" id="customer-role">
			<option value="">Select</option>
			<?php wp_dropdown_roles('bestbooks_customer'); ?>
		</select>
		<br/>
		<label for="vendor-role">Vendor Role</label>
		<select name="vendor-role" id="vendor-role">
			<option value="">Select</option>
			<?php wp_dropdown_roles('bestbooks_vendor'); ?>
		</select>
		<br/>
		<?php submit_button(); ?>
	</div>
	<?php
}
?>