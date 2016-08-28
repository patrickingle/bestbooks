<?php

abstract class Ledger extends TAccount {
	var $balance = 0;
	var $name = null;
	var $type = null;
	var $debit = 0;
	var $credit = 0;

	public function __construct($name, $type) {
		global $wpdb;
		
		if ($name == null || $type == null)
			throw new BestBooksException("Null pointer exception");
		$this->name = $name;
		$this->type = $type;
		$sql = "SELECT type FROM ".$wpdb->prefix."bestbooks_accounts WHERE name='$this->name'";
		$result = $wpdb->query($sql);

		if (!$result) {
			throw new BestBooksException("Error: " . $sql);
		}
		if ($wpdb->num_rows == 0) {
			throw new BestBooksException("Account:" . $this->name . " not found/does not exist");
		}
		$wpdb->get_row($sql,$row,0);
		$this->type = $row[0];

		$sql = "SELECT Balance FROM ".$wpdb->prefix."bestbooks_ledger WHERE name='$name' ORDER BY id DESC";
		$result = $wpdb->query($sql);
		if ($wpdb->num_rows >= 0) {
			$wpdb->get_row($sql,$row,0);
			$this->balance = $row[0];
		}
	}

	public function getName() {
		return $this->name;
	}

	public function getType() {
		return $this->type;
	}

	public function addDebit($date, $desc, $amount) {
		global $wpdb;
		
		$sql = "INSERT INTO ".$wpdb->prefix."bestbooks_ledger (name,txdate,note,debit,balance,type) VALUES ('$this->name','$date','$desc','$amount','$this->balance','$this->type')";
		$result = $wpdb->query($sql);

		if ($result===false) {
			throw new BestBooksException("Ledger table insertion failure: " . $sql);
		}

		$this->debit = $amount;
                
                $journal = new Journal();
                $journal->add($date,0,$this->name,$amount,0.00);
                
		return "Debit amount:" . $amount . " inserted correctly into Ledger:" . $this->name;
	}

	public function addCredit($date, $desc, $amount) {
		global $wpdb;
		
		$sql = "INSERT INTO ".$wpdb->prefix."bestbooks_ledger (name,txdate,note,credit,balance,type) VALUES ('$this->name','$date','$desc','$amount','$this->balance','$this->type')";
		$result = $wpdb->query($sql);

		if ($result===false) {
			throw new BestBooksException("Ledger table insertion failure: " . $sql);
		}

		$this->credit = $amount;
                $journal = new Journal();
                $journal->add($date,0,$this->name,0.00,$amount);
                
		return "Credit amount:" . $amount . " inserted correctly into Ledger:" . $this->name;
	}

	public function getDebit() {
		return $this->debit;

	}

	public function getCredit() {
		return $this->credit;

	}

	public function getBalance() {
		return $this->balance;
	}

	public function setBalance($balance) {
		$this->balance = $balance;
	}

	public static function createTable() {
            global $wpdb;

            //$sql = "CREATE TABLE `".$wpdb->prefix."Ledger` (`id` TINYINT AUTO_INCREMENT ,`name` VARCHAR( 255 ) NOT NULL,`txdate` DATE NOT NULL,`desc2` VARCHAR( 255 ) NOT NULL,`ref` DOUBLE NOT NULL,`debit` DECIMAL( 10, 2 ) NOT NULL ,`credit` DECIMAL( 10, 2 ) NOT NULL ,`balance` DECIMAL( 10, 2 ) NOT NULL ,`type` VARCHAR( 10 ) NOT NULL ,PRIMARY KEY ( `id` ) )";
            $sql = "CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."bestbooks_ledger` (
                    `id` tinyint(4) NOT NULL auto_increment,
                    `name` varchar(255) NOT NULL default '',
                    `txdate` date NOT NULL default '0000-00-00',
                    `note` varchar(255) NOT NULL default '',
                    `ref` double NOT NULL default '0',
                    `debit` decimal(10,2) NOT NULL default '0.00',
                    `credit` decimal(10,2) NOT NULL default '0.00',
                    `balance` decimal(10,2) NOT NULL default '0.00',
                    `type` varchar(10) NOT NULL default '',
                    PRIMARY KEY  (`id`)
                    ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
            $result = $wpdb->query($sql);

            if ($result === false) {
                    throw new BestBooksException("Ledger table creation error: " . $sql);
            }

            return "Ledger table created successfully";
	}

	public static function dropTable() {
		$sql = "DROP TABLE ".$wpdb->prefix."bestbooks_ledger";
		$result = $wpdb->query($sql);

		if ($result===false) {
			throw new BestBooksException("Ledger table drop failure");
		}

		return "Ledger table dropped successfully";
	}
}

?>