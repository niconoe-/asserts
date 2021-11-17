<?php
declare(strict_types=1);

namespace Nicodev\Asserts\Categories;

use Throwable;
use function json_last_error;
use const JSON_ERROR_NONE;

/**
 * Trait AssertJsonTrait
 *
 * List of assertions associated to JSON.
 */
trait AssertJsonTrait
{
    /**
     * Asserts that the last JSON error is NONE.
     *
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertJsonErrorNone(callable $exception): bool
    {
        self::makeAssertion(JSON_ERROR_NONE === json_last_error(), $exception);
        return true;
    }
}
