<?php

/*
Plugin Name: InpsydeWPNonce
Plugin URI: https://github.com/hemangvyas/inpsydewpnonce
Description: This plugin was developed for Inpsyde as an assignment.
Author: Hemang Vyas
Version: 0.0.1
*/

abstract class AbsInpNonces {
	
    private $action;
    function __construct( $action ) {
        $this->action = ( $action == NUll ) ? 'inpsyde_action' : $action;
    }
    /**
     * Get the private action var
     *
     * @return String $action
     **/
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
	
	}
	
}

