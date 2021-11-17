<?php
declare(strict_types=1);

namespace Nicodev\Asserts\Categories;

use Throwable;
use function array_map;
use function is_a;
use function property_exists;

/**
 * Trait AssertObjectTrait
 *
 * List of assertions associated to object management.
 */
trait AssertObjectTrait
{
    /**
     * Asserts that the given object is an instance of the given type.
     *
     * @template T
     *
     * @param T $object The given object to test.
     * @param string $type The expected type of the given object.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T The given object tested.
     */
    protected static function assertObjectIsA(mixed $object, string $type, callable $exception): mixed
    {
        self::makeAssertion(is_a($object, $type), $exception);
        return $object;
    }

    /**
     * Asserts that a list of properties exist in cascade from an original object.
     *
     * @param object $object The original object to check properties in cascade.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @param string ...$properties The list of properties to check in cascade.
     * @return mixed The value of the last element to check.
     */
    protected static function assertPropertiesInCascade(
        object $object,
        callable $exception,
        string ...$properties
    ): mixed {
        array_map(static function (string $property) use (&$object, $exception): void {
            self::makeAssertion(property_exists($object, $property), $exception);
            $object = $object->{$property};
        }, $properties);
        return $object;
    }
}
