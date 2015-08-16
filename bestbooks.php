<?php

/*
Plugin Name: Bestbooks
Plugin URI: http://wordpress.org/plugins/bestbooks/
Description: The popular accounting framework
Version: 1.1
Author: PHK Corporation
Author URI: http://www.phkcorp.com
*/

/*  Copyright 2009  PHK Corporation  (email : phkcorp2005@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/*

Problem Statement:
-----------------

A.	Receives $137.00 from a daily bookout while driving for Taxi Transportation
B.	Spent $37.00 for gas for the day while diving for Taxi Transportation


require_once('config.inc.php');
require_once('dataconn.inc.php');
require_once('chartofaccounts.inc.php');
require_once('ledger.inc.php');
require_once('revenue.inc.php');
require_once('asset.inc.php');
require_once('expense.inc.php');

// 1. Create a chart of accounts or open an existing chart of accounts
$coa = new ChartOfAccounts($mdb);

// 2. Create or open the account classes and add to the Chart of Accounts
$coa->add($mdb,"Cash","Asset");
$coa->add($mdb,"Livery","Revenue");
$coa->add($mdb,"Gas","Expense");

// 3. Assign Ledger entries for each Account - The name must match the name given above
$cash = new Asset($mdb,"Cash");
$livery = new Revenue($mdb,"Livery");
$gas = new Expense($mdb,"Gas");

// 4. Add ledger entries
$livery->addcredit($mdb,"2007-03-31","Taxi Transportation Daily Bookout",137.00);
$cash->adddebit($mdb,"2007-03-31","Tax Transportation Daily Bookout",137.00);
$cash->addcredit($mdb,"2007-03-31","Gas for Taxi Transportation Daily",37.00);
$gas->adddebit($mdb,"2007-03-31","Gas for Taxi Transportation Daily",37.00);

*/

require_once('chartofaccounts.inc.php');
require_once('ledger.inc.php');
require_once('revenue.inc.php');
require_once('asset.inc.php');
require_once('expense.inc.php');

