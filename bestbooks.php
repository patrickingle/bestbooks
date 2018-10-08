<?php
/**
 * Plugin Name: Bestbooks
 * Plugin URI: http://wordpress.org/plugins/bestbooks/
 * Description: The popular accounting framework
 * Version: 2.2.2
 * Author: PHK Corporation
 * Author URI: https://phkcorp.com
 * 
 * @version 2.2.2
 * @package bestbooks
 * @author PHK Corporation [phkcorp2005@gmail.com]
 * @copyright 2009-2018 PHK Corporation
 */
/**
 * @constant BESTBOOKS_VERSION 2.2.2 
 */
define("BESTBOOKS_VERSION", "2.2.2");

/*
 * Copyright 2009-2018  PHK Corporation  (email : phkcorp2005@gmail.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * 
*/


/**
 * @example
 * Problem Statement:
 * -----------------
 * 
 * A.	Receives $137.00 from a daily bookout while driving for Taxi Transportation
 * B.	Spent $37.00 for gas for the day while diving for Taxi Transportation
 * 
 * 
 * require_once('vendor/autoload.php');
 * 
 * 1. Create a chart of accounts or open an existing chart of accounts
 * 
 * $coa = new ChartOfAccounts($mdb);
 * 
 * 2. Create or open the account classes and add to the Chart of Accounts
 * 
 * $coa->add("Cash","Asset");
 * $coa->add("Livery","Revenue");
 * $coa->add("Gas","Expense");
 * 
 * 3. Assign Ledger entries for each Account - The name must match the name given above
 * 
 * $cash = new Asset($mdb,"Cash");
 * $livery = new Revenue($mdb,"Livery");
 * $gas = new Expense($mdb,"Gas");
 * 
 * 4. Add ledger entries
 * 
 * $livery->addcredit($mdb,"2007-03-31","Taxi Transportation Daily Bookout",137.00);
 * $cash->adddebit($mdb,"2007-03-31","Tax Transportation Daily Bookout",137.00);
 * $cash->addcredit($mdb,"2007-03-31","Gas for Taxi Transportation Daily",37.00);
 * $gas->adddebit($mdb,"2007-03-31","Gas for Taxi Transportation Daily",37.00);
 * 
 */

require_once dirname(__FILE__).'/vendor/autoload.php';
require_once dirname(__FILE__).'/ajax.php';
require_once dirname(__FILE__).'/api.php';
require_once dirname(__FILE__).'/admin.php';
require_once dirname(__FILE__).'/hooks.php';
require_once dirname(__FILE__).'/imports.php';

require_once dirname(__FILE__).'/lib/addons/stripejs/index.php';

?>