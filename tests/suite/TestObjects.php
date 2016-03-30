<?php
/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Igor Borodikhin <iborodikhin@gmail.com>
 * @license MIT
 */
namespace Wooppay\Test;

use Wooppay\Objects\Request;
use Wooppay\Objects\Response;

/**
 * Tests object methods.
 */
class TestObjects extends Base
{
    /**
     * Test get- and set- methods.
     *
     * @dataProvider provideTestGetSet
     * @param object $object
     * @param string $value
     */
    public function testGetSet($object, $value)
    {
        $reflection = new \ReflectionClass($object);
        $properties = $reflection->getProperties();

        foreach ($properties as $property) {
            $getter = 'get' . ucfirst($property->getName());
            $setter = 'set' . ucfirst($property->getName());

            $this->assertInstanceOf(get_class($object), call_user_func([$object, $setter], $value));
            $this->assertEquals($value, call_user_func([$object, $getter]));
        }
    }

    /**
     * Test factory methods.
     *
     * @dataProvider providerTestFactory
     * @param string    $className
     * @param \stdClass $response
     */
    public function testFactory($className, \stdClass $response)
    {
        $this->assertInstanceOf($className, call_user_func([$className, 'factory'], $response));
    }

    /**
     * Test factory method for GetOperationData response.
     */
    public function testFactoryGetOperationData()
    {
        $response             = new \stdClass();
        $response->error_code = Response\Base::ERROR_CODE_NONE;
        $response->response   = [];

        $responseItem               = new \stdClass();
        $responseItem->id           = $this->getRandNumber(10);
        $responseItem->type         = $this->getRandNumber(10);
        $responseItem->lotId        = $this->getRandNumber(10);
        $responseItem->sum          = $this->getRandNumber(10);
        $responseItem->date         = $this->getRandNumber(10);
        $responseItem->status       = $this->getRandNumber(10);
        $responseItem->comment      = $this->getRandNumber(10);
        $responseItem->fromSubject  = $this->getRandNumber(10);
        $responseItem->toSubject    = $this->getRandNumber(10);
        $responseItem->fromFullName = $this->getRandNumber(10);
        $responseItem->toFullName   = $this->getRandNumber(10);
        $response->response[]       = $responseItem;

        $actual = \Wooppay\Objects\Response\GetOperationData::factory($response);

        $this->assertInternalType('array', $actual);
        $this->assertEquals(count($response->response), count($actual));

        foreach ($actual as $item) {
            $this->assertInstanceOf('\Wooppay\Objects\Response\GetOperationData', $item);
        }
    }

    /**
     * Data-provider for test get- and set- methods.
     *
     * @return array
     */
    public function provideTestGetSet()
    {
        return [
            // Request objects
            [new Request\CreateInvoiceExtended(), $this->getRandNumber(10)],
            [new Request\GetOperationData(), $this->getRandNumber(10)],
            [new Request\Login(), $this->getRandNumber(10)],
            [new Request\RequestConfirmationCode(), $this->getRandNumber(10)],
            // Response objects
            [new Response\CreateInvoiceExtended(), $this->getRandNumber(10)],
            [new Response\GetOperationData(), $this->getRandNumber(10)],
            [new Response\Login(), $this->getRandNumber(10)],
        ];
    }

    /**
     * Data-provider for test factory methods.
     *
     * @return array
     */
    public function providerTestFactory()
    {
        $result = [];

        $response                         = new \stdClass();
        $response->error_code             = Response\Base::ERROR_CODE_NONE;
        $response->response->operationId  = $this->getRandNumber(10);
        $response->response->operationUrl = $this->getRandNumber(10);

        $result[] = ['\Wooppay\Objects\Response\CreateInvoiceExtended', $response];

        return $result;
    }
}
