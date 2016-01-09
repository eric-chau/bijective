<?php

use Jarvis\Math\Bijective;

/**
 * @author Eric Chau <eriic.chau@gmail.com>
 * @author Mickaël Andrieu <andrieu.travail@gmail.com>
 */
class BijectiveTest extends \PHPUnit_Framework_TestCase
{
    public function testAlphabetSetter()
    {
        $bijective = new Bijective();

        $this->assertSame(Bijective::ALPHABET, $bijective->alphabet());

        $alphabet = 'azerty';
        $bijective = new Bijective($alphabet);

        $this->assertSame($alphabet, $bijective->alphabet());
    }

    public function testEncodeZero()
    {
        $bijective = new Bijective();

        $alphabet = $bijective->alphabet();
        $this->assertSame($alphabet[0], $bijective->encode(0));
    }

    public function testEncodeDecode()
    {
        $bijective = new Bijective();

        for ($i = 0; $i < 100; $i++) {
            $int = rand();

            $str = $bijective->encode($int);

            $this->assertNotSame($int, $str);
            $this->assertSame($int, $bijective->decode($bijective->encode($int)));
        }
    }

    public function testChangeAlphabet()
    {
        $alphabet = '$!?:';
        $bijective = new Bijective($alphabet);

        for ($i = 0; $i < strlen($alphabet); $i++) {
            $this->assertSame($alphabet[$i], $bijective->encode($i));
        }
    }

    /**
     * @expectedException        \LogicException
     * @expectedExceptionMessage '!' is not supported by bijective with alphabet 'azerty'.
     */
    public function testDecodeInvalidString()
    {
        $bijective = new Bijective('azerty');

        $bijective->decode('!!');
    }

    /**
     * @expectedException        \LogicException
     * @expectedExceptionMessage Must not use 'a' as first char cause it is the
     *                           zero value in current bijective's alphabet (azerty).
     */
    public function testDecodeInvalidStringFirstChar()
    {
        $bijective = new Bijective('azerty');

        $bijective->decode('azerty');
    }
}
