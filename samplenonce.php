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
        if (empty($action)) {
    $action = 'inpsyde_action';
} else {
    $action = -1;
}
    }
    
    public function getAction()
    {
        return $this->action;
    }

	public function InpCreateNonce() {
	
		return wp_create_nonce($this -> action);
		
	}
}

class InpNonces extends AbsInpNonces {
	
	public function InpCreateNonce() {
	
	return wp_create_nonce($this -> action);
	
	}
	
}

