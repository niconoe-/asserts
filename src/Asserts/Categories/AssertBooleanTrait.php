<?php
declare(strict_types = 1);

namespace Nicodev\Asserts\Categories;

use Throwable;

/**
 * Trait AssertBooleanTrait
 *
 * @package Nicodev\Asserts\Categories
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
trait AssertBooleanTrait
{
    /**
     * Asserts that the given condition is loosely true.
     *
     * @param mixed $condition The condition to assert that must be loosely true.
     * @param Throwable|callable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertLooselyTrue($condition, $exception): bool
    {
        static::makeAssertion($condition, $exception);
        return true;
    }

    /**
     * Asserts that the given condition is strictly true.
     *
     * @param mixed $condition The condition to assert that must be strictly true.
     * @param Throwable|callable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertTrue($condition, $exception): bool
    {
        static::makeAssertion(true === $condition, $exception);
        return true;
    }

    /**
     * Asserts that the given condition is strictly not true.
     *
     * @param mixed $condition The condition to assert that must be strictly not true.
     * @param Throwable|callable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertNotTrue($condition, $exception): bool
    {
        static::makeAssertion(true !== $condition, $exception);
        return false;
    }

    /**
     * Asserts that the given condition is loosely false.
     *
     * @param mixed $condition The condition to assert that must be loosely false.
     * @param Throwable|callable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertLooselyFalse($condition, $exception): bool
    {
        static::makeAssertion(!$condition, $exception);
        return false;
    }

    /**
     * Asserts that the given condition is strictly false.
     *
     * @param mixed $condition The condition to assert that must be strictly false.
     * @param Throwable|callable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertFalse($condition, $exception): bool
    {
        static::makeAssertion(false === $condition, $exception);
        return false;
    }

    /**
     * Asserts that the given condition is strictly not false.
     *
     * @param mixed $condition The condition to assert that must be strictly not false.
     * @param Throwable|callable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertNotFalse($condition, $exception): bool
    {
        static::makeAssertion(false !== $condition, $exception);
        return true;
    }
}
