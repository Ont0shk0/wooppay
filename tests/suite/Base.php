<?php
/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Igor Borodikhin <iborodikhin@gmail.com>
 * @license MIT
 */
namespace Wooppay\Test;

use Wooppay\Client;

/**
 * Base test functions.
 */
abstract class Base extends \PHPUnit_Framework_TestCase
{
    /**
     * SOAP client.
     *
     * @var \Wooppay\Client
     */
    protected $client;

    /**
     * Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Returns SOAP-client.
     *
     * @return \Wooppay\Client
     */
    protected function getClient()
    {
        if (null === $this->client) {
            $this->client = new Client(
                getenv('soap_wsdl_uri'),
                [
                    'login'    => getenv('basic_auth_username'),
                    'password' => getenv('basic_auth_password'),
                ]
            );
        }

        return $this->client;
    }

    /**
     * Returns random number of specified length.
     *
     * @param  integer $length
     * @return string
     */
    protected function getRandNumber($length)
    {
        $str = str_repeat(implode('', range(0, 9)), $length);
        $str = str_shuffle($str);

        return substr($str, rand(0, strlen($str) - $length), $length);
    }

    /**
     * Shortcut for Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function getFaker()
    {
        if (null === $this->faker) {
            $this->faker = \Faker\Factory::create();
        }

        return $this->faker;
    }
}