function addBestBooksTables ()
{
	global $wpdb;

	if (is_admin()) {

		$query = "CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."Accounts` (
  				`id` tinyint(4) NOT NULL auto_increment,
  				`date` date NOT NULL default '0000-00-00',
  				`name` varchar(50) NOT NULL default '',
  				`type` varchar(20) NOT NULL default '',
  				`data` varchar(25) NOT NULL default '',
  				`class` varchar(255) NOT NULL default '',
  				PRIMARY KEY  (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

		$wpdb->query($query);

		$query = "CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."Journal` (
  				`date` date NOT NULL default '0000-00-00',
  				`ref` tinyint(4) NOT NULL default '0',
  				`account` varchar(50) NOT NULL default '',
  				`debit` decimal(10,2) NOT NULL default '0.00',
  				`credit` decimal(10,2) NOT NULL default '0.00'
				) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

		$wpdb->query($query);

		$query = "CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."Ledger` (
  			`id` tinyint(4) NOT NULL auto_increment,
  			`name` varchar(255) NOT NULL default '',
  			`date` date NOT NULL default '0000-00-00',
  			`note` varchar(255) NOT NULL default '',
  			`ref` double NOT NULL default '0',
  			`data` decimal(10,2) NOT NULL default '0.00',
  			`credit` decimal(10,2) NOT NULL default '0.00',
  			`balance` decimal(10,2) NOT NULL default '0.00',
  			`type` varchar(10) NOT NULL default '',
  			PRIMARY KEY  (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";

		$wpdb->query($query);

	} // endif of is_admin()
}

//// Add page to options menu.
function addBestBooksToManagementPage()
{
    // Add a new submenu under Options:
    add_options_page('BestBooks', 'BestBooks', 8, 'bestbooks', 'displayBestBooksManagementPage');
}

// Display the admin page.
function displayBestBooksManagementPage()
{
	global $wpdb;

	// Create the tables, if they do not exist?
	addBestBooksTables();


?>
		<div class="wrap">
			<h2>BestBooks Accounting Application Framework</h2>
			<p>You have made a sale and now you need to add that sale to your accounting books?</p>
			<p>Before Bestbooks, the process was manual and tedious!</p>
			<p>Bestbooks allows you to update your accounting books and ledger/journal automatically by
			using the straightforward API's.</p>

				<fieldset class='options'>
					<legend><h2><u>Tips &amp; Techniques</u></h2></legend>
<code>
1. Get an instance of the Chart of Accounts<br/>
$coa = get_coa_instance();<br/>
<br/>
2. Create or open the account classes and add to the Chart of Accounts<br/>
global $wpdb<br/>
$coa-&gt;add($wpdb,"Cash","Asset");<br/>
$coa-&gt;add($wpdb,"Livery","Revenue");<br/>
$coa-&gt;add($wpdb,"Gas","Expense");<br/>
<br/>
3. Assign Ledger entries for each Account - The name must match the name given above<br/>
$cash = get_asset_instance("Cash");<br/>
$livery = get_revenue_instance("Livery");<br/>
$gas = get_expense_instance("Gas");<br/>
<br/>
4. Add ledger entries<br/>
global $wpdb;<br/>
$livery-&gt;addcredit($wpdb,"2007-03-31","Taxi Transportation Daily Bookout",137.00);<br/>
$cash-&gt;adddebit($wpdb,"2007-03-31","Tax Transportation Daily Bookout",137.00);<br/>
$cash-&gt;addcredit($wpdb,"2007-03-31","Gas for Taxi Transportation Daily",37.00);<br/>
$gas-&gt;adddebit($wpdb,"2007-03-31","Gas for Taxi Transportation Daily",37.00);<br/>
</code>
				</fieldset>

				<fieldset class='options'>
					<legend><h2><u>Wordpress Development</u></h2></legend>
<p><a href="http://www.phkcorp.com" target="_blank">PHK Corporation</a> is available for custom Wordpress development which includes development of new plugins, modification
of existing plugins, migration of HTML/PSD/Smarty themes to wordpress-compliant <b>seamless</b> themes.</p>
<p>You may see our samples at <a href="http://www.phkcorp.com?do=wordpress" target="_blank">www.phkcorp.com?do=wordpress</a></p>
<p>Please email at <a href="mailto:phkcorp2005@gmail.com">phkcorp2005@gmail.com</a> or <a href="http://www.phkcorp.com?do=contact" target="_blank">www.phkcorp.com?do=contact</a> with your programming requirements.</p>
				</fieldset>

		</div>
<?php
}


function get_coa_instance()
{
	global $wpdb;

	return new ChartOfAccounts($wpdb);
}

function get_asset_instance($name)
{
	global $wpdb;

	return new Asset($wpdb,$name);
}

function get_revenue_instance($name)
{
	global $wpdb;

	return new Revenue($wpdb,$name);
}

function get_expense_instance($name)
{
	global $wpdb;

	return new Expense($wpdb,$name);
}

function bestbooks_sample_1($atts, $content=null, $code="")
{
	global $wpdb;

	$coa = get_coa_instance();

	$coa->add($wpdb,"Cash","Asset");
	$coa->add($wpdb,"Livery","Revenue");
	$coa->add($wpdb,"Gas","Expense");

	$cash = get_asset_instance("Cash");
	$livery = get_revenue_instance("Livery");
	$gas = get_expense_instance("Gas");

	$livery->addcredit($wpdb,"2007-03-31","Taxi Transportation Daily Bookout",137.00);
	$cash->adddebit($wpdb,"2007-03-31","Tax Transportation Daily Bookout",137.00);
	$cash->addcredit($wpdb,"2007-03-31","Gas for Taxi Transportation Daily",37.00);
	$gas->adddebit($wpdb,"2007-03-31","Gas for Taxi Transportation Daily",37.00);
}

function bestbooks_sample_2($atts, $content=null, $code="")
{
 extract(shortcode_atts(array(
   'choice' => '#',
   'value' => '0',
  ), $atts));
 $choice  = "{$choice}";
 $value = "{$value}";

}

function bestbooks_add_coa_account($atts, $content=null, $code="")
{
	global $wpdb;

	 extract(shortcode_atts(array(
	   'name' => '#',
	   'type' => '0',
	  ), $atts));
	 $name  = "{$name}";
	 $type = "{$type}";

	$coa = get_coa_instance();

	$coa->add($wpdb,$name,$type);
}

add_action('admin_menu', 'addBestBooksToManagementPage');
add_shortcode('bestbooks-sample-1', 'bestbooks_sample_1');
add_shortcode('bestbooks-sample-2', 'bestbooks_sample_2');



?>