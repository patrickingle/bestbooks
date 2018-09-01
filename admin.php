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
	add_submenu_page( 'bestbooks_reports', 'Quarterly Report [10-Q]', 'Quarterly Report [10-Q]', 'manage_options', 'bestbooks_reports_10q', 'bestbooks_dashboard_reports_10q');
	add_submenu_page( 'bestbooks_reports', 'Annual Report [10-K]', 'Annual Report [10-K]', 'manage_options', 'bestbooks_reports_10k', 'bestbooks_dashboard_reports_10k');

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
		    	<li>bestbooks_baddebtwriteoff</li>
		    	<li>bestbooks_baddebtwriteoff_payment</li>
            	<li>bestbooks_deferredrevenue</li>
				<li>bestbooks_deferredrevenue_payment</li>
            </ul>
            <p>Example using the hook:</p>
            <p>To update the BestBooks ledger when your ecommerce platform has made a successful payment, just invoke the do_action within your eccommerce platform code as shown below. The ledger will be pdated automatically, hence eliminating the need to double post.</p>
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
	$timezone = get_option("bestbooks_timezone");
	$zones = timezone_identifiers_list();
	date_default_timezone_set($zones[$timezone]);

	if (isset($_POST['estimate-customer'])) {
		if (!empty($_POST['estimate-customer'])) {
			wp_insert_post(
				array(
					'post_type' => 'bestbooks_invoice',
					'post_status' => 'draft',
					'post_title' => 'Customer #'.$_POST['estimate-customer'],
					'post_content' => json_encode($_POST)
				)
			);
		}
	} elseif (isset($_POST['action'])) {
		switch ($_POST['action']) {
			case 'delete':
				wp_delete_post($_POST['post_id'], true);
				break;
			case 'invoice':
				$post = get_post($_POST['post_id']);
				$post->post_status = 'publish';
				$metadata = json_decode($post->post_content, true);
				$metadata['estimate-status'] = 'invoiced';
				$post->post_content = json_encode($metadata);
				wp_update_post($post);
				$customer = get_user_by('id', $metadata['estimate-customer']);
				$invnum = $metadata['estimate-invnum'];
				$items = $metadata['items'];
				$total = 0;
				for ($i=0; $i<$items; $i++) {
					$total += $metadata['item_total_'.($i+1)];
				}
				$txdate = $post->post_date;
				$description = "Invoice #$invnum for ".$customer->display_name;
				//echo '<pre>'; print_r(array($metadata,$txdate,$description,$total)); echo '</pre>';
				do_action('bestbooks_unearned_revenue',$txdate,$description,$total);
				break;
			case 'send':
				break;
		}
	}

	$invoices = get_posts(
		array(
			'post_type' => 'bestbooks_invoice',
			'post_status' => 'draft',
			'numberposts' => -1,
    		'orderby' => 'post_date',
    		'order' => 'DESC',
		)
	);

	$invoice_num = count($invoices) + 1;

    $bestbooks_customer = get_option("bestbooks_customer");
    if (isset($bestbooks_customer) === false) {
        $bestbooks_customer = "bestbooks_customer";
    }

	$customers = get_users(array('role__in'=>array($bestbooks_customer)));

	$products = get_terms('bestbooks_sales_product', array('hide_empty'=>false));
	$services = get_terms('bestbooks_sales_service', array('hide_empty'=>false));
	?>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<div class="wrap">
		<h2>
			BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Estimates&nbsp;
			<input type="button" class="w3-button w3-blue" name="add_estimate" id="add_estimate" value="Create an Estimate" />
		</h2>
		<table class="w3-table">
			<tr>
				<th>Status</th>
				<th>Date</th>
				<th>Number</th>
				<th>Customer</th>
				<th>Amount</th>
				<th>Action</th>
			</tr>
			<?php foreach($invoices as $invoice) : ?>
			<?php $metadata = json_decode($invoice->post_content, true); ?>
			<?php $customer = get_user_by('id', $metadata['estimate-customer']); ?>
			<?php
			$items = $metadata['items'];
			$total = 0;
			for ($i=0; $i<$items; $i++) {
				$total += $metadata['item_total_'.($i+1)];
			}
			?>
			<tr>
				<td><?php echo $metadata['estimate-status']; ?></td>
				<td><?php echo $invoice->post_date; ?></td>
				<td><?php echo $metadata['estimate-invnum']; ?></td>
				<td><?php echo $customer->display_name . ' ['.$customer->user_email.']'; ?></td>
				<td><?php echo '$'.money_format('%i', $total); ?></td>
				<td>
					<select class="w3-input w3-block" data-id="<?php echo $invoice->ID; ?>" onchange="estimateAction(this)">
						<option value="">Select</option>
						<option value="viewedit">View/Edit</option>
						<option value="send">Send</option>
						<option value="invoice">Make an Invoice</option>
						<option value="delete">Delete</option>
					</select>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div id="add-estimate-dialog" title="Add New Estimate" style="display:none;">
		<form method="post" id="addestimateform">
			<!-- Status: created|sent|invoiced -->
			<input type="hidden" name="estimate-status" value="created" />
			<label for="estimate-invnum">Invoice #</label>
			<input type="text" class="w3-input w3-block w3-grey" name="estimate-invnum" id="estimate-invnum" value="<?php echo $invoice_num; ?>" readonly />
			<label for="estimate-customer">Customer</label>
			<select id="estimate-customer" name="estimate-customer" class="w3-input w3-block" onchange="changeCustomer(this)">
				<option value="">Select</option>
				<?php foreach ($customers as $customer) : ?>
				<option value="<?php echo $customer->ID; ?>"><?php echo $customer->display_name . '[' . $customer->user_email . ']'; ?></option>
				<?php endforeach; ?>
			</select>
			<table class="w3-table w3-block" id="estimate-itemizations">
				<tr>
					<th>Qty</th>
					<th>Item Description</th>
					<th>Unit Price</th>
					<th>Item Total</th>
				</tr>
				<tr>
					<td><input type="text" class="w3-input" name="item_qty_1" id="item_qty_1" onchange="updateItem(1)" value="" /></td>
					<td>
						<select class="w3-input" id="item_desc_1" id="item_desc_1">
							<option value="" selected>Select</option>
							<optgroup label="Products">
								<?php foreach($products as $product) : ?>
								<option value="<?php echo $product->term_id; ?>"><?php echo $product->description; ?></option>
								<?php endforeach; ?>
							</optgroup>
							<optgroup label="Services">
								<?php foreach($services as $service) : ?>
								<option value="<?php echo $service->term_id; ?>"><?php echo $service->description; ?></option>
								<?php endforeach; ?>
							</optgroup>
						</select>
						<input type="hidden" name="items" id="items" value="1" />
					</td>
					<td><input type="text" class="w3-input" onchange="updateItem(1)" name="item_price_1" id="item_price_1" value="" /></td>
					<td><input type="text" class="w3-input w3-grey" name="item_total_1" id="item_total_1" value="" readonly /></td>
				</tr>
			</table>
			<br/>
			<input class="w3-button w3-block w3-black" type="button" id="add_item_row" name="add_item_row" value="Add Item" />
			<br/>
			<input class="w3-button w3-block w3-black" type="button" id="add_estimate_action" name="add_estimate_action" value="Save" />
		</form>
	</div>
	<form id="estimatechoiceform" method="post" style="display:none;">
		<input type="hidden" name="action" id="action" value="" />
		<input type="hidden" name="post_id" id="post_id" value="" />
	</form>
	<script type="text/javascript">
		var _item_no = 1;
		jQuery(document).ready(function($){
			$("#add-estimate-dialog").dialog({
    			autoOpen : false, modal : true, show : "blind", hide : "blind"
  			});
			$('#add_estimate').bind('click', function(){
				$("#add-estimate-dialog").dialog("open");
				return false;
			});
			$('#add_estimate_action').bind('click', function(){
				// submit form
				document.getElementById("addestimateform").submit();
			});
			$('#add_item_row').bind('click', function(){
				_item_no += 1;
				$('#items').val(_item_no);
				var itemlist = '<tr>';
				itemlist += '<td><input type="text" class="w3-input" name="item_qty_'+_item_no+'" id="item_qty_'+_item_no+'" onchange="updateItem('+_item_no+')" value="" /></td>';
				itemlist += '<td>';
				itemlist += '<select class="w3-input" id="item_desc_'+_item_no+'" id="item_desc_'+_item_no+'">';
				itemlist += '<option value="" selected>Select</option>';
				itemlist += '<optgroup label="Products">';
				<?php foreach($products as $product) : ?>
				itemlist += '<option value="<?php echo $product->term_id; ?>"><?php echo $product->description; ?></option>';
				<?php endforeach; ?>
				itemlist += '</optgroup>';
				itemlist += '<optgroup label="Services">';
				<?php foreach($services as $service) : ?>
				itemlist += '<option value="<?php echo $service->term_id; ?>"><?php echo $service->description; ?></option>';
				<?php endforeach; ?>
				itemlist += '</optgroup>';
				itemlist += '</select>';
				itemlist += '</td>';
				itemlist += '<td><input type="text" class="w3-input" onchange="updateItem('+_item_no+')" name="item_price_'+_item_no+'" id="item_price_'+_item_no+'" value="" /></td>';
				itemlist += '<td><input type="text" class="w3-input w3-grey" name="item_total_'+_item_no+'" id="item_total_'+_item_no+'" value="" readonly /></td>';
				itemlist += '</tr>';
				$('#estimate-itemizations tr:last').after(itemlist);
			});
		});
		function updateItem(item_no) {
			var qty = document.getElementById("item_qty_" + item_no).value;
			var price = document.getElementById("item_price_" + item_no).value;
			document.getElementById("item_total_" + item_no).value = price * qty;
		}
		function estimateAction(estimateAction) {
			var choice = estimateAction.options[estimateAction.selectedIndex].value;
			var post_id = estimateAction.getAttribute("data-id");
			if (choice == "delete") {
				if (confirm("Delete this invoice?")) {
					document.getElementById("action").value = choice;
					document.getElementById("post_id").value = post_id;
					document.getElementById("estimatechoiceform").submit();
				}
			} else if (choice == "invoice") {
				document.getElementById("action").value = choice;
				document.getElementById("post_id").value = post_id;
				document.getElementById("estimatechoiceform").submit();
			} else if (choice == "send") {
				document.getElementById("action").value = choice;
				document.getElementById("post_id").value = post_id;
				document.getElementById("estimatechoiceform").submit();
			} else if (choice == "viewedit") {
				
			}
		}
	</script>
	<?php	
}

