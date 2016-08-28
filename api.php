<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

add_action( 'rest_api_init', 'add_bestbooks_api');

function add_bestbooks_api() {
register_rest_route('bestbooks/v2', '/chartofaccounts/',
        array(
            'methods' => 'GET',
            'callback' => 'bestbooks_api_chartofaccounts'
        ));
}

function bestbooks_api_chartofaccounts() {
    $coa = new ChartOfAccounts();
    return $coa->getList();
}
?>