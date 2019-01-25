<?php
declare(strict_types = 1);

namespace Nicodev\Asserts\Categories;

use Throwable;

/**
 * Trait AssertComparisonTrait
 *
 * @package Nicodev\Asserts\Categories
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
trait AssertComparisonTrait
{
    /**
     * Asserts that the given values are loosely equals.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return mixed The actual value tested.
     */
    public static function assertLooselyEquals($actual, $expected, Throwable $exception)
    {
        /** @noinspection TypeUnsafeComparisonInspection This assertion is wanted to be unsafe type. */
        static::makeAssertion($actual == $expected, $exception);
        return $actual;
    }

    /**
     * Asserts that the given values are strictly equals.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return mixed The actual value tested.
     */
    public static function assertEquals($actual, $expected, Throwable $exception)
    {
        static::makeAssertion($actual === $expected, $exception);
        return $actual;
    }

    /**
     * Asserts that the given values are loosely not equals.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return mixed The actual value tested.
     */
    public static function assertLooselyNotEquals($actual, $expected, Throwable $exception)
    {
        /** @noinspection TypeUnsafeComparisonInspection This assertion is wanted to be unsafe type. */
        static::makeAssertion($actual != $expected, $exception);
        return $actual;
    }

    /**
     * Asserts that the given values are strictly not equals.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return mixed The actual value tested.
     */
    public static function assertNotEquals($actual, $expected, Throwable $exception)
    {
        static::makeAssertion($actual !== $expected, $exception);
        return $actual;
    }

    /**
     * Asserts that the given actual value is greater than or equals the expected value.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertGreaterThanOrEquals($actual, $expected, Throwable $exception): bool
    {
        static::makeAssertion($actual >= $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given actual value is strictly greater than the expected value.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertGreaterThan($actual, $expected, Throwable $exception): bool
    {
        static::makeAssertion($actual > $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given actual value is less than or equals the expected value.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertLessThanOrEquals($actual, $expected, Throwable $exception): bool
    {
        static::makeAssertion($actual <= $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given actual value is strictly less than the expected value.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertLessThan($actual, $expected, Throwable $exception): bool
    {
        static::makeAssertion($actual < $expected, $exception);
        return true;
    }
}
