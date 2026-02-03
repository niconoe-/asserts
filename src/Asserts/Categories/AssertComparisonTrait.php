<?php
declare(strict_types=1);

namespace Nicodev\Asserts\Categories;

use Throwable;

use function trim;

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
     * @template T of mixed
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
     * @template T of mixed
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
     * @template T of mixed
     *
     * @param T $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T The actual value tested.
     */
    protected static function assertGreaterThanOrEquals(mixed $actual, mixed $expected, callable $exception): mixed
    {
        self::makeAssertion($actual >= $expected, $exception);
        return $actual;
    }

    /**
     * Asserts that the given actual value is strictly greater than the expected value.
     *
     * @template T of mixed
     *
     * @param T $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T The actual value tested.
     */
    protected static function assertGreaterThan(mixed $actual, mixed $expected, callable $exception): mixed
    {
        self::makeAssertion($actual > $expected, $exception);
        return $actual;
    }

    /**
     * Asserts that the given actual value is less than or equals the expected value.
     *
     * @template T of mixed
     *
     * @param T $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T The actual value tested.
     */
    protected static function assertLessThanOrEquals(mixed $actual, mixed $expected, callable $exception): mixed
    {
        self::makeAssertion($actual <= $expected, $exception);
        return $actual;
    }

    /**
     * Asserts that the given actual value is strictly less than the expected value.
     *
     * @template T of mixed
     *
     * @param T $actual The actual value to test.
     * @param mixed $expected The expected value.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T The actual value tested.
     */
    protected static function assertLessThan(mixed $actual, mixed $expected, callable $exception): mixed
    {
        self::makeAssertion($actual < $expected, $exception);
        return $actual;
    }

    /**
     * Asserts that the given actual value is positive.
     *
     * @template T of (int|float)
     * @param T $value The value to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return (T is int ? int : float) The value tested
     */
    protected static function assertPositive(int|float $value, callable $exception): int|float
    {
        self::makeAssertion($value >= 0, $exception);
        return $value;
    }

    /**
     * Asserts that the given actual value is strictly positive.
     *
     * @template T of (int|float)
     * @param T $value The value to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return (T is int ? int : float) The value tested
     */
    protected static function assertStrictlyPositive(int|float $value, callable $exception): int|float
    {
        self::makeAssertion($value > 0, $exception);
        return $value;
    }


    /**
     * Asserts that the given actual value is negative.
     *
     * @template T of (int|float)
     * @param T $value The value to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return (T is int ? int : float) The value tested
     */
    protected static function assertNegative(int|float $value, callable $exception): int|float
    {
        self::makeAssertion($value <= 0, $exception);
        return $value;
    }

    /**
     * Asserts that the given actual value is strictly negative.
     *
     * @template T of (int|float)
     * @param T $value The value to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return (T is int ? int : float) The value tested
     */
    protected static function assertStrictlyNegative(int|float $value, callable $exception): int|float
    {
        self::makeAssertion($value < 0, $exception);
        return $value;
    }

    /**
     * Asserts that the given actual value is between a lower and higher bound, included.
     *
     * @template T of mixed
     *
     * @param T $actual The actual value to test.
     * @param mixed $min The lower bound.
     * @param mixed $max The higher bound.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T The actual value tested.
     */
    protected static function assertBetweenOrEquals(mixed $actual, mixed $min, mixed $max, callable $exception): mixed
    {
        static::makeAssertion($min <= $actual && $max >= $actual, $exception);
        return $actual;
    }

    /**
     * Asserts that the given actual value is between a lower and higher bound, excluded.
     *
     * @template T of mixed
     *
     * @param T $actual The actual value to test.
     * @param mixed $min The lower bound.
     * @param mixed $max The higher bound.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T The actual value tested.
     */
    protected static function assertBetween(mixed $actual, mixed $min, mixed $max, callable $exception): mixed
    {
        static::makeAssertion($min < $actual && $max > $actual, $exception);
        return $actual;
    }

    /**
     * Asserts that the given string, when trimmed, is an empty string.
     *
     * @param null|string $actual The string to trim, then compare.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return "''" An empty string
     */
    protected static function assertEmptyString(null|string $actual, callable $exception): string
    {
        static::makeAssertion('' === trim((string)$actual), $exception);
        return '';
    }

    /**
     * Asserts that the given string, when trimmed, is not an empty string.
     *
     * @param null|string $actual The string to trim, then compare.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return non-empty-string The non-empty-string trimmed.
     */
    protected static function assertNonEmptyString(null|string $actual, callable $exception): string
    {
        $trimmed = trim((string)$actual);
        static::makeAssertion('' !== $trimmed, $exception);
        /** @var non-empty-string */
        return $trimmed;
    }
}
