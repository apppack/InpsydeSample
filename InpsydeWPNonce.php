<?php

/*
Plugin Name: InpsydeWPNonce
Plugin URI: https://github.com/hemangvyas/inpsydewpnonce
Description: This plugin was developed for Inpsyde as an assignment.
Author: Hemang Vyas
Version: 0.0.1
*/

abstract class AbsInpNonces {
	
    protected $action;

    
    function __construct( $action ) {
        $this->action = ( $action == NUll ) ? 'Inpsyde_nonce_action' : $action;
    }

    public function getAction() {
        return $this->action;
    }
    
    	abstract function InpNonceAys ();
    	
	abstract function InpCreateNonce ();
	
	abstract function InpVerifyNonce ();
	
}

class InpNonces extends AbsInpNonces {
	
	/**
	 * [wp_nonce_ays description]
	 * @param  String $action The nonce action.
	 */
	public function InpNonceAys () {
		
		return wp_nonce_ays( $this -> action );
	
	}
	
	/**
	 * Generates and returns a nonce. The nonce is generated based on the current time, the $action argument, and the current user ID.
	 * @param  Integer $action Action name. Default: -1.
	 * @return String          The one use form token.
	 * see https://developer.wordpress.org/reference/functions/wp_create_nonce/
	 */
	 
	public function InpCreateNonce() {
	
		return wp_create_nonce ($this -> action);
	
	}
	
	/**
	 * Verify that a nonce is correct and unexpired with the respect to a specified action.
	 * @param  String $nonce   Nonce to verify.
	 * @param  Integer $action Action name. Default: -1.
	 * @return Boolean/Integer False if the nonce is invalid, 1 – if the nonce has been generated in the past 12 hours or less., 2 – if the nonce was generated between 12 and 24 hours ago.
	 * see https://developer.wordpress.org/reference/functions/wp_verify_nonce/
	 */
	 
	public function InpVerifyNonce() {
		$nonce = 'inpsyde_nonce';
		return wp_verify_nonce($nonce,$this -> action);
		
	}
	
}

