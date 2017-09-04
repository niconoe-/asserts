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
}