function bestbooks_dashboard_sales_invoices() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Invoices&nbsp;
			<input type="button" class="w3-button w3-blue" id="add-invoice" value="Create an Invoice" />
		</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
		<table class="w3-table">
			<tr>
				<th>Status</th>
				<th>Date</th>
				<th>Number</th>
				<th>Customer</th>
				<th>Amount</th>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</div>
	<?php	
}

function bestbooks_dashboard_sales_recurringinvoices() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Recurring Invoices&nbsp;
			<input type="button" class="w3-button w3-blue" id="add-recurring-invoice" value="Create an Recurring Invoice" />
		</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
		<table class="w3-table">
			<tr>
				<th>Status</th>
				<th>Date</th>
				<th>Number</th>
				<th>Customer</th>
				<th>Amount</th>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</div>
	<?php	
}

function bestbooks_dashboard_sales_payments() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Payments
		<input type="button" class="w3-button w3-blue" name="add-payment" id="add-payment" value="Add a Payment" />
		</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
		<table class="w3-table">
			<tr>
				<th>Status</th>
				<th>Date</th>
				<th>Number</th>
				<th>Customer</th>
				<th>Amount</th>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</div>
	<?php	
}

function bestbooks_dashboard_sales_customerstatements() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Customer Statements</h2>
	</div>
	<?php	
    $bestbooks_customer = get_option("bestbooks_customer");
    if (isset($bestbooks_customer) === false) {
        $bestbooks_customer = "bestbooks_customer";
    }

	$customers = get_users(array('role__in'=>array($bestbooks_customer)));
	?>
	<form method="post" id="changecustomerform">
		<input type="hidden" name="formsubmit" value="1" />
		<label for="customer">Customer</label>
		<select id="customer" name="customer" class="w3-input" onchange="changeCustomer(this)">
			<option value="">Select</option>
		<?php foreach ($customers as $customer) : ?>
			<option value="<?php echo $customer->ID; ?>"><?php echo $customer->display_name . '[' . $customer->user_email . ']'; ?></option>
		<?php endforeach; ?>
		</select>
	</form>
	<script type="text/javascript">
	function changeCustomer(obj) {
		document.getElementById("changecustomerform").submit();
	}
	</script>
	<?php
}

