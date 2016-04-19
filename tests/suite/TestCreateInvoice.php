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
 * Tests invoice creation.
 */
class TestCreateInvoice extends Base
{
    public function testCreateInvoice()
    {
        $this->getClient()->login(getenv('soap_auth_username'), getenv('soap_auth_password'));
        //$this->getClient()->requestConfirmationCode(getenv('valid_phone_number'));

        $orderId = $this->getRandNumber(10);
        $result  = $this->getClient()->createInvoiceExtended(
            $orderId,
            $this->getFaker()->url,
            $this->getFaker()->url,
            $this->getRandNumber(10),
            $this->getFaker()->randomNumber(4),
            null,
            2,
            $this->getFaker()->sentence(),
            $orderId,
            $this->getFaker()->email,
            getenv('valid_phone_number')
        );
        $this->assertInstanceOf('\Wooppay\Objects\Response\CreateInvoiceExtended', $result);
    }

    public function testCreateInvoiceByService()
    {
        $this->getClient()->login(getenv('soap_auth_username'), getenv('soap_auth_password'));
        //$this->getClient()->requestConfirmationCode(getenv('valid_phone_number'));

        $orderId = $this->getRandNumber(10);
        $result  = $this->getClient()->createInvoiceByService(
            $orderId,
            $this->getFaker()->url,
            $this->getFaker()->url,
            $this->getRandNumber(10),
            $this->getFaker()->randomNumber(4),
            null,
            2,
            $this->getFaker()->sentence(),
            $orderId,
            $this->getFaker()->email,
            getenv('valid_phone_number'),
            ''
        );
        $this->assertInstanceOf('\Wooppay\Objects\Response\CreateInvoiceExtended', $result);
    }
}
