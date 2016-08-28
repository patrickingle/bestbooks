<?php

class AccountTypes extends SplEnum {

    const __default = self.Unknown;
    
    const Unknown = "Unknown";
    const Asset = "Asset";
    const Liability = "Liability";
    const OwnersEquity = "OwnersEquity";
    const Revenue = "Revenue";
    const Expense = "Expense";
    const Withdrawals = "Withdrawals";
    const Journal = "Journal";
    const Bank = "Bank";
    const Cash = "Cash";
    const Credit = "Credit";
    const Investment = "Investment";
}

?>