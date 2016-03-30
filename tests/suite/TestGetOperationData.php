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
 * Tests get operation data.
 */
class TestGetOperationData extends Base
{
    /**
     * Positive test get operation data.
     */
    public function testGetOperationDataPositive()
    {
        $this->getClient()->login(getenv('soap_auth_username'), getenv('soap_auth_password'));

        $result = $this->getClient()->getOperationData([
            $this->getFaker()->randomNumber(2),
            $this->getFaker()->randomNumber(2),
        ]);

        $this->assertInternalType('array', $result);
    }

    /**
     * Negative test get operation data.
     *
     * @expectedException \Wooppay\Objects\Exceptions\BadCredentials
     */
    public function testGetOperationDataNegative()
    {
        $result = $this->getClient()->getOperationData([
            $this->getFaker()->randomNumber(2),
            $this->getFaker()->randomNumber(2),
        ]);
    }
}
