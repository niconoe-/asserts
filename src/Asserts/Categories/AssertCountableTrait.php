<?php
declare(strict_types=1);

namespace Nicodev\Asserts\Categories;

use Countable;
use Throwable;
use function count;
use const COUNT_RECURSIVE;

/**
 * Trait AssertCountableTrait
 *
 * List of assertions associated to countable elements.
 */
trait AssertCountableTrait
{
    /**
     * Asserts that the given array is empty.
     *
     * @param array<mixed>|Countable $array The array or the countable object to assert its emptiness.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertEmpty(array|Countable $array, callable $exception): bool
    {
        self::makeAssertion(0 === count($array), $exception);
        return true;
    }

    /**
     * Asserts that the given array is not empty.
     *
     * @param array<mixed>|Countable $array The array or the countable object to assert its emptiness.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertNotEmpty(array|Countable $array, callable $exception): bool
    {
        self::makeAssertion(0 !== count($array), $exception);
        return true;
    }

    /**
     * Asserts that the given array contains the given number of elements.
     *
     * @param array<mixed>|Countable $array The array or the countable object to count its content.
     * @param int $expected The number of expected elements.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertCount(array|Countable $array, int $expected, callable $exception): bool
    {
        self::makeAssertion(count($array) === $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given array does not contain the given number of elements.
     *
     * @param array<mixed>|Countable $array The array or the countable object to count its content.
     * @param int $notExpected The number of not expected elements.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertNotCount(array|Countable $array, int $notExpected, callable $exception): bool
    {
        self::makeAssertion(count($array) !== $notExpected, $exception);
        return true;
    }

    /**
     * Asserts that the given array contains the given number of elements, recursively.
     *
     * @param array<mixed>|Countable $array The array or the countable object to count its content, recursively.
     * @param int $expected The total number of expected elements.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertCountRecursive(array|Countable $array, int $expected, callable $exception): bool
    {
        self::makeAssertion(count($array, COUNT_RECURSIVE) === $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given array contains the given number of elements, recursively.
     *
     * @param array<mixed>|Countable $array The array or the countable object to count its content, recursively.
     * @param int $notExpected The total number of not expected elements.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertNotCountRecursive(
        array|Countable $array,
        int $notExpected,
        callable $exception
    ): bool {
        self::makeAssertion(count($array, COUNT_RECURSIVE) !== $notExpected, $exception);
        return true;
    }
}
