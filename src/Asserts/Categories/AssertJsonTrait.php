<?php
declare(strict_types=1);

namespace Nicodev\Asserts\Categories;

use Throwable;

use function json_decode;
use function json_last_error;
use function json_validate;

use const JSON_ERROR_NONE;

/**
 * Trait AssertJsonTrait
 *
 * List of assertions associated to JSON.
 */
trait AssertJsonTrait
{
    final protected const int ASSERT_JSON_RETURN_NULL = 0; // No decode
    final protected const int ASSERT_JSON_RETURN_ARRAY = 1; // Decode in associative way
    final protected const int ASSERT_JSON_RETURN_OBJECT = 2; // Decode in object way

    /**
     * Asserts that the last JSON error is NONE.
     *
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertJsonErrorNone(callable $exception): true
    {
        self::makeAssertion(JSON_ERROR_NONE === json_last_error(), $exception);
        return true;
    }

    /**
     * Asserts that the given string is JSON encoded, and possibly returns the decoded version into array or object.
     *
     * @template T of self::ASSERT_JSON_RETURN_*
     * @param string $string To validate if JSON string
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @param self::ASSERT_JSON_RETURN_* $returnMode
     * @return (T is self::ASSERT_JSON_RETURN_NULL ? null : mixed)
     */
    protected static function assertJsonValidate(
        string $string,
        callable $exception,
        int $returnMode = self::ASSERT_JSON_RETURN_NULL,
    ): mixed {
        self::makeAssertion(json_validate($string), $exception);
        if (self::ASSERT_JSON_RETURN_NULL === $returnMode) {
            return null;
        }
        /** @noinspection JsonEncodingApiUsageInspection Ignore taking advantage of throwing error as JSON is valid. */
        return json_decode($string, self::ASSERT_JSON_RETURN_ARRAY === $returnMode);
    }
}
