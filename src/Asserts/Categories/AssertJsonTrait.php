<?php
declare(strict_types = 1);

namespace Nicodev\Asserts\Categories;

use Throwable;

/**
 * Trait AssertJsonTrait
 *
 * @package Nicodev\Asserts\Categories
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
trait AssertJsonTrait
{
    /**
     * Asserts that the last JSON error is NONE.
     *
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return bool True if assertion does not fail.
     */
    public static function assertJsonErrorNone(Throwable $exception): bool
    {
        static::makeAssertion(\JSON_ERROR_NONE === \json_last_error(), $exception);
        return true;
    }
}
