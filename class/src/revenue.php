<?php

class Revenue extends Ledger {
    public function __construct($name) {
        parent::__construct($name,"Revenue");
        }
   
    public function addDebit($date,$desc,$amount) {
   	$balance = parent::getBalance() - $amount;
   	parent::setBalance($balance);
   	return parent::addDebit($date,$desc,$amount);
    }
   
    public function addCredit($date,$desc,$amount) {
   	$balance = parent::getBalance() + $amount;
   	parent::setBalance($balance);
   	return parent::addCredit($date,$desc,$amount);
    }
}

?>