function bestbooks_dashboard_sales_customers() {
    $bestbooks_customer = get_option("bestbooks_customer");
    if (isset($bestbooks_customer) === false) {
        $bestbooks_customer = "bestbooks_customer";
	}
	
	$blog_id = get_current_blog_id();

	if (isset($_POST['customer_email'])) {
		$customer_name = $_POST['customer_name'];
		$customer_email = $_POST['customer_email'];
		$customer_billing_address = $_POST['customer_billing_address'];
		$customer_billing_csv = $_POST['customer_billing_csv'];
		$customer_shipping_address = $_POST['customer_shipping_address'];
		$customer_shipping_csv = $_POST['customer_shipping_csv'];
		$customer_phone = $_POST['customer_phone'];
		$customer_fax = $_POST['customer_fax'];

		$timezone = get_option("bestbooks_timezone");
		$zones = timezone_identifiers_list();
		date_default_timezone_set($zones[$timezone]);

		if (($user_id = username_exists($customer_email)) || email_exists($customer_email)) {
			$user = get_user_by('id', $user_id);
			$user->display_name = $customer_name;
			wp_update_user($user);
			$user->add_role($bestbooks_customer);
			//add_user_to_blog($blog_id, $user_id, $user->role);
			update_user_meta($user_id, 'billing_address', $customer_billing_address);
			update_user_meta($user_id, 'billing_csv', $customer_billing_csv);
			update_user_meta($user_id, 'shipping_address', $customer_shipping_address);
			update_user_meta($user_id, 'shipping_csv', $customer_shipping_csv);
			update_user_meta($user_id, 'phone', $customer_phone);
			update_user_meta($user_id, 'fax', $customer_fax);
		} else {
			$random_password = wp_generate_password(12, false);
			$user_id = wp_create_user($customer_email, $random_password, $customer_email);
			if (is_wp_error($user_id)) {
				$error_string = $user_id->get_error_message();
   				echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
			} else {
				$user = get_user_by('id', $user_id);
				$user->display_name = $customer_name;
				wp_update_user($user);
				add_user_to_blog($blog_id, $user_id, $bestbooks_customer);
				update_user_meta($user_id, 'billing_address', $customer_billing_address);
				update_user_meta($user_id, 'billing_csv', $customer_billing_csv);
				update_user_meta($user_id, 'shipping_address', $customer_shipping_address);
				update_user_meta($user_id, 'shipping_csv', $customer_shipping_csv);
				update_user_meta($user_id, 'phone', $customer_phone);
				update_user_meta($user_id, 'fax', $customer_fax);
			}
		}
	}
	?>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Customers&nbsp;
			<input type="button" class="w3-button w3-blue" id="add_customer" value="Add a Customer" />
		</h2>
	</div>
	<?php	

	$customers = get_users(array('role__in'=>array($bestbooks_customer)));
	?>
	<table class="w3-table">
		<tr>
			<th>Name</th><th>EMail</th>
		</tr>
		<?php foreach($customers as $customer): ?>
			<tr>
				<td><?php echo $customer->display_name; ?></td>
				<td><?php echo $customer->user_email; ?></td>
				<td>
				<a href="#" data-id="<?php echo $customer->ID; ?>" class="delete-button fa fa-trash">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<div id="add-customer-dialog" title="Add New Customer" style="display:none;">
		<form method="post" id="addcustomerform">
		<label for="customer_name">Name</label>
		<input class="w3-input" type="text" id="customer_name" name="customer_name" value="" required />
		<label for="customer_email">EMail</label>
		<input class="w3-input" type="email" id="customer_email" name="customer_email" value="" required />
		<label for="customer_billing_address">Address [Billing]</label>
		<input class="w3-input" type="text" id="customer_billing_address" name="customer_billing_address" value="" required />
		<label for="customer_billing_csv">City, State, Zip [Billing]</label>
		<input class="w3-input" type="text" id="customer_billing_csv" name="customer_billing_csv" value="" required />
		<label for="customer_shipping_address">Address [Shipping]</label>
		<input class="w3-input" type="text" id="customer_shipping_address" name="customer_shipping_address" value="" required />
		<label for="customer_shipping_csv">City, State, Zip [Shipping]</label>
		<input class="w3-input" type="text" id="customer_shipping_address" name="customer_shipping_address" value="" required />
		<label for="customer_phone">Phone</label>
		<input class="w3-input" type="text" id="customer_phone" name="customer_phone" value="" required />
		<label for="customer_fax">FAX</label>
		<input class="w3-input" type="text" id="customer_fax" name="customer_fax" value="" required />
		<input class="w3-button w3-block w3-black" type="button" id="add_customer_action" name="add_customer_action" value="Add" />
		</form>
	</div>
	<script>
		jQuery(document).ready(function($){
			$("#add-customer-dialog").dialog({
    			autoOpen : false, modal : true, show : "blind", hide : "blind"
  			});
			$('#add_customer').bind('click', function(){
				$('#customer_email').val("");
				$('#customer_name').val("");
				$("#add-customer-dialog").dialog("open");
				return false;
			});
			$('#add_customer_action').bind('click', function(){
				if ($('#customer_email').val() == "") {
					alert("Missing Customer Email!");
					return false;
				}
				if ($('#customer_name').val() == "") {
					alert("Missing Customer name");
					return false;
				}
				// submit form
				document.getElementById("addcustomerform").submit();
			});
			$('.delete-button').bind('click', function(){
				if (confirm("Delete account " + $(this).data('id'))) {
					// submit form
				}
			});
		});
	</script>
	<?php
}

function bestbooks_dashboard_sales_productsnservices() {
	if (isset($_POST['prodserv_choice'])) {
		$choice = $_POST['prodserv_choice'];
		$name = $_POST['prodserv_name'];
		$desc = $_POST['prodserv_desc'];

		$taxonomy = 'bestbooks_sales_' . $choice;

		$timezone = get_option("bestbooks_timezone");
		$zones = timezone_identifiers_list();
		date_default_timezone_set($zones[$timezone]);

		$term_id = wp_insert_term($name, $taxonomy, array('description' => $desc));
		if (is_wp_error($term_id)) {
			$error_string = $term_id->get_error_message();
			echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
		}
	}

	$products = get_terms('bestbooks_sales_product', array('hide_empty'=>false));
	$services = get_terms('bestbooks_sales_service', array('hide_empty'=>false));
	?>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_sales'); ?>">Sales</a> - Products &amp; Services&nbsp;
			<input type="button" class="w3-button w3-blue" id="add_product_service" value="Add a product or service" />
		</h2>
		<fieldset>
			<legend>Product</legend>
			<table class="w3-table">
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
				<?php foreach($products as $product) : ?>
				<tr>
					<td><?php echo $product->name; ?></td>
					<td><?php echo $product->description; ?></td>
					<td></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Service</legend>
			<table class="w3-table">
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
				<?php foreach($services as $service) : ?>
				<tr>
					<td><?php echo $service->name; ?></td>
					<td><?php echo $service->description; ?></td>
					<td></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</fieldset>
	</div>
	<div id="add-prodserv-dialog" title="Add New Product/Service" style="display:none;">
		<form method="post" id="addprodservform">
		<label for="prodserv_choice">Choose</label>
		<select class="w3-input" name="prodserv_choice" id="prodserv_choice">
			<option value="product">Product</option>
			<option value="service">Service</option>
		</select>
		<label for="prodserv_name">Name</label>
		<input type="text" id="prodserv_name" name="prodserv_name" class="w3-input" value="" required />
		<label for="prodserv_desc">Description</label>
		<input type="text" id="prodserv_desc" name="prodserv_desc" class="w3-input" value="" required />
		<input type="button" id="add_prodserv_action" name="add_prodserv_action" value="Add" />
		</form>
	</div>
	<script>
		jQuery(document).ready(function($){
			$("#add-prodserv-dialog").dialog({
    			autoOpen : false, modal : true, show : "blind", hide : "blind"
  			});
			$('#add_product_service').bind('click', function(){
				$('#prodserv_name').val("");
				$('#prodserv_desc').val("");
				$("#add-prodserv-dialog").dialog("open");
				return false;
			});
			$('#add_prodserv_action').bind('click', function(){
				// submit form
				document.getElementById("addprodservform").submit();
			});
			$('.delete-button').bind('click', function(){
				if (confirm("Delete account " + $(this).data('id'))) {
					// submit form
				}
			});
		});
	</script>
	<?php	
}

