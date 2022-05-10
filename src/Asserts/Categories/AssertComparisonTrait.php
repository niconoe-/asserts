<?php
declare(strict_types=1);

namespace Nicodev\Asserts\Categories;

use Throwable;

/**
 * Trait AssertComparisonTrait
 *
 * List of assertions associated to comparison.
 */
trait AssertComparisonTrait
{
    /**
     * Asserts that the given values are strictly equals.
     *
     * @template T
     *
     * @param T $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T The actual value tested.
     */
    protected static function assertEquals(mixed $actual, mixed $expected, callable $exception): mixed
    {
        self::makeAssertion($actual === $expected, $exception);
        return $actual;
    }

    /**
     * Asserts that the given values are strictly not equals.
     *
     * @template T
     *
     * @param T $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T The actual value tested.
     */
    protected static function assertNotEquals(mixed $actual, mixed $expected, callable $exception): mixed
    {
        self::makeAssertion($actual !== $expected, $exception);
        return $actual;
    }

    /**
     * Asserts that the given actual value is greater than or equals the expected value.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertGreaterThanOrEquals(mixed $actual, mixed $expected, callable $exception): bool
    {
        self::makeAssertion($actual >= $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given actual value is strictly greater than the expected value.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertGreaterThan(mixed $actual, mixed $expected, callable $exception): bool
    {
        self::makeAssertion($actual > $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given actual value is less than or equals the expected value.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertLessThanOrEquals(mixed $actual, mixed $expected, callable $exception): bool
    {
        self::makeAssertion($actual <= $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given actual value is strictly less than the expected value.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertLessThan(mixed $actual, mixed $expected, callable $exception): bool
    {
        self::makeAssertion($actual < $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given actual value is between a lower and higher bound, included.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $min The lower bound.
     * @param mixed $max The higher bound.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    protected static function assertBetweenOrEquals(mixed $actual, mixed $min, mixed $max, callable $exception): bool
    {
        static::makeAssertion($min <= $actual && $max >= $actual, $exception);
        return true;
    }


    /**
     * Asserts that the given actual value is between a lower and higher bound, excluded.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $min The lower bound.
     * @param mixed $max The higher bound.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    protected static function assertBetween(mixed $actual, mixed $min, mixed $max, callable $exception): bool
    {
        static::makeAssertion($min < $actual && $max > $actual, $exception);
        return true;
    }
}
