<?php
declare(strict_types = 1);

namespace Nicodev\Asserts;

/**
 * Trait TraitAssertComparison
 *
 * @package Nicodev\Asserts
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2017 Nicolas Giraud
 * @license MIT
 */
trait TraitAssertComparison
{
    use AbstractTraitAssert;

    /**
     * Asserts that the given values are equals.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return mixed The actual value tested.
     */
    public static function assertEquals($actual, $expected, $exception)
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
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return mixed The actual value tested.
     */
    public static function assertStrictEquals($actual, $expected, $exception)
    {
        static::makeAssertion($actual === $expected, $exception);
        return $actual;
    }

    /**
     * Asserts that the given values are not equals.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return mixed The actual value tested.
     */
    public static function assertNotEquals($actual, $expected, $exception)
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
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return mixed The actual value tested.
     */
    public static function assertStrictNotEquals($actual, $expected, $exception)
    {
        static::makeAssertion($actual !== $expected, $exception);
        return $actual;
    }

    /**
     * Asserts that the given actual value is greater than the expected value.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertGreaterThan($actual, $expected, $exception): bool
    {
        static::makeAssertion($actual >= $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given actual value is strictly greater than the expected value.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertStrictGreaterThan($actual, $expected, $exception): bool
    {
        static::makeAssertion($actual > $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given actual value is less than the expected value.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertLessThan($actual, $expected, $exception): bool
    {
        static::makeAssertion($actual <= $expected, $exception);
        return true;
    }

    /**
     * Asserts that the given actual value is strictly less than the expected value.
     *
     * @param mixed $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertStrictLessThan($actual, $expected, $exception): bool
    {
        static::makeAssertion($actual < $expected, $exception);
        return true;
    }
}
