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
$action = 'inpsyde_test_action';
$nonce = 'inpsyde_test_nonce';
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
$action = 'inpsyde_test_action';
$nonce = 'inp_test_nonce';
$InpNonces = new  InpNonces($nonce, $action);

\WP_Mock::wpFunction( 'wp_verify_nonce', array(
				'times'  => 1,
				'return' => $nonce
			) );

$this->assertEquals( 
	$nonce,
	$InpNonces ->  InpVerifyNonce($nonce) 
	);
	
$this->assertNotEquals( 
	$nonce,
	$InpNonces ->  InpVerifyNonce($nonce .= _failed, $action) 
	);
}


/*
 * TESTS for wp_nonce_field()
 *
 */
 
public function testWpNonceField() {
$action = 'inpsyde_test_action';
$name = '_inpnonce';
$referer = true;
$echo = true;
$InpNonces = new  InpNonces($action, $name, $referer, $echo);
$nonce_field = '<input type="hidden" id="' . $name . '" name="' . $name . '" value="' . $action . '" />';
\WP_Mock::wpFunction( 'wp_verify_nonce', array(
				'times'  => 1,
				'return' => $nonce_field
			) );

$this->assertEquals( 
	$nonce_field,
	$InpNonces ->  InpNonceField($action, $name, $referer, $echo) 
	);

}

}
