<?php
declare(strict_types=1);

namespace Nicodev\Asserts\Categories;

use Throwable;

use function in_array;

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
     * @return true
     */
    protected static function assertTrue(mixed $condition, callable $exception): true
    {
        self::makeAssertion(true === $condition, $exception);
        return true;
    }

    /**
     * Asserts that the given condition is strictly not true.
     *
     * @param mixed $condition The condition to assert that must be strictly not true.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return false
     */
    protected static function assertNotTrue(mixed $condition, callable $exception): false
    {
        self::makeAssertion(true !== $condition, $exception);
        return false;
    }

    /**
     * Asserts that the given condition is strictly false.
     *
     * @param mixed $condition The condition to assert that must be strictly false.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return false
     */
    protected static function assertFalse(mixed $condition, callable $exception): false
    {
        self::makeAssertion(false === $condition, $exception);
        return false;
    }

    /**
     * Asserts that the given condition is strictly not false.
     *
     * @param mixed $condition The condition to assert that must be strictly not false.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertNotFalse(mixed $condition, callable $exception): true
    {
        self::makeAssertion(false !== $condition, $exception);
        return true;
    }

    /**
     * Asserts that any of the given conditions is strictly true.
     *
     * @param array<bool> $conditions The list of conditions to check at least one is strictly true.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertAnyTrue(array $conditions, callable $exception): true
    {
        self::makeAssertion(in_array(true, $conditions, true), $exception);
        return true;
    }

    /**
     * Asserts that all the given conditions are strictly true.
     *
     * @param array<bool> $conditions The list of conditions to check all are strictly true.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertAllTrue(array $conditions, callable $exception): true
    {
        self::makeAssertion(!in_array(false, $conditions, true), $exception);
        return true;
    }

    /**
     * Asserts that any of the given conditions is strictly false.
     *
     * @param array<bool> $conditions The list of conditions to check at least one is strictly false.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return false
     */
    protected static function assertAnyFalse(array $conditions, callable $exception): false
    {
        self::makeAssertion(in_array(false, $conditions, true), $exception);
        return false;
    }

    /**
     * Asserts that all the given conditions are strictly false.
     *
     * @param array<bool> $conditions The list of conditions to check all are strictly false.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return false
     */
    protected static function assertAllFalse(array $conditions, callable $exception): false
    {
        self::makeAssertion(!in_array(true, $conditions, true), $exception);
        return false;
    }
}
