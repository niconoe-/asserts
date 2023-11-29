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
 *
 * TODO:
 * When traits can have const (PHP 8.2), this trait will define:
 * - private int const ASSERT_JSON_RETURN_NULL = 0;
 * - private int const ASSERT_JSON_RETURN_ARRAY = 1;
 * - private int const ASSERT_JSON_RETURN_OBJECT = 2;
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

    /**
     * Asserts that the given string is JSON encoded, and possibly returns the decoded version into array or object.
     *
     * @param string $string To validate if JSON string
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @param int $returnMode "0" means no decode. "1" means decode in associative way. "2" means decode in object way.
     * @return mixed
     */
    protected static function assertJsonValidate(string $string, callable $exception, int $returnMode = 0): mixed
    {
        self::makeAssertion(json_validate($string), $exception);
        if (0 === $returnMode) {
            return null;
        }
        /** @noinspection JsonEncodingApiUsageInspection Ignore taking advantage of throwing error as JSON is valid. */
        return json_decode($string, 1 === $returnMode);
    }
}
