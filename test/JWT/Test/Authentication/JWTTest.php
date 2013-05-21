<?php

namespace JWT\Test\Authentication;

use JWT\Authentication\JWT;

class JWTTest extends \PHPUnit_Framework_TestCase
{
	function testEncodeDecode()
    {
		$msg = JWT::encode('abc', 'my_key');
		$this->assertEquals(JWT::decode($msg, 'my_key'), 'abc');
	}

	function testDecodeFromPython()
    {
		$msg = 'eyJhbGciOiAiSFMyNTYiLCAidHlwIjogIkpXVCJ9.Iio6aHR0cDovL2FwcGxpY2F0aW9uL2NsaWNreT9ibGFoPTEuMjMmZi5vbz00NTYgQUMwMDAgMTIzIg.E_U8X2YpMT5K1cEiT_3-IvBYfrdIFIeVYeOqre_Z5Cg';
		$this->assertEquals(
			JWT::decode($msg, 'my_key'),
			'*:http://application/clicky?blah=1.23&f.oo=456 AC000 123'
		);
	}

	function testUrlSafeCharacters()
    {
		$encoded = JWT::encode('f?', 'a');
		$this->assertEquals('f?', JWT::decode($encoded, 'a'));
	}

    /**
     * @expectedException \DomainException
     */
    function testMalformedUtf8StringsFail()
    {
        \PHPUnit_Framework_Error_Warning::$enabled = false;
		@JWT::encode(pack('c', 128), 'a');
	}

    /**
     * @expectedException \DomainException
     */
	function testMalformedJsonThrowsException()
    {
		JWT::jsonDecode('this is not valid JSON string');
	}
}
