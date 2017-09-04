<?php
declare(strict_types = 1);

namespace Nicodev\Asserts;

/**
 * Trait TraitAssertBoolean
 *
 * @package Nicodev\Asserts
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2017 Nicolas Giraud
 * @license MIT
 */
trait TraitAssertBoolean
{
    use AbstractTraitAssert;

    /**
     * Asserts that the given condition is true.
     *
     * @param mixed $condition The condition to assert that must be true.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertTrue($condition, $exception): bool
    {
        static::makeAssertion($condition, $exception);
        return true;
    }

    /**
     * Asserts that the given condition is strictly true.
     *
     * @param mixed $condition The condition to assert that must be strictly true.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertStrictTrue($condition, $exception): bool
    {
        static::makeAssertion(true === $condition, $exception);
        return true;
    }

    /**
     * Asserts that the given condition is false.
     *
     * @param mixed $condition The condition to assert that must be false.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertFalse($condition, $exception): bool
    {
        static::makeAssertion(!$condition, $exception);
        return false;
    }

    /**
     * Asserts that the given condition is strictly false.
     *
     * @param mixed $condition The condition to assert that must be strictly false.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertStrictFalse($condition, $exception): bool
    {
        static::makeAssertion(false === $condition, $exception);
        return false;
    }
}
