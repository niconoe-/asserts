<?php
declare(strict_types = 1);

namespace Nicodev\Asserts;

use Exception;

/**
 * Trait AbstractTraitAssert
 *
 * Abstract layer that only have the business to make the assertion and throw the given exception if the assertion
 * fails.
 *
 * @package Nicodev\Asserts
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2017 Nicolas Giraud
 * @license MIT
 */
trait AbstractTraitAssert
{
    /**
     * Makes the assertion by testing what is expected. Throws the given Exception if assertion fails.
     *
     * @param mixed $expected What is expected to be true.
     * @param mixed $exception The exception to throw. Any Exception are authorized.
     * @throws
     */
    protected static function makeAssertion($expected, Exception $exception): void
    {
        if ($expected) {
            return;
        }

        throw $exception;
    }
}