function bestbooks_dashboard_purchases() {
	?>
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
	if (isset($_POST['bill_account'])) {
		echo '<pre>'; print_r($_POST); echo '</pre>';
		do_action(
			'bestbooks_addexpense', 
			$_POST['bill_date'],
			$_POST['bill_description'],
			$_POST['bill_amount'],
			$_POST['bill_account']
		);
	}
    $coa = new ChartOfAccounts();
    $accounts = $coa->getList();
    $expense_accounts = array();
    foreach ($accounts as $name => $type) {
        if ($type === "Expense") {
            $expense = new Ledger($name, $type);
			$balance = $expense->getBalance();
			$transactions = $expense->transactions();
            $expense_accounts[] = array(
                'name' => $name,
                'type' => $type,
				'balance' => abs($balance),
				'transactions' => $transactions
            );
        }
    }

	global $wpdb;

	if (is_plugin_active_for_network('bestbooks/bestbooks.php')) {
		$sql = "SELECT * FROM ".$wpdb->base_prefix."bestbooks_ledger WHERE type='Expense' ORDER BY txdate DESC";
		$totals = "SELECT COUNT(*) as total FROM ".$wpdb->base_prefix."bestbooks_ledger ORDER BY txdate DESC";
	} else {
		$sql = "SELECT * FROM ".$wpdb->prefix."bestbooks_ledger WHERE type='Expense' ORDER BY txdate DESC";
		$totals = "SELECT COUNT(*) as total FROM ".$wpdb->prefix."bestbooks_ledger ORDER BY txdate DESC";
	}
	$results = $wpdb->get_results($sql);

	?>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_purchases'); ?>">Purchases</a> - Bills
			<input type="button" class="w3-button w3-blue" id="add_bill" value="Add a Bill" />
		</h2>
		<table class="w3-table">
			<tr>
				<th>Date</th>
				<th>Description</th>
				<th>Account</th>
				<th>Amount</th>
				<th>Status</th>
			</tr>
			<?php foreach ($results as $account) : ?>
			<tr>
				<td><?php echo $account->txdate; ?></td>
				<td><?php echo $account->note; ?></td>
				<td><?php echo $account->name; ?></td>
				<td><?php echo $account->debit; ?></td>
				<td></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div id="add-bill-dialog" title="Add New Bill" style="display:none;">
		<form method="post" id="addbillform">
		<label for="bill_date">Date</label>
		<input class="w3-input" type="date" id="bill_date" name="bill_date" value="" required />
		<label for="bill_description">Description</label>
		<input class="w3-input" type="text" id="bill_description" name="bill_description" value="" required />
		<label for="bill_amount">Amount</label>
		<input class="w3-input" type="number" id="bill_amount" name="bill_amount" value="" required />
		<label for="bill_account">Account</label>
		<select class="w3-input" id="bill_account" name="bill_account" value="" required >
			<option value="">Select</option>
			<?php foreach($expense_accounts as $expense) : ?>
			<option value="<?php echo $expense['name']; ?>"><?php echo $expense['name']; ?></option>
			<?php endforeach; ?>
		</select>
		<br/>
		<input class="w3-button w3-block w3-black" type="button" id="add_bill_action" name="add_bill_action" value="Add" />
		</form>
	</div>
	<script>
		jQuery(document).ready(function($){
			$("#add-bill-dialog").dialog({
    			autoOpen : false, modal : true, show : "blind", hide : "blind"
  			});
			$('#add_bill').bind('click', function(){
				$("#add-bill-dialog").dialog("open");
				return false;
			});
			$('#add_bill_action').bind('click', function(){
				// submit form
				document.getElementById("addbillform").submit();
			});
		});
	</script>
	<?php	
}

/**
 * Tesseract is available directly from many Linux distributions. 
 * The package is generally called 'tesseract' or 'tesseract-ocr' - 
 * search your distribution's repositories to find it. 
 * Thus you can install Tesseract 4.x and it's developer tools on Ubuntu 18.x bionic by simply running:
 * 
 * 		sudo apt install tesseract-ocr
 * 		sudo apt install libtesseract-dev
 * 
 * https://github.com/tesseract-ocr/tesseract/wiki
 * 
 */
function bestbooks_dashboard_purchases_receipts() {
	$text = '';
	if (isset($_POST['add_receipt'])) {
		// These files need to be included as dependencies when on the front end.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		$timezone = get_option("bestbooks_timezone");
		$zones = timezone_identifiers_list();
		date_default_timezone_set($zones[$timezone]);

		$post_id = wp_insert_post(
			array(
				'post_type' => 'bestbooks_receipt',
				'post_title' => $_FILES['receipt']['name'],
				'post_content' => json_encode(array($_POST,$_FILES)),
				'post_status' => 'publish'
			)
		);

		if (is_wp_error($post_id)) {
			$error_string = $post_id->get_error_message();
			echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
		} else {
			$attachment_id = media_handle_upload('receipt', $post_id);
			if (is_wp_error($attachment_id)) {
				$error_string = $post_id->get_error_message();
				echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
			} else {
				// successful upload
				$attachment = get_post($attachment_id);

				//use Ddeboer\Tesseract\Tesseract;
				//$tesseract = new Ddeboer\Tesseract\Tesseract();
				$text = $attachment->guid;
				update_post_meta($post_id, 'bestbooks_status', 'uploaded');
			}
		}
	}
	$receipts = get_posts(
		array(
			'post_type' => 'bestbooks_receipt',
			'post_status' => 'publish',
			'posts_per_page' => -1
		)
	);
	?>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_purchases'); ?>">Purchases</a> - Receipts
		</h2>
		<form method="post" enctype="multipart/form-data">
			<label for="receipt">Receipt Filename</label>
			<input type="file" class="w3-input w3-block" name="receipt" id="receipt" />
			<?php wp_nonce_field('receipt_upload', 'receipt_upload_nonce'); ?>
			<input type="submit" class="w3-button w3-block w3-blue" id="add_receipt" name="add_receipt" value="Upload Receipt" />
		</form>
		<table class="w3-table">
			<tr>
				<th>Status</th>
				<th>Image</th>
				<th>Receipt</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
			<?php foreach($receipts as $receipt) : ?>
				<?php
				$args = array(
					'post_type' => 'attachment', 
					'posts_per_page' => 1, 
					'post_status' =>'any', 
					'post_parent' => $post->ID
				); 
				$attachment = get_posts($args);
				$receipt->image_url = $attachment[0]->guid;
				/**
				 * Status: uploaded, processing, ready, done
				 */
				?>
				<tr>
					<td><?php echo isset(get_post_meta($receipt->ID,'bestbooks_status')[0]) ? get_post_meta($receipt->ID,'bestbooks_status')[0] : 'uploaded'; ?></td>
					<td><img src="<?php echo $receipt->image_url; ?>" width="100" height="100" /></td>
					<td><?php echo $receipt->post_title; ?></td>
					<td><?php echo $receipt->post_date; ?></td>
					<td>
						<select class="w3-input" onchange="">
							<option value="">Select</option>
							<option value="delete">Delete</option>
						</select>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<?php	
}

