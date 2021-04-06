<?php  
print_r('sadasdas');die;
$_secure_content = true;

/* Param render footer js */
$_footer_js = '';

/* Parse url parameters to $_url_params */
parse_str($_SERVER['QUERY_STRING'], $_url_params);

/* Set cookie name for client browser */
$ukey = isset($_GET['ukey']) ? trim($_GET['ukey']) : '';
$cookie_name = str_replace('.', '_', _LANDING_URL) . $ukey;
if ($_POST) {
    if (
        isset($_POST['order_name']) && $_POST['order_name'] != '' &&
        isset($_POST['order_phone']) && $_POST['order_phone'] != ''
    ) {
        /*** process after form submit ***/
        $txt_order = ''; // to day orders text file.
        if (file_exists(dirname(__FILE__) . '/orders/' . date('d-m-Y', time()) . '.txt'))
            $txt_order = file_get_contents(dirname(__FILE__) . '/orders/' . date('d-m-Y', time()) . '.txt');

        $data = $_url_params;
        $data['key'] = _KEY;
        $data['landing'] = _LANDING_URL;
        $data['order_name'] = $_POST['order_name'];
        $data['order_phone'] = $_POST['order_phone'];
        $request = json_decode(request_post_api(_SAVE_ORDER_URL, $data), true);
        $directUrl = 'error.php';
        if ($request['success']) {
            $_success_string = implode('|', $request['order']);
            $_url_params[base64_encode('success')] = base64_encode($_success_string);
            $directUrl = 'success.php';
            $ads_name = $request['offer_name'];
            $tracking_id = $_REQUEST[$request['tracking_token']];

            /* Write order info to ./orders/.txt file */
            if (!preg_match("#phone\: " . $_REQUEST['order_phone'] . " \|#si", $txt_order) && $_REQUEST['order_phone']) {
                @file_put_contents(dirname(__FILE__) . '/orders/' . date('d-m-Y', time()) . '.txt', "name: " . $_REQUEST['order_name'] . " | phone: " . $_REQUEST['order_phone'] . " | ads_name:" . $ads_name . " | tracking_id: " . $tracking_id . "\n", FILE_APPEND);
            }
        } else {
            $_url_params['order_name'] = $_POST['order_name'];
            $_url_params['order_phone'] = $_POST['order_phone'];
            if ($request['error'])
                $_url_params['error'] = $request['error'];
        }

        header('Location: ' . $directUrl . '?' . http_build_query($_url_params));
        exit();
        /*** end form submit ***/
    } else {
        $_footer_js = '<script type="text/javascript">alert("Tên và số điện thoại : không được để trống");</script>';
    }
} else if (!isset($_COOKIE[$cookie_name])) {
    /* increase landing visit number */
    $_landing_stats = json_decode(landing_visit_counter($_url_params), true);

    /* Set cookie in 1 hour */
    if ($_landing_stats['offer_name']) {
        $cookie_name = $_landing_stats['landing_stats']['ukey'] ? 'ft_offer_name' . $_landing_stats['landing_stats']['ukey'] : 'ft_offer_name';
        setcookie($cookie_name, time() + 3600, '/');
        setcookie("ft_tracking_token", $_landing_stats['tracking_token'], time() + 3600, '/');
        setcookie("ft_offer_id", $_landing_stats['landing_stats']['offer'], time() + 3600, '/');
    }
}

?>