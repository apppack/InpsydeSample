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
	
	abstract protected function InpNonceUrl ($actionurl, $name);
	
	abstract protected function InpCheckAdmin ($query_arg);
	
	abstract protected function InpAjaxReferer ($query_arg);
	
	abstract protected function InpRefererField ( $echo );
	
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
	 * see https://developer.wordpress.org/reference/functions/wp_verify_nonce/
	 */
	 
	 public function InpVerifyNonce($nonce='inpsyde_nonce') {
	
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

	/**
	 * Retrieve URL with nonce added to URL query.
	 * @param  String $actionurl URL to add nonce action.
	 * @param  String $action    Nonce action name Default: -1.
	 * @param  String $name      Nonce name. Default: '_wpnonce'.
	 * @return String            URL with nonce action added.
	 * see https://codex.wordpress.org/Function_Reference/wp_nonce_url
	 */
	
	public function InpNonceUrl( $actionurl, $action, $name = '_inpnonce') {
		
		return wp_nonce_url($actionurl, $this -> action, $name);

	}
	
	/**
	 * Tests either if the current request carries a valid nonce
	 * @param  String $action    Action name. Optional but recommended. Default value: -1.
	 * @param  String $query_arg Nonce name. Default: '_wpnonce'.
	 * @return Boolean            Either true or false.
	 * see https://codex.wordpress.org/Function_Reference/check_admin_referer
	 */
	 
	 public function InpCheckAdmin( $action, $query_arg = '_inpnonce' ) {
		
		return check_admin_referer($this -> action, $query_arg);
		
	 }
	 
	 /**
	 * Verifies the AJAX request to prevent processing requests external of the blog.
	 * @param  String  $action    Action nonce. Default: -1.
	 * @param  String  $query_arg Where to look for nonce in $_REQUEST. Default: false.
	 * @param  Boolean $die       whether to die if the nonce is invalid. Default: true.
	 * @return Boolean            If parameter $die is set to false this function will return a boolean of true if check passes or false if check fails.
	 * see https://codex.wordpress.org/Function_Reference/check_admin_referer
	 */
	 
	 public function InpAjaxReferer( $query_arg ) {
		
		return check_ajax_referer($this -> action, $query_arg, $die = true);
		
	 }
	 
	 /**
	 * Retrieves or displays the referer hidden form field.
	 * @param  boolean $echo Whether to display or return the referer hidden form field. Default: true.
	 * @return String        Referer field.
	 * see https://codex.wordpress.org/Function_Reference/wp_referer_field
	 */
	 
	 public function InpRefererField( $echo ) {
		
		return check_ajax_referer($echo = true);
		
	 }
}

