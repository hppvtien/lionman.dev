<?php  
include_once('config.php');
include_once('functions.php');
$_secure_content = true;

/* Param render footer js */
$_footer_js = '';

/* Parse url parameters to $_url_params */
parse_str($_SERVER['QUERY_STRING'], $_url_params);

/* Set cookie name for client browser */
$_url_params['key'] = isset($_POST['ukey']) ? trim($_POST['ukey']) : '';
    /* increase landing visit number */
    // print_r($_url_params);
    $_landing_stats = json_decode(landing_visit_counter($_url_params), true);
?>