function bestbooks_dashboard_purchases_vendors() {
    $bestbooks_vendor = get_option("bestbooks_vendor");
    if (isset($bestbooks_vendor) === false) {
        $bestbooks_vendor = "bestbooks_vendor";
	}
	
	$blog_id = get_current_blog_id();

	if (isset($_POST['vendor_email'])) {
		$vendor_name = $_POST['vendor_name'];
		$vendor_email = $_POST['vendor_email'];
		$vendor_address = $_POST['vendor_address'];
		$vendor_csv = $_POST['vendor_csv'];
		$vendor_phone = $_POST['vendor_phone'];
		$vendor_fax = $_POST['vendor_fax'];

		$timezone = get_option("bestbooks_timezone");
		$zones = timezone_identifiers_list();
		date_default_timezone_set($zones[$timezone]);

		if (($user_id = username_exists($vendor_email)) || email_exists($vendor_email)) {
			$user = get_user_by('id', $user_id);
			$user->display_name = $vendor_name;
			wp_update_user($user);
			$user->add_role($bestbooks_vendor);
			//add_user_to_blog($blog_id, $user_id, $user->role);
			update_user_meta($user_id, 'address', $vendor_address);
			update_user_meta($user_id, 'csv', $vendor_csv);
			update_user_meta($user_id, 'phone', $vendor_phone);
			update_user_meta($user_id, 'fax', $vendor_fax);
		} else {
			$random_password = wp_generate_password(12, false);
			$user_id = wp_create_user($vendor_email, $random_password, $vendor_email);
			if (is_wp_error($user_id)) {
				$error_string = $user_id->get_error_message();
   				echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
			} else {
				$user = get_user_by('id', $user_id);
				$user->display_name = $vendor_name;
				wp_update_user($user);
				add_user_to_blog($blog_id, $user_id, $bestbooks_vendor);
				update_user_meta($user_id, 'address', $vendor_address);
				update_user_meta($user_id, 'csv', $vendor_csv);
				update_user_meta($user_id, 'phone', $vendor_phone);
				update_user_meta($user_id, 'fax', $vendor_fax);
			}
		}
	}
	?>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_purchases'); ?>">Purchases</a> - Vendors
			<input type="button" class="w3-button w3-blue" id="add_vendor" value="Add a Vendor" />
		</h2>
	</div>
	<?php 
	$vendors = get_users(array('role__in'=>array($bestbooks_vendor)));
	?>
	<table class="w3-table">
		<tr>
			<th>Name</th><th>EMail</th>
		</tr>
		<?php foreach($vendors as $vendor): ?>
			<tr>
				<td><?php echo $vendor->display_name; ?></td>
				<td><?php echo $vendor->user_email; ?></td>
				<td>
				<a href="#" data-id="<?php echo $vendor->ID; ?>" class="delete-button fa fa-trash">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<div id="add-vendor-dialog" title="Add New Vendor" style="display:none;">
		<form method="post" id="addvendorform">
		<label for="vendor_name">Name</label>
		<input class="w3-input" type="text" id="vendor_name" name="vendor_name" value="" required />
		<label for="vendor_email">EMail</label>
		<input class="w3-input" type="email" id="vendor_email" name="vendor_email" value="" required />
		<label for="vendor_address">Address [Billing]</label>
		<input class="w3-input" type="text" id="vendor_address" name="vendor_address" value="" required />
		<label for="vendor_csv">City, State, Zip [Billing]</label>
		<input class="w3-input" type="text" id="vendor_csv" name="vendor_csv" value="" required />
		<label for="vendor_phone">Phone</label>
		<input class="w3-input" type="text" id="vendor_phone" name="vendor_phone" value="" required />
		<label for="vendor_fax">FAX</label>
		<input class="w3-input" type="text" id="vendor_fax" name="vendor_fax" value="" required />
		<input class="w3-button w3-block w3-black" type="button" id="add_vendor_action" name="add_vendor_action" value="Add" />
		</form>
	</div>
	<script>
		jQuery(document).ready(function($){
			$("#add-vendor-dialog").dialog({
    			autoOpen : false, modal : true, show : "blind", hide : "blind"
  			});
			$('#add_vendor').bind('click', function(){
				$('#vendor_email').val("");
				$('#vendor_name').val("");
				$("#add-vendor-dialog").dialog("open");
				return false;
			});
			$('#add_vendor_action').bind('click', function(){
				if ($('#vendor_email').val() == "") {
					alert("Missing Vendor Email!");
					return false;
				}
				if ($('#vendor_name').val() == "") {
					alert("Missing Vendor name");
					return false;
				}
				// submit form
				document.getElementById("addvendorform").submit();
			});
			$('.delete-button').bind('click', function(){
				if (confirm("Delete account " + $(this).data('id'))) {
					// submit form
				}
			});
		});
	</script>
	<?php
}

function bestbooks_dashboard_purchases_productsnservices() {
	if (isset($_POST['prodserv_choice'])) {
		$choice = $_POST['prodserv_choice'];
		$name = $_POST['prodserv_name'];
		$desc = $_POST['prodserv_desc'];

		$taxonomy = 'bestbooks_purchase_' . $choice;

		$timezone = get_option("bestbooks_timezone");
		$zones = timezone_identifiers_list();
		date_default_timezone_set($zones[$timezone]);

		$term_id = wp_insert_term($name, $taxonomy, array('description' => $desc));
		if (is_wp_error($term_id)) {
			$error_string = $term_id->get_error_message();
			echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
		}
	}

	$products = get_terms('bestbooks_purchase_product', array('hide_empty'=>false));
	$services = get_terms('bestbooks_purchase_service', array('hide_empty'=>false));
	?>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_purchases'); ?>">Purchases</a> - Products &amp; Services
			<input type="button" class="w3-button w3-blue" id="add_product_service" value="Add a product or service" />
		</h2>
		<fieldset>
			<legend>Product</legend>
			<table class="w3-table">
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
				<?php foreach($products as $product) : ?>
				<tr>
					<td><?php echo $product->name; ?></td>
					<td><?php echo $product->description; ?></td>
					<td></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Service</legend>
			<table class="w3-table">
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
				<?php foreach($services as $service) : ?>
				<tr>
					<td><?php echo $service->name; ?></td>
					<td><?php echo $service->description; ?></td>
					<td></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</fieldset>
	</div>
	<div id="add-prodserv-dialog" title="Add New Product/Service" style="display:none;">
		<form method="post" id="addprodservform">
		<label for="prodserv_choice">Choose</label>
		<select class="w3-input" name="prodserv_choice" id="prodserv_choice">
			<option value="product">Product</option>
			<option value="service">Service</option>
		</select>
		<label for="prodserv_name">Name</label>
		<input type="text" id="prodserv_name" name="prodserv_name" class="w3-input" value="" required />
		<label for="prodserv_desc">Description</label>
		<input type="text" id="prodserv_desc" name="prodserv_desc" class="w3-input" value="" required />
		<input type="button" id="add_prodserv_action" name="add_prodserv_action" value="Add" />
		</form>
	</div>
	<script>
		jQuery(document).ready(function($){
			$("#add-prodserv-dialog").dialog({
    			autoOpen : false, modal : true, show : "blind", hide : "blind"
  			});
			$('#add_product_service').bind('click', function(){
				$('#prodserv_name').val("");
				$('#prodserv_desc').val("");
				$("#add-prodserv-dialog").dialog("open");
				return false;
			});
			$('#add_prodserv_action').bind('click', function(){
				// submit form
				document.getElementById("addprodservform").submit();
			});
			$('.delete-button').bind('click', function(){
				if (confirm("Delete account " + $(this).data('id'))) {
					// submit form
				}
			});
		});
	</script>
	<?php	
}

function bestbooks_dashboard_accounting() {
	?>
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
	} else {
	}
	$sql .= " LIMIT $paged,$limit";
	$transactions = $wpdb->get_results($sql);
	$coa = get_coa_instance();
	?>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_accounting'); ?>">Accounting</a> - Transactions&nbsp;
			<input type="button" class="w3-button w3-blue" id="add_transaction" value="Add Transaction" />
			<!--input type="button" id="add_income" value="Add Income" /-->
			<!--input type="button" id="add_expense" value="Add Expense"  /-->
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
	<div id="add-transaction-dialog" title="Add New Transaction" style="display:none;">
		<label class="w3-block" for="transaction_date">Date</label>
		<input class="w3-input w3-block" type="text" id="transaction_date" name="transaction_date" value="" />
		<br/>
		<label class="w3-block" for="transaction_description">Description</label>
		<input class="w3-input w3-block" type="text" id="transaction_description" name="transaction_description" value="" />
		<br/>
		<label class="w3-block" for="transaction_amount">Amount</label>
		<input class="w3-input w3-block" type="number" id="transaction_amount" name="transaction_amount" value="" />
		<br/>
		<label class="w3-block" for="transaction_account">Account</label>
		<select class="w3-input w3-block" id="transaction_account" name="transaction_account">
			<option value="">Select</option>
			<?php foreach($coa->account as $name => $type) : ?>
				<option value="<?php echo $name; ?>" data-type="<?php echo $type; ?>"><?php echo $name; ?></option>
			<?php endforeach; ?>
		</select>
		<input type="hidden" id="transaction_account_type" name="transaction_account_type" value="" />
		<br/>
		<input class="w3-button w3-block w3-black" type="button" id="add_transaction_action" name="add_transaction_action" value="Add" />
	</div>
	<script>
		jQuery(document).ready(function($){
			$("#add-transaction-dialog").dialog({
    			autoOpen : false, modal : true, show : "blind", hide : "blind"
  			});
			$('#add_transaction').bind('click', function(){
				$("#add-transaction-dialog").dialog("open");
				return false;
			});
			$('#transaction_account').change(function(){
				$('#transaction_account_type').val($('#transaction_account').find(':selected').data('type'));
			});
			$('#add_transaction_action').bind('click', function(){
				if ($('#transaction_date').val() == "") {
					alert("Missing Transaction Date!");
					return false;
				}
				if ($('#transaction_description').val() == "") {
					alert("Missing Transaction Description");
					return false;
				}
				if ($('#transaction_amount').val() == 0) {
					alert("Missing Transaction Amount!");
					return false;
				}
				if ($('#transaction_account').val() == "") {
					alert("Missing Transaction Account!");
					return false;
				}
				$.ajax({
					url: "<?php echo admin_url('admin-ajax.php'); ?>",
					type: "post",
					data: {
						action: "bestbooks_add_transaction",
						tdate: $('#transaction_date').val(),
						tdesc: $('#transaction_description').val(),
						tamount: $('#transaction_amount').val(),
						taccount: $('#transaction_account').val(),
						ttype: $('#transaction_account_type').val(),
					},
					success: function(results) {
						alert(results);
						$("#add-transaction-dialog").dialog("close");
						location.reload();
					}
				});
			});
		});
	</script>
	<?php	
}

