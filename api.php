<?php

/* 
 * When adding new class files in the betsbooks/class/src path, must regenerate the classmap for composer,
 * change to the wp-contents/plugins/bestbooks path
 * 
 * php composer.phar dump-autoload
 * 
 * of if composer installed on windows
 * 
 * composer dump-autoload
 * 
 */

add_action( 'rest_api_init', 'add_bestbooks_api');

function add_bestbooks_api() {
    register_rest_route('bestbooks/v2', '/chartofaccounts/',
        array(
            'methods' => 'GET',
            'callback' => 'bestbooks_api_chartofaccounts'
        )
    );
    
    register_rest_route('bestbooks/v2', '/account_types/',
        array(
            'methods' => 'GET',
            'callback' => 'bestbooks_api_get_acctypes'
        )
    );
    
    register_rest_route('bestbooks/v2', '/debit/',
        array(
            'methods' => 'GET',
            'callback' => 'bestbooks_api_debit'
        )
    );
    
    register_rest_route('bestbooks/v2', '/credit/',
        array(
            'methods' => 'GET',
            'callback' => 'bestbooks_api_credit'
        )
    );
    
    register_rest_route('bestbooks/v2', '/balance/',
        array(
            'methods' => 'GET',
            'callback' => 'bestbooks_api_balance'
        )
    );
    
    register_rest_route('bestbooks/v2', '/add/',
        array(
            'methods' => 'GET',
            'callback' => 'bestbooks_api_add'
        )
    );
    
    register_rest_route('bestbooks/v2', '/subtract/',
        array(
            'methods' => 'GET',
            'callback' => 'bestbooks_api_subtract'
        )
    );
    
    register_rest_route('bestbooks/v2', '/headers/',
        array(
            'methods' => array('GET','POST'),
            'callback' => 'bestbooks_api_headers'
        )
    );
    
    wp_localize_script( 
        'wp-api', 
        'wpApiSettings', 
        array(
            'root' => esc_url_raw( rest_url() ),
            'nonce' => wp_create_nonce( 'wp_rest' )
        ) 
    );
}

function bestbooks_authenticate_user() {
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo json_encode('Unautorized Access.');
        exit;
    } else {
        $userid = $_SERVER['PHP_AUTH_USER'];
        $userpw = $_SERVER['PHP_AUTH_PW'];
        $result = wp_authenticate_username_password(null, $userid, $userpw);
        if (is_wp_error($result)) {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo json_encode($result->get_error_message());
            exit;
        }
    }
}

function bestbooks_api_chartofaccounts(WP_REST_Request $request) {
    require_once dirname(__FILE__).'/vendor/autoload.php';

    bestbooks_authenticate_user();

    $results = array();
    $coa = new ChartOfAccounts();
    
    if (isset($request['name']) && isset($request['type'])) {
        try {
            $coa->add($request['name'],$request['type']);
            $results = $coa->getList();
        } catch (Exception $ex) {
            $results = $ex;
        }
    } else {
        $results = $coa->getList();
    }
    $response = new WP_REST_Response( $results );
    return $response;
}

function bestbooks_api_get_acctypes(WP_REST_Request $request) {
    require_once dirname(__FILE__).'/vendor/autoload.php';

    bestbooks_authenticate_user();

    $results = array();
    
    $_acctypes = new AccountTypes();
    $results[] = $_acctypes::getConstList();
    
    $response = new WP_REST_Response( $results );
    return $response;    
}

function bestbooks_api_debit(WP_REST_Request $request) {
    require_once dirname(__FILE__).'/vendor/autoload.php';

    bestbooks_authenticate_user();

    $results = array();
    
    if (isset($request['name'])) {
        try {
            $coa = new ChartOfAccounts();
            $coaList = $coa->getList();
            $account = new $coaList[$request['name']]($request['name']);
            if (isset($request['date']) && isset($request['desc']) && isset($request['amount'])) {
                $results = $account->addDebit($request['date'],$request['desc'],$request['amount']);
            } else {
                $results = $account->getDebit();
            }
        } catch (Exception $ex) {
            $results = $ex;
        }
    } else {
        $results = new BestBooksException('missing account name');
    }
    
    $response = new WP_REST_Response( $results );
    return $response;
}

