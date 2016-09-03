<?php

/*
Plugin Name: InpsydeWPNonce
Plugin URI: https://github.com/hemangvyas/inpsydewpnonce
Description: This plugin was developed for Inpsyde as an assignment.
Author: Hemang Vyas
Version: 0.0.1
*/

abstract class AbsInpNonces {
	
    public $action;
    public $nonce;
    
    function __construct( $action ) {
        if (empty($action)) {
    $action = 'inpsyde_action';
} else {
    $action = '-1';
}
    }
    
    public function getAction()
    {
        return $this->action;
    }
   
}

class InpNonces extends AbsInpNonces {
	
	/**
	 * Generates and returns a nonce. The nonce is generated based on the current time, the $action argument, and the current user ID.
	 * @param  Integer $action Action name. Default: -1.
	 * @return String          The one use form token.
	 * see https://developer.wordpress.org/reference/functions/wp_create_nonce/
	 */
	 
	public function InpCreateNonce() {
	
	return wp_create_nonce($action);
	
	}
	
	/**
	 * Verify that a nonce is correct and unexpired with the respect to a specified action.
	 * @param  String $nonce   Nonce to verify.
	 * @param  Integer $action Action name. Default: -1.
	 * @return Boolean/Integer False if the nonce is invalid, 1 – if the nonce has been generated in the past 12 hours or less., 2 – if the nonce was generated between 12 and 24 hours ago.
	 * see https://developer.wordpress.org/reference/functions/wp_verify_nonce/
	 */
	 
	public function InpVerifyNonce($nonce) {
	
		return wp_verify_nonce($nonce,$action);
		
	}
	
}

