<?php
declare(strict_types=1);

namespace Nicodev\Asserts\Categories;

use BackedEnum;
use Throwable;

/**
 * Trait AssertEnumTrait
 *
 * List of assertions associated to enum feature.
 */
trait AssertEnumTrait
{
    /**
     * Asserts that a value from a given Enum exists, and returns the Enum object if exists.
     *
     * @template T of BackedEnum
     * @param class-string<T> $enumName Name of the backed enum on which to try to get the value from.
     * @param int|string $backedValue The value associated to the backedEnum, if exists.
     * @param callable(): Throwable $exception The exception to throw if value is not in the list of backed enum values.
     * @return T The BackedEnum fetched thanks to the given value.
     */
    protected static function assertEnumHas(string $enumName, int|string $backedValue, callable $exception): BackedEnum
    {
        $enum = $enumName::tryFrom($backedValue);
        self::makeAssertion(null !== $enum, $exception);
        return $enum;
    }
}
