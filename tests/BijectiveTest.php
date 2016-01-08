<?php

namespace Jarvis\Math\Tests;

use Jarvis\Math\Bijective;

/**
 * @author Mickaël Andrieu <andrieu.travail@gmail.com>
 */
class BijectiveTest extends \PHPUnit_Framework_TestCase
{
    private $bijective;

    protected function setUp()
    {
        $this->bijective = new Bijective();
    }

    protected function tearDown()
    {
        unset($this->bijective);
    }

    public function testEncodeWithValueZero()
    {
        $this->assertSame("a", $this->bijective->encode(0));
    }

    public function testEncode()
    {
        $this->assertSame("abc", $this->bijective->encode(64));
    }

    public function testDecode()
    {
        $this->assertSame(64, $this->bijective->decode("abc"));
        $this->assertSame(0, $this->bijective->decode("a"));
    }
}

