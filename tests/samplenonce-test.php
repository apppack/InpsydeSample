<?php 



class NonceTest extends PHPUnit_Framework_TestCase {

public function testWpCreateNonce() {

$InpCreateNonce = new  CreateNonce();
$this->assertNotNull( $InpCreateNonce );
}
}
