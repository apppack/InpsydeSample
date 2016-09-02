<?php 

require_once dirname( __FILE__ ) . '/../samplenonce.php';


class NonceTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		\WP_Mock::setUp();
		require_once dirname( __FILE__ ) . '/../samplenonce.php';
	}
	public function tearDown() {
		\WP_Mock::tearDown();
	}
public function testWpCreateNonce() {

$InpCreateNonce = new  InpCreateNonce();

\WP_Mock::wpFunction( 'wp_create_nonce', array(
				'times'  => 1,
				'return' => $InpCreateNonce
			) );

$this->assertNotNull( $InpCreateNonce );
}
}
