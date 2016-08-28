<?php

class Asset extends Ledger {
   public function __construct($name) {
      parent::__construct($name,"Asset");
   }
   
   function addDebit($date,$desc,$amount) {
   	$balance = parent::getBalance() + $amount;
   	parent::setBalance($balance);
   	return parent::addDebit($date,$desc,$amount);
   }
   
   function addCredit($date,$desc,$amount) {
   	$balance = parent::getBalance() - $amount;
   	parent::setBalance($balance);
   	return parent::addCredit($date,$desc,$amount);
   }
}
?>