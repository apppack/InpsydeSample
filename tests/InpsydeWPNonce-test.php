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
$InpNonces = new  InpNonces($this -> action);

\WP_Mock::wpFunction( 'wp_create_nonce', array(
				'times'  => 1,
				'return' => $nonce
			) );

$this->assertEquals( 
	$nonce,
	$InpNonces ->  InpCreateNonce($this -> action) 
	);
}


/*
 * TESTS for wp_create_nonce()
 *
 */
 
public function testWpVerifyNonce() {
$nonce = 'inp_nonce';
$InpNonces = new  InpNonces($this -> action);

\WP_Mock::wpFunction( 'wp_verify_nonce', array(
				'times'  => 1,
				'return' => $nonce
			) );

$this->assertEquals( 
	$nonce,
	$InpNonces ->  InpVerifyNonce($this -> action) 
	);
}


}
