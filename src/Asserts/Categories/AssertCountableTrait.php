<?php
declare(strict_types = 1);

namespace Nicodev\Asserts\Categories;

use Throwable;

/**
 * Trait AssertCountableTrait
 *
 * @package Nicodev\Asserts\Categories
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
trait AssertCountableTrait
{
    /**
     * Asserts that the given array is empty.
     *
     * @param array|\Countable $countableElement The array or the countable object to assert its emptiness.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertEmpty($countableElement, Throwable $exception): bool
    {
        static::makeAssertion(0 === \count($countableElement), $exception);
        return true;
    }

    /**
     * Asserts that the given array is not empty.
     *
     * @param array|\Countable $countableElement The array or the countable object to assert its emptiness.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertNotEmpty($countableElement, Throwable $exception): bool
    {
        static::makeAssertion(0 !== \count($countableElement), $exception);
        return true;
    }

    /**
     * Asserts that the given array contains the given number of elements.
     *
     * @param array|\Countable $countableElement The array or the countable object to count its content.
     * @param int $expected The number of expected elements.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertCount($countableElement, int $expected, Throwable $exception): bool
    {
        static::makeAssertion(\count($countableElement) === $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given array does not contain the given number of elements.
     *
     * @param array|\Countable $countableElement The array or the countable object to count its content.
     * @param int $notExpected The number of not expected elements.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertNotCount($countableElement, int $notExpected, Throwable $exception): bool
    {
        static::makeAssertion(\count($countableElement) !== $notExpected, $exception);
        return true;
    }

    /**
     * Asserts that the given array contains the given number of elements, recursively.
     *
     * @param array|\Countable $countableElement The array or the countable object to count its content, recursively.
     * @param int $expected The total number of expected elements.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertCountRecursive($countableElement, int $expected, Throwable $exception): bool
    {
        static::makeAssertion(\count($countableElement, \COUNT_RECURSIVE) === $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given array contains the given number of elements, recursively.
     *
     * @param array|\Countable $countableElement The array or the countable object to count its content, recursively.
     * @param int $notExpected The total number of not expected elements.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertNotCountRecursive($countableElement, int $notExpected, Throwable $exception): bool
    {
        static::makeAssertion(\count($countableElement, \COUNT_RECURSIVE) !== $notExpected, $exception);
        return true;
    }
}
