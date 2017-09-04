<?php
declare(strict_types = 1);

namespace Nicodev\Asserts;

/**
 * Trait TraitAssertType
 *
 * @package Nicodev\Asserts
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2017 Nicolas Giraud
 * @license MIT
 */
trait TraitAssertType
{
    use AbstractTraitAssert;

    /**
     * Asserts that the variable is a resource.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsResource($variable, $exception): bool
    {
        static::makeAssertion(\is_resource($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is numeric.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNumeric($variable, $exception): bool
    {
        static::makeAssertion(\is_numeric($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is object.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsObject($variable, $exception): bool
    {
        static::makeAssertion(\is_object($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is callable.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsCallable($variable, $exception): bool
    {
        static::makeAssertion(\is_callable($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is float.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsFloat($variable, $exception): bool
    {
        static::makeAssertion(\is_float($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is an int.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsInt($variable, $exception): bool
    {
        static::makeAssertion(\is_int($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is either an integer or a float.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNumber($variable, $exception): bool
    {
        static::makeAssertion(\is_int($variable) || \is_float($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is a string.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsString($variable, $exception): bool
    {
        static::makeAssertion(\is_string($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is a bool.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsBool($variable, $exception): bool
    {
        static::makeAssertion(\is_bool($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is an array.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsArray($variable, $exception): bool
    {
        static::makeAssertion(\is_array($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is a scalar.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsScalar($variable, $exception): bool
    {
        static::makeAssertion(\is_scalar($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is one of the given types.
     *
     * @param array $types The given types.
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsTypeOf(array $types, $variable, $exception): bool
    {
        static::makeAssertion(\in_array(\gettype($variable), $types, true), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not a resource.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNotResource($variable, $exception): bool
    {
        static::makeAssertion(!\is_resource($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not numeric.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNotNumeric($variable, $exception): bool
    {
        static::makeAssertion(!\is_numeric($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not object.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNotObject($variable, $exception): bool
    {
        static::makeAssertion(!\is_object($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not callable.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNotCallable($variable, $exception): bool
    {
        static::makeAssertion(!\is_callable($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not float.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNotFloat($variable, $exception): bool
    {
        static::makeAssertion(!\is_float($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not an int.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNotInt($variable, $exception): bool
    {
        static::makeAssertion(!\is_int($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not either an integer or a float.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNotNumber($variable, $exception): bool
    {
        static::makeAssertion(!\is_int($variable) && !\is_float($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not a string.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNotString($variable, $exception): bool
    {
        static::makeAssertion(!\is_string($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not a bool.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNotBool($variable, $exception): bool
    {
        static::makeAssertion(!\is_bool($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not an array.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNotArray($variable, $exception): bool
    {
        static::makeAssertion(!\is_array($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not a scalar.
     *
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNotScalar($variable, $exception): bool
    {
        static::makeAssertion(!\is_scalar($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not one of the given types.
     *
     * @param array $types The given types.
     * @param mixed $variable The given variable to test.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return bool
     */
    public static function assertIsNotTypeOf(array $types, $variable, $exception): bool
    {
        static::makeAssertion(!\in_array(\gettype($variable), $types, true), $exception);
        return true;
    }
}
