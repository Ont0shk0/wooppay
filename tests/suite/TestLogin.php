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
 * Tests login operations.
 */
class TestLogin extends Base
{
    /**
     * Positive login test.
     */
    public function testLoginPositive()
    {
        $result = $this->getClient()->login(getenv('soap_auth_username'), getenv('soap_auth_password'));

        $this->assertInstanceOf('\Wooppay\Objects\Response\Login', $result);
    }

    /**
     * Negative login test.
     *
     * @dataProvider providerTestLoginNegative
     * @expectedException \Wooppay\Objects\Exceptions\UnsuccessfulResponse
     * @param mixed $login
     * @param mixed $password
     */
    public function testLoginNegative($login, $password)
    {
        call_user_func([$this->getClient(), 'login'], $login, $password);
    }

    /**
     * Data-provider for negative login test.
     *
     * @return array
     */
    public function providerTestLoginNegative()
    {
        return [
            [getenv('soap_auth_username'), 'incorrect-password'],
            [getenv('soap_auth_username'), ''],
            [getenv('soap_auth_username'), null],
            ['incorrect-login', getenv('soap_auth_password')],
            ['', getenv('soap_auth_password')],
            [null, getenv('soap_auth_password')],
        ];
    }
}
