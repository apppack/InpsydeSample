<?php

/*
Plugin Name: InpsydeWPNonce
Plugin URI: https://github.com/hemangvyas/inpsydewpnonce
Description: This plugin was developed for Inpsyde as an assignment.
Author: Hemang Vyas
Version: 0.0.1
*/

abstract class AbsInpNonces {

	public function InpCreateNonce() {
	
		return wp_create_nonce($action);
		
	}
}

class InpNonces extends AbsInpNonces {
	
	public function InpCreateNonce() {
	
	}
	
}

