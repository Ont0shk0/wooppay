<?php
/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Igor Borodikhin <iborodikhin@gmail.com>
 * @license MIT
 */
namespace Wooppay\Objects\Exceptions;

use Wooppay\Objects\Response\Base as BaseResponse;

/**
 * Bad credentials exception.
 */
class BadCredentials extends Exception
{
    /**
     * {@inheritdoc}
     *
     * @var int
     */
    protected $code = BaseResponse::ERROR_CODE_BAD_CREDENTIALS;

    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected $message = 'Bad credentials.';
}
