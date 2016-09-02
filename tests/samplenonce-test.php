<?php 



class NonceTest extends PHPUnit_Framework_TestCase {

public function testWpCreateNonce() {

$InpCreateNonce = new  CreateNonce();
echo $InpCreateNonce -> create_nonce();

}
}
