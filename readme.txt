=== Bestbooks ===
Contributors: phkcorp2005
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9674139
Tags: shari phk corporation bestbooks accounting application framework sourceforge
Requires at least: 2.9
Tested up to: 4.9.4
Stable tag: 2.2

Provides an accounting application framework for wordpress.

== Description ==

BestBooks For Wordpress originally was developed in Java, the original framework.
The goal behind Bestbooks is to provide an accounting application framework modelled
after common accounting terms (t-account,ledger,jornal) and the GAAP (Generally Accepted
Accounting Principles) while providing open database connectivity. At the time,
accounting frameworks had a proprietary, closed database structure. The original Bestbooks
for Java has connectivity for multiple databases including MSSQL, DB2, Oracle and MySQL.

BestBooks for Wordpress is a minimal accounting framework.

BestBooks for Wordpress has enough functionality that you can create
workable scripts that solve accounting problems. You will be able to
implement many of the accounting problems on the accounting
learning website, http://www.simplestudies.com


== Installation ==

To install this plugin, follow these steps:

1. Download the plugin
2. Extract the single file
3. Extract the plugin to the `/wp-content/plugins/` directory as new directory will be created identified as 'bestbooks'
4. Activate the plugin through the 'Plugins' menu in WordPress, identified by 'Bestbooks'


== Arbitrary section ==


Tables creation from SQL:
------------------------


These tables are created automatically within the wordpress database


-- 
-- Table structure for table `Accounts`
-- 

CREATE TABLE `Accounts` (
  `id` tinyint(4) NOT NULL auto_increment,
  `date` date NOT NULL default '0000-00-00',
  `name` varchar(50) NOT NULL default '',
  `type` varchar(20) NOT NULL default '',
  `data` varchar(25) NOT NULL default '',
  `class` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `Journal`
-- 

CREATE TABLE IF NOT EXISTS `Journal` (
  `date` date NOT NULL default '0000-00-00',
  `ref` tinyint(4) NOT NULL default '0',
  `account` varchar(50) NOT NULL default '',
  `debit` decimal(10,2) NOT NULL default '0.00',
  `credit` decimal(10,2) NOT NULL default '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- 
-- Table structure for table `Ledger`
-- 

CREATE TABLE IF NOT EXISTS `Ledger` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


Testing:
-------

Create a page with the following shortcode, [bestbooks-sample-1]
then check your database tables for the validation.

If you get an error, please report it!

== Frequently Asked Questions ==

Please do not be afraid of asking questions?<br>

(There are no stupid or dumb questions!)


== Changelog ==
= 2.2 =
* Made tables network aware and general code fixes
* Added UI panels for easier management with report generation
* Added hooks to ease with the integration with the framework from other themes and plugins.

= 2.1.1 =
* Added Dashboard settings form to add new Chart of Accounts 
* Exposed the Bestbooks chart of accounts as a WordPress taxonomy of bestbooks_coa

= 2.1 =
* Fixed Journal entries, Liability accounts enter increases in the credit, and decreases in the debit columns
* Add additional implementation to the REST API, to include add and subtract and updates appropriately
* Added additional WP-JSON REST API's: account_types, debit, credit, balance, add, subtract, headers
* Implemented composer for autoload using vendor/autoload.php
* Implemented backward compatibility when SplEnum is not available
* added getAccountBaseType to TAccount
* added new account classes: Cash, Bank, Credit, Investment, Withdrawal

= 2.0 =
* Architect framework to use PSR-4 autoloading
* change table name to preceed with bestbooks_ as not to interfere with existing tables
* added a rest API

= 1.1.2 =
* Version number change only

= 1.1.1 =
* Compatible to WP Version 4.3

= 1.1 =
* Change table reference to include wpdb->prefix to support WPMU as well as custom table names, removed php5-ext

= 1.0 =
* Created

== Upgrade Notice ==

== Credits ==

We make honorable mention to anyone who helps make Bestbooks for Wordpress a better plugin!

== Contact ==

Support is provided at https://github.com/patrickingle/bestbooks/issues. You will require a free account on github.com

Please contact phkcorp2005@gmail.com or visit the above forum with questions, comments, or requests.