<?php
function bestbooks_dashboard_page() {
	?>
    <div class="wrap">
        <h2>BestBooks Accounting Application Framework</h2>
        <p>You have made a sale and now you need to add that sale to your accounting books?</p>
        <p>Before Bestbooks, the process was manual and tedious!</p>
        <p>
            BestBooks allows you to update your accounting books and ledger/journal automatically by
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
				<li>bestbooks_cogs</li>
            </ul>
            <p>Example using the hook:</p>
            <p>To update the BestBooks ledger when your ecommerce platform has made a successful, just invoke the do_action within your eccommerce platform code as shown below. The ledger will be updated automatically, hence eliminating the need to double post.</p>
            <code>
            	do_action("bestbooks_sales_card", "2018-03-19", "Credit Card Sale", 10.00);
            </code>
            <p>Two ledger accounts will be created, if don't already exist for this action. These two new accounts will be <i>Sales</i> and <i>Account Receivable</i>, respectively.</p>
        </fieldset>
	<fieldset class='options'>
            <legend><h2><u>Wordpress Development</u></h2></legend>
            <p>
                <a href="https://pingleware.work" target="_blank">PressPage Entertainment Inc</a> 
                is available for custom Wordpress development which includes development of new plugins, modification of existing plugins, migration of HTML/PSD/Smarty themes to wordpress-compliant <b>seamless</b> themes.
            </p>
            <p>Please email at <a href="mailto:presspage.entertainment@gmail.com">presspage.entertainment@gmail.com</a> or <a href="tel:12128790758" target="_blank">Call us</a> with your programming requirements.</p>
	</fieldset>
                        
    <fieldset class="options">
        <legend><h2><u>BestBooks API</u></h2></legend>
        <p>To access the BestBooks, use the url <a href="<?php echo rest_url('bestbooks/v2/'); ?>" target="_blank"><?php echo rest_url('bestbooks/v2/'); ?></a></p>
        <p><u>Current Endpoints</u></p>
        <p>
            <ul>
                <li><a href="<?php echo rest_url('bestbooks/v2/chartofaccounts?user='.$current_user->user_email.'&pass='); ?>" target="_blank">Chart Of Accounts</a></li>
                <li><a href="<?php echo rest_url('bestbooks/v2/account_typesuser='.$current_user->user_email.'&pass='); ?>" target="_blank">Account Types</a></li>
                <li><a href="<?php echo rest_url('bestbooks/v2/debituser='.$current_user->user_email.'&pass='); ?>" target="_blank">Debit</a></li>
                <li><a href="<?php echo rest_url('bestbooks/v2/credituser='.$current_user->user_email.'&pass='); ?>" target="_blank">Credit</a></li>
                <li><a href="<?php echo rest_url('bestbooks/v2/balanceuser='.$current_user->user_email.'&pass='); ?>" target="_blank">Balance</a></li>
                <li><a href="<?php echo rest_url('bestbooks/v2/adduser='.$current_user->user_email.'&pass='); ?>" target="_blank">Add</a></li>
                <li><a href="<?php echo rest_url('bestbooks/v2/subtractuser='.$current_user->user_email.'&pass='); ?>" target="_blank">Subtract</a></li>
            </ul>
        </p>
    </fieldset>
	</div>
	<?php
}
?>