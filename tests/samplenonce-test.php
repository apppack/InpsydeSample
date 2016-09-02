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
$nonce = '34653456f';

$InpCreateNonce = new  InpCreateNonce($nonce);

\WP_Mock::wpFunction( 'wp_create_nonce', array(
				'times'  => 1,
				'return' => $nonce
			) );

$this->assertNotNull( $InpCreateNonce );
}
}
