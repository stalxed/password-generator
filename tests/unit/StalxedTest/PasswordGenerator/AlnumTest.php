<?php
namespace StalxedTest\PasswordGenerator;

use Stalxed\PasswordGenerator\Alnum;
use Stalxed\System\Random;

class AlnumTest extends \PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        Random::setDefaultRandomFunction();

        parent::tearDown();
    }

    public function testGenerate_WithoutArguments()
    {
        $list = array(0, 1, 2, 3, 4, 5, 6, 7);
        Random::setCallbackRandomFunction(
            function ($minDigit, $maxDigit) use (&$list) {
                return array_shift($list);
            }
        );

        $alnum = new Alnum();
        $alnum->generate();

        $this->assertEquals('abcdefgh', $alnum->get());
    }

    public function testGenerate_FiveCharacters()
    {
        $list = array(0, 1, 2, 3, 4);
        Random::setCallbackRandomFunction(
            function ($minDigit, $maxDigit) use (&$list) {
                return array_shift($list);
            }
        );

        $alnum = new Alnum();
        $alnum->generate(5);

        $this->assertEquals('abcde', $alnum->get());
    }

    public function testGenerateAndGet_WithoutArguments()
    {
        $list = array(0, 1, 2, 3, 4, 5, 6, 7);
        Random::setCallbackRandomFunction(
            function ($minDigit, $maxDigit) use (&$list) {
                return array_shift($list);
            }
        );

        $alnum = new Alnum();

        $this->assertEquals('abcdefgh', $alnum->generateAndGet());
    }

    public function testGenerateAndGet_FiveCharacters()
    {
        $list = array(0, 1, 2, 3, 4);
        Random::setCallbackRandomFunction(
            function ($minDigit, $maxDigit) use (&$list) {
                return array_shift($list);
            }
        );

        $alnum = new Alnum();

        $this->assertEquals('abcde', $alnum->generateAndGet(5));
    }
}