function bestbooks_dashboard_accounting_chartofaccounts() {
	//require_once dirname(__FILE__).'/vendor/autoload.php';
	?>
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
	$coa = get_coa_instance();
	?>
	<div class="wrap">
		<h2>BestBooks - Banking</h2>
		<?php foreach($coa->account as $name => $type) : ?>
			<?php if ($type === 'Bank') : ?>
				<fieldset><legend><?php echo $name; ?></legend>
					<table class="w3-table">
						<tr>
							<th>Number</th>
							<th>Date</th>
							<th>Description</th>
							<th>C</th>
							<th>Debit</th>
							<th>Credit</th>
							<th>Balance</th>
						</tr>
						<?php $bank = new Bank($name); ?>
						<?php $transactions = $bank->transactions(); ?>
						<?php foreach($transactions as $transaction) : ?>
							<tr>
								<td><?php echo $transaction->id; ?></td>
								<td><?php echo $transaction->txdate; ?></td>
								<td><?php echo $transaction->note; ?></td>
								<td></td>
								<td><?php echo $transaction->debit; ?></td>
								<td><?php echo $transaction->credit; ?></td>
								<td><?php echo $transaction->balance; ?></td>
							</tr>
						<?php endforeach; ?>
					</table>
				</fieldset>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<?php	
}

/**
 * Inspired from https://github.com/weezykon/payroll
 * 
 */
function bestbooks_dashboard_payroll() {
	if (isset($_POST['pay_employee_action'])) {
		$employee_no = $_POST['employee_no'];
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$dept = $_POST['dept'];
		$position = $_POST['position'];
		$address = $_POST['address'];
		$phoneno = $_POST['phoneno'];

		$blog_id = get_current_blog_id();

		$timezone = get_option("bestbooks_timezone");
		$zones = timezone_identifiers_list();
		date_default_timezone_set($zones[$timezone]);

		if (($user_id = username_exists($email)) || email_exists($email)) {
			$user = get_user_by('id', $user_id);
			$user->display_name = $fullname;
			wp_update_user($user);
			$user->add_role("bestbooks_employee");
			//add_user_to_blog($blog_id, $user_id, $user->role);
			update_user_meta($user_id, 'address', $address);
			update_user_meta($user_id, 'dept', $dept);
			update_user_meta($user_id, 'phone', $phoneno);
			update_user_meta($user_id, 'position', $position);
			update_user_meta($user_id, 'employee_no', $employee_no);
		} else {
			$random_password = wp_generate_password(12, false);
			$user_id = wp_create_user($vendor_email, $random_password, $vendor_email);
			if (is_wp_error($user_id)) {
				$error_string = $user_id->get_error_message();
   				echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
			} else {
				$user = get_user_by('id', $user_id);
				$user->display_name = $fullname;
				wp_update_user($user);
				add_user_to_blog($blog_id, $user_id, 'bestbooks_employee');
				update_user_meta($user_id, 'address', $address);
				update_user_meta($user_id, 'dept', $dept);
				update_user_meta($user_id, 'phone', $phoneno);
				update_user_meta($user_id, 'position', $position);
				update_user_meta($user_id, 'employee_no', $employee_no);
			}
		}		
	}
	$employee_no = 'BBE-'.date('YmdHis');

	$employees = array();
	$_employees = get_users(
		array(
			'role__in' => array('bestbooks_employee'),
			'fields' => 'all'
		)
	);
	foreach($_employees as $employee) {
		$employee->metadata = get_user_meta($employee->ID);
		$employees[] = $employee;
	}
	?>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<div class="wrap">
		<h2>BestBooks - Payroll
		<button class="w3-button w3-blue" id="add_employee">Add New Employee</button>
		<button class="w3-button w3-green" id="pay_employee">Pay Employee</button>
		</h2>
		<fieldset>
			<legend>Employee(s)</legend>
			<table class="w3-table w3-striped">
				<tr>
					<th>Employee No.</th>
					<th>Name</th>
					<th>Dept</th>
					<th>Position</th>
					<th>Address</th>
					<th>Phone No</th>
					<th>Hired</th>
					<th>Action</th>
				</tr>
				<?php foreach($employees as $employee) : ?>
				<tr>
					<td><?php echo $employee->metadata['employee_no'][0]; ?></td>
					<td><?php echo $employee->display_name; ?></td>
					<td><?php echo $employee->metadata['dept'][0]; ?></td>
					<td><?php echo $employee->metadata['position'][0]; ?></td>
					<td><?php echo $employee->metadata['address'][0]; ?></td>
					<td><?php echo $employee->metadata['phone'][0]; ?></td>
					<td><?php echo $employee->user_registered; ?></td>
					<td>
					<select class="w3-input" onchange="employeeAction(this)" data-id="<?php echo $employee->ID; ?>">
						<option value="">Select</option>
						<option value="payrecords">View Pay Records</option>
						<option value="delete">Delete</option>
					</select>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</fieldset>	
		<fieldset>
			<legend>Payment Records</legend>
			<label class="w3-block">Employee</label>
			<input type="text" class="w3-input w3-block w3-grey" id="payrecords-empname" name="payrecords-empname" placeholder="Employee Name" readonly>
			<table class="w3-table w3-striped">
				<tr>
					<th>Worked Days</th>
					<th>Absent Days</th>
					<th>Allowance Fees</th>
					<th>Overtime Fees</th>
					<th>Tax Rate</th>
					<th>Salary Fees</th>
					<th>Recorded By</th>
					<th>Date</th>
				</tr>		
			</table>
		</fieldset>
	</div>
	<div id="add-employee-dialog" title="Add New Employee" style="display:none;">
		<form method="post" id="insert">
        	<label for="employee_no">Employee No</label>
            <input type="text" name="employee_no" id="employee_no" class="w3-input w3-grey" placeholder="Employee No" value="<?php echo $employee_no; ?>" readonly>
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" id="fullname" class="w3-input" placeholder="Full Name" required>
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="w3-input" placeholder="EMail" required>
			<label for="dept">Department</label>
            <input type="text" name="dept" id="dept" class="w3-input" placeholder="Department" required>
			<label for="position">Position</label>
            <input type="text" name="position" id="position" class="w3-input" placeholder="Role" required>
			<label for="address">Address</label>
			<textarea name="address" id="address" class="w3-input" placeholder="Address" required></textarea>
			<label for="phoneno">Telephone No</label>
			<input type="text" name="phoneno" id="phoneno" class="w3-input" placeholder="Phone No" required>
			<button type="submit" name="pay_employee_action" id="pay_employee_action" class="w3-button w3-block w3-black">Add</button>
		</form>
	</div>
	<div id="pay-employee-dialog" title="Pay Employee" style="display:none;">
		<form method="post" id="insert">
            <table class="w3-table">
            	<label for="employee_no">Choose Employee</label>
                <select class="w3-input" name="employee_no" id="employee_no">
					<option value="">Select</option>
				<?php foreach($employees as $employee) : ?>
					<option value="<?php echo $employee->ID; ?>"><?php echo $employee->display_name . '[' . $employee->user_email . ']'; ?></option>
				<?php endforeach; ?>
                </select>
                <label for="worked_days">Worked Days</label>
                <input type="number" name="worked_days" id="worked_days" class="w3-input" placeholder="Worked Days" required>
                <label for="exception">Days Absent At Work</label>
                <input type="number" name="exception" id="exception" class="w3-input" placeholder="Days Absent">
                <label for="overtime">Over Time Fees</label>
                <input type="number" name="overtime" id="overtime" class="w3-input" placeholder="Over Time" >
                <label for="allowance">Allowance Fees</label>
                <input type="number" name="allowance" id="allowance" class="w3-input" placeholder="Allowance Fees" >
                <label for="salary">Salary</label>
                <input type="number" name="salary" id="salary" class="w3-input" placeholder="Staff Salary" required>
                <label for="tax">Tax Rate</label>
                <input type="text" name="tax" id="tax" class="w3-input" placeholder="Tax Rate" required>
                <input type="submit" class="w3-button w3-block w3-black" id="pay_employee_action" value="Record Payment" />
			</table>
		</form>	
	</div>
	<script>
		jQuery(document).ready(function($){
			$("#pay-employee-dialog").dialog({
    			autoOpen : false, modal : true, show : "blind", hide : "blind"
  			});
			$("#add-employee-dialog").dialog({
    			autoOpen : false, modal : true, show : "blind", hide : "blind"
			});
			$('#add_employee').bind('click', function(){
				$('#account_type').val("");
				$('#account_name').val("");
				$("#add-employee-dialog").dialog("open");
				return false;
			});
			$('#pay_employee').bind('click', function(){
				$('#pay-employee-dialog').dialog('open');
				return false;
			});
			$('#pay_employee_action').bind('click', function(){
				if ($('#account_type').val() == "") {
					alert("Missing Account Type!");
					return false;
				}
				if ($('#account_name').val() == "") {
					alert("Missing Account name");
					return false;
				}
				// submit form
			});
			$('.delete-button').bind('click', function(){
				if (confirm("Delete account " + $(this).data('id'))) {
					// submit form
				}
			});

			_employeeAction = function(obj) {
				switch(obj.value) {
					case 'payrecords':
						console.log($(obj).data('id'));
						break;
					case 'delete':
						break;
				}
			}
		});

		function employeeAction(obj) {
			_employeeAction(obj);
		}
	</script>
	<?php	
}

