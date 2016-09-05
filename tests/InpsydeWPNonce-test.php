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
	
$nonce = 'inp_nonce';
$action = 'inpsyde_test_action';
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
$nonce = 'inpsyde_test_nonce';
$InpNonces = new  InpNonces($nonce, $action);

\WP_Mock::wpFunction( 'wp_verify_nonce', array(
				'times'  => 1,
				'return' => $nonce
			) );

$this->assertEquals( 
	$nonce,
	$InpNonces ->  InpVerifyNonce($nonce) 
	);

$this->assertnotEquals( 
	$nonce,
	$InpNonces -> InpVerifyNonce($nonce.'failed')
	);
}


}
