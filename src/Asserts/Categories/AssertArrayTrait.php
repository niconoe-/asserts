<?php
declare(strict_types = 1);

namespace Nicodev\Asserts\Categories;

use Throwable;

/**
 * Trait AssertArrayTrait
 *
 * @package Nicodev\Asserts\Categories
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
trait AssertArrayTrait
{
    /**
     * Asserts that the given key exists in the given array.
     *
     * @param array $array The given array to check the key existence.
     * @param string|int $key The key to check.
     * @param Throwable|callable $exception The exception to throw if the assertion fails.
     * @return mixed The value of the key in the array.
     */
    public static function assertKeyExists(array $array, $key, $exception)
    {
        static::makeAssertion(\array_key_exists($key, $array), $exception);
        return $array[$key];
    }

    /**
     * Asserts that the given element exists in the given array, with loose comparison.
     *
     * @param array $array The given array to check the element existence.
     * @param mixed $value The value to check.
     * @param Throwable|callable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertLooselyInArray(array $array, $value, $exception): bool
    {
        /** @noinspection TypeUnsafeArraySearchInspection This assertion is wanted to be unsafe type. */
        static::makeAssertion(\in_array($value, $array), $exception);
        return true;
    }

    /**
     * Asserts that the given element exists in the given array, with strict comparison.
     *
     * @param array $array The given array to check the element existence.
     * @param mixed $value The value to check.
     * @param Throwable|callable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertInArray(array $array, $value, $exception): bool
    {
        static::makeAssertion(\in_array($value, $array, true), $exception);
        return true;
    }
}
