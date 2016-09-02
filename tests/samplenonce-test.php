<?php 



class NonceTest extends PHPUnit_Framework_TestCase {

public function testWpCreateNonce() {

$InpCreateNonce = new  InpCreateNonce();
$this->assertNotNull( $InpCreateNonce );
}
}
