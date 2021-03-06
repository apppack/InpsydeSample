<?php 

/*
 * TESTS FOR InpsydeWPNonce
 *
 */

class InpNonceTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
		\WP_Mock::setUp();
	}
	public function tearDown() {
		\WP_Mock::tearDown();
	}

/*
 * TESTS for wp_nonce_ays()
 *
 */
 
public function testWpNonceAys() {
$action = 'Inpsyde_nonce_action';
$nonce_explain = 'Are you sure you want to do this?';
$InpNonces = new  InpNonces($action);

\WP_Mock::wpFunction( 'wp_nonce_ays', array(
				'times'  => 1,
				'args'	 => array ($InpNonces -> getAction()),
				'return' => $nonce_explain
			) );

$this->assertEquals( 
	$nonce_explain,
	$InpNonces ->  InpNonceAys($action) 
	);
}
	
/*
 * TESTS for wp_create_nonce()
 *
 */
 
public function testWpCreateNonce() {
$action = 'Inpsyde_nonce_action';
$nonce = 'inpsyde_nonce';
$InpNonces = new  InpNonces($action);

\WP_Mock::wpFunction( 'wp_create_nonce', array(
				'times'  => 1,
				'return' => $nonce
			) );

$this->assertEquals( 
	$nonce,
	$InpNonces ->  InpCreateNonce($action) 
	);
}


/*
 * TESTS for wp_verify_nonce()
 *
 */
 
public function testWpVerifyNonce() {
$action = 'Inpsyde_nonce_action';
$nonce = 'inpsyde_test_nonce';
$InpNonces = new  InpNonces($nonce);

\WP_Mock::wpFunction( 'wp_verify_nonce', array(
				'times'  => 2,
				'return' => $nonce
			) );

$this->assertEquals( 
	$nonce,
	$InpNonces ->  InpVerifyNonce($nonce) 
	);
	
$this->assertNotEquals( 
	$nonce,
	$InpNonces ->  InpVerifyNonce( $nonce ) .'failed' 
	);
}


/*
 * TESTS for wp_nonce_field()
 *
 */
 
public function testWpNonceField() {
$action = 'Inpsyde_nonce_action';
$name = '_inpnonce';
$referer = true;
$echo = true;
$InpNonces = new  InpNonces($name);
$nonce_field = '<input type="hidden" id="' . $name . '" name="' . $name . '" value="'.$InpNonces -> getAction().'" />';
\WP_Mock::wpFunction( 'wp_nonce_field', array(
				'times'  => 1,
				'args' => array($InpNonces -> getAction(), $name, true, false),
				'return' => $nonce_field
			) );

$this->assertEquals( 
	$nonce_field,
	$InpNonces ->  InpNonceField($name) 
	);

}

/*
 * TESTS for wp_nonce_url()
 *
 */
 
public function testWpNonceUrl() {
$action = 'Inpsyde_nonce_action';
$actionurl = 'http://www.inpsyde.com';
$name = '_inpnonce';
$InpWPUrl = array ($actionurl, $action, $name);
$InpNonces = new  InpNonces($action);

\WP_Mock::wpFunction( 'wp_nonce_url', array(
				'times'  => 1,
				'arg'	 => array($actionurl, $action, $name),
				'return' => $InpWPUrl
			) );

$this->assertEquals( 
	$InpWPUrl,
	$InpNonces ->  InpNonceUrl($actionurl, $action, $name) 
	);
}

/*
 * TESTS for check_admin_referer()
 *
 */
 
public function testWPCheckAdmin() {
$action = 'Inpsyde_nonce_action';
$query_arg = '_inpnonce';
$InpNonces = new  InpNonces($action);

\WP_Mock::wpFunction( 'check_admin_referer', array(
				'times'  => 1,
				'arg'	 => array ($action, $query_arg),
				'return' => true
			) );

$this->assertTrue( 
	$InpNonces ->  InpCheckAdmin($action, $query_arg) 
	);
}

/*
 * TESTS for check_ajax_referer()
 *
 */
 
public function testWPCheckAjax() {
$action = 'Inpsyde_nonce_action';
$query_arg = '_inpnonce';
$die = true;
$InpNonces = new  InpNonces($action);

\WP_Mock::wpFunction( 'check_ajax_referer', array(
				'times'  => 1,
				'arg'	 => array($action, $query_arg, $die),
				'return' => true
			) );

$this->assertTrue( 
	$InpNonces ->  InpAjaxReferer($action, $query_arg, $die) 
	);
}

/*
 * TESTS for wp_referer_field()
 *
 */
 
public function testWPRefererField() {
$echo = true;
$referer_field = '<input type="hidden" name="_wp_http_referer" value="" />';
$InpNonces = new  InpNonces($echo);
\WP_Mock::wpFunction( 'wp_referer_field', array(
				'times'  => 1,
				'arg'	 => array($echo = true),
				'return' => $referer_field
			) );

$this->assertEquals( 
	$referer_field,
	$InpNonces ->  InpRefererField($echo) 
	);
}

}
