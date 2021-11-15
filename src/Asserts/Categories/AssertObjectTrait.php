<?php
declare(strict_types = 1);

namespace Nicodev\Asserts\Categories;

use Throwable;

/**
 * Trait AssertObjectTrait
 *
 * @package Nicodev\Asserts\Categories
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
trait AssertObjectTrait
{
    /**
     * Asserts that the given object is an instance of the given type.
     *
     * @param mixed $object The given object to test.
     * @param string $type The expected type of the given object.
     * @param Throwable|callable $exception The exception to throw if the assertion fails.
     * @return mixed The given object tested.
     */
    public static function assertObjectIsA($object, string $type, $exception)
    {
        static::makeAssertion(\is_a($object, $type), $exception);
        return $object;
    }

    /**
     * Asserts that a list of properties exist in cascade from an original object.
     *
     * @param mixed $object The original object to check properties in cascade.
     * @param Throwable|callable $exception The exception to throw if the assertion fails.
     * @param string ...$propertiesInCascade The list of properties to check in cascade.
     * @return mixed The value of the last element to check.
     */
    public static function assertPropertiesInCascade($object, $exception, string ...$propertiesInCascade)
    {
        foreach ($propertiesInCascade as $property) {
            static::makeAssertion(\property_exists($object, $property), $exception);
            $object = $object->{$property};
        }
        return $object;
    }
}
