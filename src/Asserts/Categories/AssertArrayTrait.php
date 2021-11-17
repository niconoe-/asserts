<?php
declare(strict_types=1);

namespace Nicodev\Asserts\Categories;

use Throwable;
use function array_key_exists;
use function in_array;

/**
 * Trait AssertArrayTrait
 *
 * List of assertions associated to array management.
 */
trait AssertArrayTrait
{
    /**
     * Asserts that the given key exists in the given array.
     *
     * @template T
     *
     * @param array<int|string, T> $array The given array to check the key existence.
     * @param int|string $key The key to check.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T The value of the key in the array.
     */
    protected static function assertKeyExists(array $array, int|string $key, callable $exception): mixed
    {
        self::makeAssertion(array_key_exists($key, $array), $exception);
        return $array[$key];
    }

    /**
     * Asserts that the given element exists in the given array, with strict comparison.
     *
     * @template T
     *
     * @param array<int|string, T> $array The given array to check the element existence.
     * @param T $value The value to check.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    protected static function assertInArray(array $array, mixed $value, callable $exception): bool
    {
        self::makeAssertion(in_array($value, $array, true), $exception);
        return true;
    }
}
