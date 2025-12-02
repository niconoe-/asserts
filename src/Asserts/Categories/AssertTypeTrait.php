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
     * @return null
     */
    protected static function assertIsNull(mixed $variable, callable $exception): null
    {
        self::makeAssertion(null === $variable, $exception);
        return null;
    }

    /**
     * Asserts that the variable is a resource.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpsatn-return resource
     * @return T
     */
    protected static function assertIsResource(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(is_resource($variable), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is numeric.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return numeric-string
     */
    protected static function assertIsNumeric(mixed $variable, callable $exception): string
    {
        self::makeAssertion(is_numeric($variable), $exception);
        /** @var numeric-string */
        return $variable;
    }

    /**
     * Asserts that the variable is object.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return object
     */
    protected static function assertIsObject(mixed $variable, callable $exception): object
    {
        self::makeAssertion(is_object($variable), $exception);
        /** @var object */
        return $variable;
    }

    /**
     * Asserts that the variable is callable.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return callable
     */
    protected static function assertIsCallable(mixed $variable, callable $exception): callable
    {
        self::makeAssertion(is_callable($variable), $exception);
        /** @var callable */
        return $variable;
    }

    /**
     * Asserts that the variable is float.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return float
     */
    protected static function assertIsFloat(mixed $variable, callable $exception): float
    {
        self::makeAssertion(is_float($variable), $exception);
        /** @var float */
        return $variable;
    }

    /**
     * Asserts that the variable is an int.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return int
     */
    protected static function assertIsInt(mixed $variable, callable $exception): int
    {
        self::makeAssertion(is_int($variable), $exception);
        /** @var int */
        return $variable;
    }

    /**
     * Asserts that the variable is either an integer or a float.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return (int|float)
     */
    protected static function assertIsNumber(mixed $variable, callable $exception): int|float
    {
        self::makeAssertion(is_int($variable) || is_float($variable), $exception);
        /** @var (int|float) */
        return $variable;
    }

    /**
     * Asserts that the variable is a string.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return string
     */
    protected static function assertIsString(mixed $variable, callable $exception): string
    {
        self::makeAssertion(is_string($variable), $exception);
        /** @var string */
        return $variable;
    }

    /**
     * Asserts that the variable is a bool.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return bool
     */
    protected static function assertIsBool(mixed $variable, callable $exception): bool
    {
        self::makeAssertion(is_bool($variable), $exception);
        /** @var bool */
        return $variable;
    }

    /**
     * Asserts that the variable is an array.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return array<array-key, mixed>
     */
    protected static function assertIsArray(mixed $variable, callable $exception): array
    {
        self::makeAssertion(is_array($variable), $exception);
        /** @var array<array-key, mixed> */
        return $variable;
    }

    /**
     * Asserts that the variable is a scalar.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return scalar
     */
    protected static function assertIsScalar(mixed $variable, callable $exception): bool|int|float|string
    {
        self::makeAssertion(is_scalar($variable), $exception);
        /** @var scalar */
        return $variable;
    }

    /**
     * Asserts that the variable is NULL or a scalar.
     *
     * @param mixed $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return null|scalar
     */
    protected static function assertIsNullOrScalar(mixed $variable, callable $exception): null|bool|int|float|string
    {
        self::makeAssertion(null === $variable || is_scalar($variable), $exception);
        /** @var null|scalar */
        return $variable;
    }

    /**
     * Asserts that the variable is one of the given types.
     *
     * @template T of mixed
     *
     * @param array<string> $types The given types.
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T
     */
    protected static function assertIsTypeOf(array $types, mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(in_array(gettype($variable), $types, true), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not NULL.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpstan-return (T is null ? never : T)
     * @return T
     */
    protected static function assertIsNotNull(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(null !== $variable, $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not a resource.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpstan-return (T is resource ? never : T)
     * @return T
     */
    protected static function assertIsNotResource(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(!is_resource($variable), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not numeric.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpstan-return (T is numeric-string ? never : T)
     * @return T
     */
    protected static function assertIsNotNumeric(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(!is_numeric($variable), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not object.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpstan-return (T is object ? never : T)
     * @return T
     */
    protected static function assertIsNotObject(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(!is_object($variable), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not callable.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpstan-return (T is callable ? never : T)
     * @return T
     */
    protected static function assertIsNotCallable(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(!is_callable($variable), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not float.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpstan-return (T is float ? never : T)
     * @return T
     */
    protected static function assertIsNotFloat(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(!is_float($variable), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not an int.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpstan-return (T is int ? never : T)
     * @return T
     */
    protected static function assertIsNotInt(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(!is_int($variable), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not either an integer or a float.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpstan-return (T is (int|float) ? never : T)
     * @return T
     */
    protected static function assertIsNotNumber(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(!is_int($variable) && !is_float($variable), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not a string.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpstan-return (T is string ? never : T)
     * @return T
     */
    protected static function assertIsNotString(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(!is_string($variable), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not a bool.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpstan-return (T is bool ? never : T)
     * @return T
     */
    protected static function assertIsNotBool(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(!is_bool($variable), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not an array.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpstan-return (T is array<mixed> ? never : T)
     * @return T
     */
    protected static function assertIsNotArray(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(!is_array($variable), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not a scalar.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpstan-return (T is scalar ? never : T)
     * @return T
     */
    protected static function assertIsNotScalar(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(!is_scalar($variable), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not NULL nor a scalar.
     *
     * @template T of mixed
     *
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @phpstan-return (T is (null|scalar) ? never : T)
     * @return T
     */
    protected static function assertIsNotNullOrScalar(mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(null !== $variable && !is_scalar($variable), $exception);
        return $variable;
    }

    /**
     * Asserts that the variable is not one of the given types.
     *
     * @template T of mixed
     *
     * @param array<string> $types The given types.
     * @param T $variable The given variable to test.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return T
     */
    protected static function assertIsNotTypeOf(array $types, mixed $variable, callable $exception): mixed
    {
        self::makeAssertion(!in_array(gettype($variable), $types, true), $exception);
        return $variable;
    }
}
