<?php

class Journal {
  public function __construct() {
  }
   
  public function add($date,$ref,$account,$debit,$credit) {
   	global $wpdb;
   	
    if (is_plugin_active_for_network('bestbooks/bestbooks.php')) {
      $sql = "INSERT INTO ".$wpdb->base_prefix."bestbooks_journal (txdate,ref,account,debit,credit) VALUES ('$date','$ref','$account','$debit','$credit')";
    } else {
      $sql = "INSERT INTO ".$wpdb->prefix."bestbooks_journal (txdate,ref,account,debit,credit) VALUES ('$date','$ref','$account','$debit','$credit')";
    }
    $result = $wpdb->query($sql);
	
    if ($result===false) {
	    throw new BestBooksException("Journal record insertion error: ".$sql);
    }
    return "new Journal record added";
  }
   
  public function inBalance() {
    global $wpdb;
       
    if (is_plugin_active_for_network('bestbooks/bestbooks.php')) {
   	  $sql = "SELECT SUM(debit)=SUM(credit) FROM ".$wpdb->base_prefix."bestbooks_journal";
    } else {
      $sql = "SELECT SUM(debit)=SUM(credit) FROM ".$wpdb->prefix."bestbooks_journal";
    }
   	$result = $wpdb->query($sql);
   	
    if ($result===false) {
	    throw new BestBooksException("Journal balance check error: ".$sql);
    }
    $row = $result->fetchRow();
    return $row[0];
  }
  
  public function getBalance() {
      return $this->inBalance();
  }

  public function setBalance() {
      throw new BestBooksException('request not supported');
  }
   
  public static function createTable() {
   	global $wpdb;
   	
    //$sql = 'CREATE TABLE `'.$wpdb->prefix.'Journal` (`txdate` DATE NOT NULL,`ref` TINYINT NOT NULL,`account` VARCHAR(50) NOT NULL,`debit` DECIMAL(10,2) NOT NULL,`credit` DECIMAL(10,2) NOT NULL)';
    if (is_plugin_active_for_network('bestbooks/bestbooks.php')) {
      $sql = "CREATE TABLE IF NOT EXISTS `".$wpdb->base_prefix."bestbooks_journal` (
                      `txdate` date NOT NULL default '0000-00-00',
                      `ref` tinyint(4) NOT NULL default '0',
                      `account` varchar(50) NOT NULL default '',
                      `debit` decimal(10,2) NOT NULL default '0.00',
                      `credit` decimal(10,2) NOT NULL default '0.00'
                      ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
    } else {
      $sql = "CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."bestbooks_journal` (
                      `txdate` date NOT NULL default '0000-00-00',
                      `ref` tinyint(4) NOT NULL default '0',
                      `account` varchar(50) NOT NULL default '',
                      `debit` decimal(10,2) NOT NULL default '0.00',
                      `credit` decimal(10,2) NOT NULL default '0.00'
                      ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
    }
    $result = $wpdb->query($sql);
	
    if ($result === false) {
	    throw new BestBooksException("Journal table creation error. ".$sql);
    }
    return "Journal table created successfully";
  }
   
  public static function dropTable() {
   	global $wpdb;
   	
    if (is_plugin_active_for_network('bestbooks/bestbooks.php')) {
      $sql = "DROP TABLE ".$wpdb->base_prefix."bestbooks_journal";
    } else {
      $sql = "DROP TABLE ".$wpdb->prefix."bestbooks_journal";
    }
    $result = $wpdb->query($sql);
	
    if ($result===false) {
	    throw new BestBooksException("Journal table drop failure");
    }
    return "Journal table dropped successfully";
  }
}


?>