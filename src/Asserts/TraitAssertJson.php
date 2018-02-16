<?php
declare(strict_types = 1);

namespace Nicodev\Asserts;

/**
 * Trait TraitAssertJson
 *
 * @package Nicodev\Asserts
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2018 Nicolas Giraud
 * @license MIT
 */
trait TraitAssertJson
{
    use AbstractTraitAssert;

    /**
     * Asserts that the last JSON error is NONE.
     *
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool True if assertion does not fail.
     */
    public static function assertJsonErrorNone($exception): bool
    {
        static::makeAssertion(\JSON_ERROR_NONE === \json_last_error(), $exception);
        return true;
    }
}
