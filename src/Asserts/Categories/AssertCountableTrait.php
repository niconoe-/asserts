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
     * @template T of (array<mixed>|Countable)
     *
     * @param T $array The array or the countable object to assert its emptiness.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return array{}
     */
    protected static function assertEmpty(array|Countable $array, callable $exception): array
    {
        self::makeAssertion(0 === count($array), $exception);
        return [];
    }

    /**
     * Asserts that the given array is not empty.
     *
     * @template T of (array<mixed>|Countable)
     *
     * @param T $array The array or the countable object to assert its emptiness.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T
     */
    protected static function assertNotEmpty(array|Countable $array, callable $exception): array|Countable
    {
        self::makeAssertion(0 !== count($array), $exception);
        return $array;
    }

    /**
     * Asserts that the given array contains the given number of elements.
     *
     * @template T of (array<mixed>|Countable)
     *
     * @param T $array The array or the countable object to count its content.
     * @param int $expected The number of expected elements.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T
     */
    protected static function assertCount(array|Countable $array, int $expected, callable $exception): array|Countable
    {
        self::makeAssertion(count($array) === $expected, $exception);
        return $array;
    }

    /**
     * Asserts that the given array does not contain the given number of elements.
     *
     * @template T of (array<mixed>|Countable)
     *
     * @param T $array The array or the countable object to count its content.
     * @param int $notExpected The number of not expected elements.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T
     */
    protected static function assertNotCount(
        array|Countable $array,
        int $notExpected,
        callable $exception,
    ): array|Countable {
        self::makeAssertion(count($array) !== $notExpected, $exception);
        return $array;
    }

    /**
     * Asserts that the given array contains the given number of elements, recursively.
     *
     * @template T of (array<mixed>|Countable)
     *
     * @param T $array The array or the countable object to count its content, recursively.
     * @param int $expected The total number of expected elements.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T
     */
    protected static function assertCountRecursive(
        array|Countable $array,
        int $expected,
        callable $exception,
    ): array|Countable {
        self::makeAssertion(count($array, COUNT_RECURSIVE) === $expected, $exception);
        return $array;
    }

    /**
     * Asserts that the given array contains the given number of elements, recursively.
     *
     * @template T of (array<mixed>|Countable)
     *
     * @param T $array The array or the countable object to count its content, recursively.
     * @param int $notExpected The total number of not expected elements.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T
     */
    protected static function assertNotCountRecursive(
        array|Countable $array,
        int $notExpected,
        callable $exception,
    ): array|Countable {
        self::makeAssertion(count($array, COUNT_RECURSIVE) !== $notExpected, $exception);
        return $array;
    }
}
