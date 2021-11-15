<?php
declare(strict_types=1);

namespace Nicodev\Asserts\Categories;

use Throwable;

/**
 * Trait AssertBooleanTrait
 *
 * List of assertions associated to boolean comparison.
 */
trait AssertBooleanTrait
{
    /**
     * Asserts that the given condition is strictly true.
     *
     * @param mixed $condition The condition to assert that must be strictly true.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    protected static function assertTrue(mixed $condition, callable $exception): bool
    {
        self::makeAssertion(true === $condition, $exception);
        return true;
    }

    /**
     * Asserts that the given condition is strictly not true.
     *
     * @param mixed $condition The condition to assert that must be strictly not true.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    protected static function assertNotTrue(mixed $condition, callable $exception): bool
    {
        self::makeAssertion(true !== $condition, $exception);
        return false;
    }

    /**
     * Asserts that the given condition is strictly false.
     *
     * @param mixed $condition The condition to assert that must be strictly false.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    protected static function assertFalse(mixed $condition, callable $exception): bool
    {
        self::makeAssertion(false === $condition, $exception);
        return false;
    }

    /**
     * Asserts that the given condition is strictly not false.
     *
     * @param mixed $condition The condition to assert that must be strictly not false.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    protected static function assertNotFalse(mixed $condition, callable $exception): bool
    {
        self::makeAssertion(false !== $condition, $exception);
        return true;
    }
}
