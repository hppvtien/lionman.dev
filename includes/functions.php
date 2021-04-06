<?php
include_once('config.php');

/* build cUrl to API */
function request_post_api($url="",$post="") {
	if(empty($url))
		return false;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	if($post){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));    		
	}
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	return $response;
}

/* counter landing visit number */
function landing_visit_counter($_url_params) {
	$_url_params['key'] = _KEY;
	$_url_params['landing'] = _LANDING_URL;

    $_landing = request_post_api(_VISIT_COUNT_URL,$_url_params);
    return $_landing;
}
?>