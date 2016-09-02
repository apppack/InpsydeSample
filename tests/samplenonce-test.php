<?php 

$WP_ROOT = "C:\Program Files (x86)\Ampps\www\inpsydesample";
require( $WP_ROOT . '/wp-blog-header.php' );

require_once dirname( __FILE__ ) . '/../samplenonce.php';



class NonceTest extends PHPUnit_Framework_TestCase {

public function testWpCreateNonce() {

$InpCreateNonce = new  CreateNonce();
echo $InpCreateNonce -> create_nonce();

}
}
