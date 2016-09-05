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
 * TESTS for wp_create_nonce()
 *
 */
 
public function testWpCreateNonce() {
$action = 'inpsyde_nonce_action';
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
$action = 'inpsyde_nonce_action';
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
$action = 'inpsyde_nonce_action';
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
$action = 'inpsyde_nonce_action';
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
$action = 'inpsyde_nonce_action';
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
$action = 'inpsyde_nonce_action';
$query_arg = '_inpnonce';
$die = 'true';
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

}
