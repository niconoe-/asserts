<?php
declare(strict_types=1);

namespace Nicodev\Asserts\Categories;

use Throwable;
use function gettype;
use function in_array;
use function is_array;
use function is_bool;
use function is_callable;
use function is_float;
use function is_int;
use function is_numeric;
use function is_object;
use function is_resource;
use function is_scalar;
use function is_string;

/**
 * Trait AssertTypeTrait
 *
 * List of assertions associated to type hints.
 */
trait AssertTypeTrait
{
    /**
     * Asserts that the variable is NULL.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNull(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(null === $variable, $exception);
        return true;
    }

    /**
     * Asserts that the variable is a resource.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsResource(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(is_resource($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is numeric.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNumeric(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(is_numeric($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is object.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsObject(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(is_object($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is callable.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsCallable(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(is_callable($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is float.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsFloat(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(is_float($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is an int.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsInt(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(is_int($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is either an integer or a float.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNumber(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(is_int($variable) || is_float($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is a string.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsString(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(is_string($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is a bool.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsBool(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(is_bool($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is an array.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsArray(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(is_array($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is a scalar.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsScalar(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(is_scalar($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is one of the given types.
     *
     * @param array<string> $types The given types.
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsTypeOf(array $types, mixed $variable, callable $exception): bool
    {
        self::makeAssertion(in_array(gettype($variable), $types, true), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not NULL.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNotNull(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(null !== $variable, $exception);
        return true;
    }

    /**
     * Asserts that the variable is not a resource.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNotResource(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(!is_resource($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not numeric.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNotNumeric(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(!is_numeric($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not object.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNotObject(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(!is_object($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not callable.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNotCallable(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(!is_callable($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not float.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNotFloat(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(!is_float($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not an int.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNotInt(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(!is_int($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not either an integer or a float.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNotNumber(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(!is_int($variable) && !is_float($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not a string.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNotString(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(!is_string($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not a bool.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNotBool(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(!is_bool($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not an array.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNotArray(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(!is_array($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not a scalar.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNotScalar(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(!is_scalar($variable), $exception);
        return true;
    }

    /**
     * Asserts that the variable is not one of the given types.
     *
     * @param array<string> $types The given types.
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return true
     */
    protected static function assertIsNotTypeOf(array $types, mixed $variable, callable $exception): bool
    {
        self::makeAssertion(!in_array(gettype($variable), $types, true), $exception);
        return true;
    }
}
