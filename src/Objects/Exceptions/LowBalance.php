<?php
/**
 * @license MIT
 */
namespace Wooppay\Objects\Exceptions;

use Wooppay\Objects\Response\Base as BaseResponse;

/**
 * Low balance exception.
 */
class LowBalance extends Exception
{
    /**
     * {@inheritdoc}
     *
     * @var int
     */
    protected $code = BaseResponse::ERROR_CODE_LOW_BALANCE;

    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected $message = 'Low balance.';
}
