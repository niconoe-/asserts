<?php
declare(strict_types = 1);

namespace Nicodev\Asserts;

/**
 * Trait TraitAssertObject
 *
 * @package Nicodev\Asserts
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2017 Nicolas Giraud
 * @license MIT
 */
trait TraitAssertObject
{
    use AbstractTraitAssert;

    /**
     * Asserts that the given object is not false.
     *
     * @param mixed $object The given object to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return mixed The given object tested.
     */
    public static function assertObjectNotFalse($object, $exception)
    {
        static::makeAssertion(false !== $object, $exception);
        return $object;
    }

    /**
     * Asserts that the given object is not null.
     *
     * @param mixed $object The given object to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return mixed The given object tested.
     */
    public static function assertObjectNotNull($object, $exception)
    {
        static::makeAssertion(null !== $object, $exception);
        return $object;
    }

    /**
     * Asserts that the given object is an instance of the given type.
     *
     * @param mixed $object The given object to test.
     * @param string $type The expected type of the given object.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return mixed The given object tested.
     */
    public static function assertObjectIsA($object, string $type, $exception)
    {
        static::makeAssertion(\is_a($object, $type), $exception);
        return $object;
    }

    /**
     * Asserts that a list of properties exist in cascade from an original object.
     * @param mixed $object The original object to check properties in cascade.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @param string[] ...$propertiesInCascade The list of properties to check in cascade.
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
