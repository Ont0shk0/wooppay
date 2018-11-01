<?php
/**
 * @license MIT
 */
namespace Wooppay\Objects\Exceptions;

/**
 * Low balance exception.
 */
class LowBalance extends Exception
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected $message = 'Low balance.';
}
