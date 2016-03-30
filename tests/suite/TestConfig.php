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
 * Tests configuration prepared for phpunit.
 */
class TestConfig extends Base
{
    /**
     * Test config parameters.
     *
     * @dataProvider provideTestConfig
     * @param string $varName
     */
    public function testConfig($varName)
    {
        $this->assertNotEmpty(
            getenv($varName),
            sprintf('phpunit.xml should contain non-empty "%s"', $varName)
        );
    }

    /**
     * Data-provider for config test.
     *
     * @return array
     */
    public function provideTestConfig()
    {
        return [
            ['basic_auth_username'],
            ['basic_auth_password'],
            ['soap_auth_username'],
            ['soap_auth_password'],
            ['soap_wsdl_uri'],
            ['valid_phone_number'],
        ];
    }
}