function bestbooks_dashboard_reports() {
	?>
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
    $coa = new ChartOfAccounts();
    $accounts = $coa->getList();

	$total_assets = 0.0;
	$total_liabilities = 0.0;
	$total_equity = 0.0;
    foreach ($accounts as $name => $type) {
		if ($type === "Asset" || $type === "Cash") {
			$account = new Ledger($name, $type);
			$balance = $account->getBalance();
			$total_assets += abs($balance);
		} elseif ($type === "Liability") {
			$account = new Ledger($name, $type);
			$balance = $account->getBalance();
			$total_liabilities += abs($balance);
		} elseif ($type === "OwnersEquity") {
			$account = new Ledger($name, $type);
			$balance = $account->getBalance();
			$total_equity += abs($balance);
		}
	}
	?>
	<table>
		<tr>
			<th>Account</th>
			<th>Total(s)</th>
		</tr>
		<tr>
			<td>Total Assets</td>
			<td><?php echo $total_assets; ?></td>
		</tr>
		<tr>
			<td>Total Liabilities</td>
			<td><?php echo $total_liabilities; ?></td>
		</tr>
		<tr>
			<td>Total Equity</td>
			<td><?php echo $total_equity; ?></td>
		</tr>
		<tr>
			<td>Balance</td>
			<td><?php echo ($total_assets - ($total_liabilities + $total_equity)); ?></td>
		</tr>
	</table>
	<?php
}

function bestbooks_dashboard_reports_incomestatement() {
    $coa = new ChartOfAccounts();
    $accounts = $coa->getList();
    $income_accounts = array();
    $expense_accounts = array();
    $total_income = 0.0;
    $total_expense = 0.0;
    foreach ($accounts as $name => $type) {
        if ($type === "Revenue") {
            $income = new Ledger($name, $type);
            $balance = $income->getBalance();
            $income_accounts[$type][] = array(
                'name' => $name,
                'type' => $type,
                'balance' => abs($balance)
            );
            $total_income += abs($balance);
        } elseif ($type === "Expense") {
            $expense = new Ledger($name, $type);
            $balance = $expense->getBalance();
            $expense_accounts[$type][] = array(
                'name' => $name,
                'type' => $type,
                'balance' => abs($balance)
            );
            $total_expense += abs($balance);
        }
    }
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Income Statement</h2>
        <table>
            <th colspan="2">Account</th><th>Debit</th><th>Credit</th>
            <?php foreach ($income_accounts as $type => $accounts) : ?>
                <tr><td colspan="4"><b><?php echo $type; ?></b></td></tr>
                <?php foreach ($accounts as $account) : ?>
                    <tr>
                        <td></td>
                        <td><?php echo $account['name']; ?></td>
                        <td></td>
                        <td><?php echo $account['balance']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <?php foreach ($expense_accounts as $type => $accounts) : ?>
                <tr><td colspan="4"><b><?php echo $type; ?></b></td></tr>
                <?php foreach ($accounts as $account) : ?>
                    <tr>
                        <td></td>
                        <td><?php echo $account['name']; ?></td>
                        <td><?php echo $account['balance']; ?></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td align="right">Total:</td>
                <td><?php echo $total_expense; ?></td>
                <td><?php echo $total_income; ?></td>
            </tr>
        </table>
	</div>
	<?php
}

/**
 * More info at https://www.thebalancesmb.com/how-to-collect-report-and-pay-state-sales-taxes-399043
 */
