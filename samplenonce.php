<?php

/*
Plugin Name: InpsydeWPNonce
Plugin URI: https://github.com/hemangvyas/inpsydewpnonce
Description: This plugin was developed for Inpsyde as an assignment.
Author: Hemang Vyas
Version: 0.0.1
*/




abstract class AbsCreateNonce {

	public function create_nonce() {
	
		$CreateNonce = $this -> wp_create_nonce($action = -1);
		
		return $CreateNonce;
		
	}
}

class InpCreateNonce extends AbsCreateNonce {
	
	public function CreateNonce() {
	
	}
	
}