function bestbooks_api_credit(WP_REST_Request $request) {
    require dirname(__FILE__).'/vendor/autoload.php';

    bestbooks_authenticate_user();

    $results = array();
    
    if (isset($request['name'])) {
        try {
            $coa = new ChartOfAccounts();
            $coaList = $coa->getList();
            $account = new $coaList[$request['name']]($request['name']);
            if (isset($request['date']) && isset($request['desc']) && isset($request['amount'])) {
                $results = $account->addCredit($request['date'],$request['desc'],$request['amount']);
            } else {
                $results = $account->getCredit();
            }
        } catch (Exception $ex) {
            $results = $ex;
        }
    } else {
        $results = new BestBooksException('missing account name');
    }

    $response = new WP_REST_Response( $results );
    return $response;
}

function bestbooks_api_balance(WP_REST_Request $request) {
    require_once dirname(__FILE__).'/vendor/autoload.php';

    bestbooks_authenticate_user();

    $results = array();
    
    if (isset($request['name'])) {
        try {
            $coa = new ChartOfAccounts();
            $coaList = $coa->getList();
            $account = new $coaList[$request['name']]($request['name']);
            if (isset($request['balance'])) {
                $results = $account->setBalance($request['balance']);
            } else {
                $results = $account->getBalance();
            }
        } catch (Exception $ex) {
            $results = $ex;
        }
    } else {
        $results = new BestBooksException('missing account name');
    }

    $response = new WP_REST_Response( $results );
    return $response;
}
/**
 * Asset & Expense INCREASE on debit
 * Libaility, Equity & Revenue INCREASE on credit
 */
function bestbooks_api_add(WP_REST_Request $request) {
    require_once dirname(__FILE__).'/vendor/autoload.php';

    bestbooks_authenticate_user();

    $results = array();
    
    if (isset($request['name'])) {
        if (isset($request['date']) && isset($request['desc']) && isset($request['amount'])) {
            $coa = new ChartOfAccounts();
            $coaList = $coa->getList();
            $account = new $coaList[$request['name']]($request['name']);
            $results = $account->increase($request['date'],$request['desc'],$request['amount']);
        } else {
            $results = new BestBooksException('missing parameters');
        }
    } else {
        $results = new BestBooksException('missing account name');
    }
    
    $response = new WP_REST_Response( $results );
    return $response;
}

/**
 * Asset & Expense DECREASE on credit
 * Libaility, Equity & Revenue DECREASE on debit
 */
function bestbooks_api_subtract(WP_REST_Request $request) {
    require_once dirname(__FILE__).'/vendor/autoload.php';

    bestbooks_authenticate_user();

    $results = array();
    
    if (isset($request['name'])) {
        if (isset($request['date']) && isset($request['desc']) && isset($request['amount'])) {
            $coa = new ChartOfAccounts();
            $coaList = $coa->getList();
            $account = new $coaList[$request['name']]($request['name']);
            $results = $account->decrease($request['date'],$request['desc'],$request['amount']);
        } else {
            $results = new BestBooksException('missing parameters');
        }
    } else {
        $results = new BestBooksException('missing account name');
    }
    
    $response = new WP_REST_Response( $results );
    return $response;
}

function bestbooks_api_headers(WP_REST_Request $request) {
    bestbooks_authenticate_user();

    $results = array(__FILE__=>__METHOD__);
    
    $results[] = apache_request_headers();
    $results[] = $request['username'];
    
    $response = new WP_REST_Response( $results );
    return $response;
}
/*
function authenticate() {
    if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Digest realm="Restricted Area",qop="auth",nonce="'.uniqid().'",opaque="'.md5('Restricted Area').'"');
        return false;
    }

    // analyze the PHP_AUTH_DIGEST variable
    //$_SERVER['PHP_AUTH_DIGEST'])) ||
    
    
    
    
}

// function to parse the http auth header
function http_digest_parse($txt)
{
    // protect against missing data
    $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $data = array();
    $keys = implode('|', array_keys($needed_parts));

    preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

    foreach ($matches as $m) {
        $data[$m[1]] = $m[3] ? $m[3] : $m[4];
        unset($needed_parts[$m[1]]);
    }

    return $needed_parts ? false : $data;
}
*/
?>