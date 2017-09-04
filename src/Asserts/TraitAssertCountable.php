<?php
declare(strict_types = 1);

namespace Nicodev\Asserts;

/**
 * Trait TraitAssertCountable
 *
 * @package Nicodev\Asserts
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2017 Nicolas Giraud
 * @license MIT
 */
trait TraitAssertCountable
{
    use AbstractTraitAssert;

    /**
     * Asserts that the given array is empty.
     *
     * @param array|\Countable $countableElement The array or the countable object to assert its emptiness.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertEmpty($countableElement, $exception): bool
    {
        static::makeAssertion(0 === \count($countableElement), $exception);
        return true;
    }

    /**
     * Asserts that the given array is not empty.
     *
     * @param array|\Countable $countableElement The array or the countable object to assert its emptiness.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertNotEmpty($countableElement, $exception): bool
    {
        static::makeAssertion(0 !== \count($countableElement), $exception);
        return true;
    }

    /**
     * Asserts that the given array contains the given number of elements.
     *
     * @param array|\Countable $countableElement The array or the countable object to assert its emptiness.
     * @param int $expectedNumber The number of expected elements.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertCount($countableElement, int $expectedNumber, $exception): bool
    {
        static::makeAssertion(\count($countableElement) === $expectedNumber, $exception);
        return true;
    }

    /**
     * Asserts that the given array contains the given number of elements, recursively.
     *
     * @param array|\Countable $countableElement The array or the countable object to assert its emptiness.
     * @param int $expectedNumber The total number of expected elements.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertCountRecursive($countableElement, int $expectedNumber, $exception): bool
    {
        static::makeAssertion(\count($countableElement, \COUNT_RECURSIVE) === $expectedNumber, $exception);
        return true;
    }
}
