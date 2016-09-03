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
public function testWpCreateNonce() {
$action = 'my_new_action';
$nonce = 'inp_nonce';

$InpNonces = new  InpNonces($action);

\WP_Mock::wpFunction( 'wp_create_nonce', array(
				'times'  => 1,
				'return' => $nonce
			) );

$this->assertEquals( 
	$nonce,
	$InpNonces ->  InpCreateNonce() 
	);
}
}
