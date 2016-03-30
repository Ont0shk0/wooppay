<?php
/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Igor Borodikhin <iborodikhin@gmail.com>
 * @license MIT
 */
namespace Wooppay\Test;

/**
 * Tests request confirmation code.
 */
class TestRequestConfirmationCode extends Base
{
    /**
     * Test request confirmation code.
     *
     * @dataProvider provideTestRequestConfirmationCode
     * @param string  $phone
     * @param boolean $expected
     */
    public function testRequestConfirmationCode($phone, $expected)
    {
        $this->getClient()->login(getenv('soap_auth_username'), getenv('soap_auth_password'));

        $actual = $this->getClient()->requestConfirmationCode($phone);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Data-provider for request confirmation code test.
     *
     * @return array
     */
    public function provideTestRequestConfirmationCode()
    {
        $str = str_shuffle(implode('', range(0, 999)));

        return [
            [getenv('valid_phone_number'), true],
//            [$this->getRandNumber(12), false],
//            [$this->getRandNumber(10), false],
//            [$this->getRandNumber(9), false],
//            [$this->getRandNumber(8), false],
//            [$this->getRandNumber(7), false],
//            [$this->getRandNumber(6), false],
//            [$this->getRandNumber(5), false],
//            [$this->getRandNumber(4), false],
//            [$this->getRandNumber(3), false],
//            [$this->getRandNumber(2), false],
//            [$this->getRandNumber(1), false],
//            ['', false],
        ];
    }
}
