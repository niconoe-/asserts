<?php
declare(strict_types=1);

namespace Nicodev\Asserts\Categories;

use Throwable;

use function array_all;
use function array_any;
use function array_find;
use function array_find_key;
use function array_is_list;
use function array_key_exists;
use function array_map;
use function array_unique;
use function end;
use function in_array;
use function reset;

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
     * @template T of mixed
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
     * @template T of mixed
     *
     * @param array<int|string, T> $array The given array to check the element existence.
     * @param T $value The value to check.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertInArray(array $array, mixed $value, callable $exception): true
    {
        self::makeAssertion(in_array($value, $array, true), $exception);
        return true;
    }

    /**
     * Asserts that the given array has a first element that exists.
     *
     * @template T of mixed
     *
     * @param array<int|string, T> $array The given array to check the first element existence.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T The first element of the array.
     */
    protected static function assertFirstExists(array $array, callable $exception): mixed
    {
        self::makeAssertion([] !== $array, $exception);
        return reset($array);
    }

    /**
     * Asserts that the given array has a last element that exists.
     *
     * @template T of mixed
     *
     * @param array<int|string, T> $array The given array to check the last element existence.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T The last element of the array.
     */
    protected static function assertLastExists(array $array, callable $exception): mixed
    {
        self::makeAssertion([] !== $array, $exception);
        return end($array);
    }

    /**
     * Asserts that the given array has at least one element that satisfies the given callback, and returns the first
     * element that matches.
     *
     * @template T of mixed
     * @template TKey of array-key
     *
     * @param array<TKey, T> $array The given array to check if any element satisfies the given callback.
     * @param callable(T, TKey): bool $callback The callback to check the element.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T The first element that matches the given callback.
     */
    protected static function assertAny(array $array, callable $callback, callable $exception): mixed
    {
        self::makeAssertion(array_any($array, $callback), $exception);
        return array_find($array, $callback);
    }

    /**
     * Asserts that the given array has at least one element that satisfies the given callback, and returns the key of
     * the first element that matches.
     *
     * @template T of mixed
     * @template TKey of array-key
     *
     * @param array<TKey, T> $array The given array to check if any element satisfies the given callback.
     * @param callable(T, TKey): bool $callback The callback to check the element.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return int|string The key of the first element that matches the given callback.
     */
    protected static function assertAnyKey(array $array, callable $callback, callable $exception): int|string
    {
        self::makeAssertion(array_any($array, $callback), $exception);
        /** @var int|string We asserted the element exists, so the key cannot be NULL. */
        return array_find_key($array, $callback);
    }

    /**
     * Asserts that the given array has all its elements that satisfy the given callback.
     *
     * @template T of mixed
     * @template TKey of array-key
     *
     * @param array<TKey, T> $array The given array to check if any element satisfies the given callback.
     * @param callable(T, TKey): bool $callback The callback to check the element.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return array<TKey, T> The given array which all elements satisfy the given callback.
     */
    protected static function assertAll(array $array, callable $callback, callable $exception): array
    {
        self::makeAssertion(array_all($array, $callback), $exception);
        return $array;
    }

    /**
     * Asserts that the given array has no duplicate elements.
     *
     * @template T of mixed
     *
     * @param array<int|string, T> $array The given array to check if there are any duplicate elements.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return array<int|string, T> The given array.
     */
    protected static function assertUnique(array $array, callable $exception): array
    {
        self::makeAssertion($array === array_unique($array), $exception);
        return $array;
    }

    /**
     * Asserts that the given array is a list.
     *
     * @template T of mixed
     *
     * @param array<int|string, T> $array The given array to verify as being a list.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return list<T> The initial array, proven that is now a list.
     */
    protected static function assertIsList(array $array, callable $exception): array
    {
        self::makeAssertion(array_is_list($array), $exception);
        /** @var list<T> */
        return $array;
    }

    /**
     * Asserts that the given array is not a list.
     *
     * @template T of mixed
     *
     * @param array<int|string, T> $array The given array to verify as not being a list.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return array<int|string, T> The initial array, proven that is not a list.
     */
    protected static function assertIsNotList(array $array, callable $exception): array
    {
        self::makeAssertion(false === array_is_list($array), $exception);
        return $array;
    }

    /**
     * Asserts that a list of keys exist in cascade from an original array.
     *
     * @template T of mixed
     *
     * @param array<int|string, T> $array The original array to check keys in cascade.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @param int|string ...$keys The list of keys to check in cascade.
     * @return T The value of the last element to check.
     */
    protected static function assertKeysInCascade(
        array $array,
        callable $exception,
        int|string ...$keys,
    ): mixed {
        array_map(static function (int|string $key) use (&$array, $exception): void {
            self::makeAssertion(array_key_exists($key, $array), $exception);
            $array = $array[$key];
        }, $keys);
        return $array;
    }
}
