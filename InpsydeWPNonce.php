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
    protected $nonce;	
    protected $name;
    protected $referer;
    protected $echo;
    
    function __construct( $action ) {
        $this->action = ( $action == NUll ) ? 'Inpsyde_nonce_action' : $action;
    }

    public function getAction() {
        return $this->action;
    }
    
    
        // the inheritance class must define these methods

    	abstract protected function InpNonceAys ($action);
    	
	abstract protected function InpCreateNonce ($action);
	
	abstract protected function InpVerifyNonce ($nonce);
	
	abstract protected function InpNonceField ($action, $name, $referer, $echo);
	
}

class InpNonces extends AbsInpNonces {
	
	/**
	 * [wp_nonce_ays description]
	 * @param  String $action The nonce action.
	 */
	public function InpNonceAys ($action) {
		
		return wp_nonce_ays( $this -> action );
	
	}
	
	/**
	 * Generates and returns a nonce. The nonce is generated based on the current time, the $action argument, and the current user ID.
	 * @param  Integer $action Action name. Default: -1.
	 * @return String          The one use form token.
	 * see https://developer.wordpress.org/reference/functions/wp_create_nonce/
	 */
	
	public function InpCreateNonce ($action) {
		
		return wp_create_nonce( $this -> action );
	
	}
	
	/**
	 * Verify that a nonce is correct and unexpired with the respect to a specified action.
	 * @param  String $nonce   Nonce to verify.
	 * @param  String $action  Action name. Default: -1.
	 * @return Boolean/Integer False if the nonce is invalid, 1 – if the nonce has been generated in the past 12 hours or less., 2 – if the nonce was generated between 12 and 24 hours ago.
	 * see https://developer.wordpress.org/reference/functions/wp_create_nonce/
	 */
	 
	 public function InpVerifyNonce($action) {
	
		$nonce = 'inpsyde_nonce';
		return wp_verify_nonce($nonce, $this -> action);
	
	}
	
	/**
	 * Retrieves or displays the nonce hidden form field.
	 * @param  String  $action  Action name. Optional but recommended. Default value: -1.
	 * @param  String  $name    Nonce name. Default: '_wpnonce'.
	 * @param  Boolean $referer Whether also the referer hidden form field should be created with the wp_referer_field() function. Default: true.
	 * @param  Boolean $echo    Whether to display or return the nonce hidden form field, and also the referer hidden form field if the $referer argument is set to true. Default: true.
	 * @return String           The nonce hidden form field, optionally followed by the referer hidden form field if the $referer argument is set to true.
	 * see https://developer.wordpress.org/reference/functions/wp_nonce_field/
	 */
	 
	public function InpNonceField( $action, $name = '_inpnonce', $referer = true, $echo = false) {
		
		return wp_nonce_field($this -> action, $name, $referer, $echo);

	}

	
	
}