function bestbooks_dashboard_reports_salestaxreport() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Sales Tax Report</h2>
		<center>
			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/coming-soon.png" />
		</center>
		<a href="https://www.thebalancesmb.com/how-to-collect-report-and-pay-state-sales-taxes-399043" target="_blank">How To Collect, Report, and Pay State Sales Taxes</a>
		<p>If your business is selling in Alaska, Delaware, Montana, New Hampshire, or Oregon, no sales tax is charged</p>
		<a href="https://www.thebalance.com/state-tax-web-sites-3193299" target="_blank">State Tax Websites</a>
		<br/>
		<a href="https://developer.avalara.com/" target="_blank">Tax Rates API</a>
		<br/>
		<a href="https://developer.avalara.com/avatax/dev-guide" target="_blank">AvaTax Developer Guide</a>
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
	if (isset($_POST['formsubmit'])) {
		$user_id = $_POST['customer'];
		$user = get_user_by('id', $user_id);
	}
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Income by Customer</h2>
	</div>
	<?php
    $bestbooks_customer = get_option("bestbooks_customer");
    if (isset($bestbooks_customer) === false) {
        $bestbooks_customer = "bestbooks_customer";
    }

	$customers = get_users(array('role__in'=>array($bestbooks_customer)));
	?>
	<form method="post" id="changecustomerform">
		<input type="hidden" name="formsubmit" value="1" />
		<label for="customer">Customer</label>
		<select id="customer" name="customer" class="w3-input" onchange="changeCustomer(this)">
			<option value="">Select</option>
		<?php foreach ($customers as $customer) : ?>
			<option value="<?php echo $customer->ID; ?>"><?php echo $customer->display_name . '[' . $customer->user_email . ']'; ?></option>
		<?php endforeach; ?>
		</select>
	</form>
	<script type="text/javascript">
	function changeCustomer(obj) {
		document.getElementById("changecustomerform").submit();
	}
	</script>
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
	if (isset($_POST['formsubmit'])) {
		$user_id = $_POST['vendor'];
		$user = get_user_by('id', $user_id);
	}
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Expense by Vendor</h2>
	</div>
	<?php
    $bestbooks_vendor = get_option("bestbooks_vendor");
    if (isset($bestbooks_vendor) === false) {
        $bestbooks_vendor = "bestbooks_vendor";
    }

	$vendors = get_users(array('role__in'=>array($bestbooks_vendor)));
	?>
	<form method="post" id="changevendorform">
		<input type="hidden" name="formsubmit" value="1" />
		<label for="vendor">Vendor</label>
		<select id="vendor" name="vendor" class="w3-input" onchange="changeVendor(this)">
			<option value="">Select</option>
		<?php foreach ($vendors as $vendor) : ?>
			<option value="<?php echo $vendor->ID; ?>"><?php echo $vendor->display_name . '[' . $vendor->user_email . ']'; ?></option>
		<?php endforeach; ?>
		</select>
	</form>
	<script type="text/javascript">
	function changeVendor(obj) {
		document.getElementById("changevendorform").submit();
	}
	</script>
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
    $coa = new ChartOfAccounts();
    $accounts = $coa->getList();
    $total_debit = 0.0;
    $total_credit = 0.0;
    $tb_account = array();
    foreach ($accounts as $name => $type) {
        if ($type === "Revenue" || $type === "Cash") {
            $income = new Ledger($name, $type);
            $balance = $income->getBalance();
            $tb_accounts[$type][] = array(
                'name' => $name,
                'type' => $type,
                'debit' => abs($balance),
                'credit' => 0
            );
            $total_debit += abs($balance);
        } elseif ($type === "Expense" || $type === "Liability" || $type === "Asset") {
            $expense = new Ledger($name, $type);
            $balance = $expense->getBalance();
            $tb_accounts[$type][] = array(
                'name' => $name,
                'type' => $type,
                'debit' => 0,
                'credit' => abs($balance)
            );
            $total_credit += abs($balance);
        }
    }
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Trial Balance</h2>
        <table>
            <th>Account</th><th>Debit</th><th>Credit</th>
            
            <tr>
                <td align="right">Total</td>
                <td align="right"><?php echo $total_debit; ?></td>
                <td align="right"><?php echo $total_credit; ?></td>
            </tr>
        </table>
        <pre><?php print_r($tb_accounts); ?></pre>
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

function bestbooks_dashboard_reports_10q() {
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Quarterly 10-Q Report</h2>
		<form method="post">
			<label class="w3-block" for="start-range">Starting Date</label>
			<input type="date" class="w3-input w3-block" name="start-range" id="start-range" value="" />
			<label class="w3-block" for="end-range">Ending Date</label>
			<input type="date" class="w3-input w3-block" name="end-range" id="end-range" value="" />
			<br/>
			<input type="submit" name="show_report" value="Show Report" class="w3-button w3-block w3-black" />
		</form>
	</div>
	<?php
	if (isset($_POST['show_report'])) {
		echo '<pre>'; print_r($_POST); echo '</pre>';
		$start_range = $_POST['start-range'];
		$end_range = $_POST['end-range'];
	}

}

function bestbooks_dashboard_reports_10k() {

	$years = range(date("Y"),1910); 
	$datalist = '<datalist id="years">';
	foreach ($years as $year) {
		$datalist .= '<option value="'.$year.'">';
	}
	$datalist .= '</datalist>';
	?>
	<div class="wrap">
		<h2>BestBooks - <a href="<?php echo admin_url('admin.php?page=bestbooks_reports'); ?>">Reports</a> - Annual 10-K Report</h2>
		<form method="post">
			<label class="w3-block" for="report-year">Report Year</label>
			<input list="years" class="w3-input w3-block" name="report-year" id="report-year" value="" />
			<?php echo $datalist; ?>
			<br/>
			<input type="submit" name="show_report" value="Show Report" class="w3-button w3-block w3-black" />
		</form>
	</div>
	<?php
	if (isset($_POST['show_report'])) {
		echo '<pre>'; print_r($_POST); echo '</pre>';
		$report_year = $_POST['report-year'];
	}
}

function bestbooks_dashboard_settings() {
    if (isset($_POST['submit'])) {
        update_option("bestbooks_customer", $_POST['customer-role']);
        update_option("bestbooks_vendor", $_POST['vendor-role']);
	update_option("bestbooks_timezone", $_POST['timezone']);
	update_option("bestbooks_avatax_userid", $_POST['avatax-userid']);
	update_option("bestbooks_avatax_password", $_POST['avatax-password']);
    }
    $bestbooks_customer = get_option("bestbooks_customer");
    if (isset($bestbooks_customer) === false) {
        $bestbooks_customer = "bestbooks_customer";
    }
    $bestbooks_vendor = get_option("bestbooks_vendor");
    if (isset($bestbooks_vendor) === false) {
        $bestbooks_vendor = "bestbooks_vendor";
    }
    $bestbooks_timezone = get_option("bestbooks_timezone");
    if (isset($bestbooks_timezone) === false) {
        $bestbooks_timezone = date_default_timezone_get();
	}
	echo $bestbooks_timezone;
	?>
	<div class="wrap">
		<h2>BestBooks - Settings</h2>
		<form method="post">
			<label class="w3-block" for="customer-role">Customer Role</label>
			<select class="w3-input w3-block" name="customer-role" id="customer-role">
				<option value="">Select</option>
				<?php wp_dropdown_roles($bestbooks_customer); ?>
			</select>
			<br/>
			<label class="w3-block" for="vendor-role">Vendor Role</label>
			<select class="w3-input w3-block" name="vendor-role" id="vendor-role">
				<option value="">Select</option>
				<?php wp_dropdown_roles($bestbooks_vendor); ?>
			</select>
			<br/>
			<label class="w3-block" for="timezones">Time Zones</label>
			<select class="w3-input w3-block" name="timezone" id="timezone">
				<option value="">Select</option>
				<?php
				$zones = timezone_identifiers_list();
				foreach ($zones as $index => $zone) {
					if ($index == $bestbooks_timezone) {
						echo '<option value="'.$index.'" selected>'.$zone.'</option>';
					} else {
						echo '<option value="'.$index.'">'.$zone.'</option>';                    
					}
				}
				?>
			</select>
			<br/>
			<fieldset>
				<legend>AvaTax by Avalara</legend>
				<label class="w3-block" for="avatax-userid" >User ID</label>
				<input type="text" class="w3-input w3-block" name="avatax-userid" id="avatax-userid" value="" />
				<label class="w3-block" for="avatax-password" >Password</label>
				<input type="password" class="w3-input w3-block" name="avatax-password" id="avatax-password" value="" />
			</fieldset>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}
?>