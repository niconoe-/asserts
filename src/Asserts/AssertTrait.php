<?php
declare(strict_types=1);

namespace Nicodev\Asserts;

use Nicodev\Asserts\Categories;
use Throwable;

/**
 * Trait AssertTrait
 *
 * The only trait to insert in your application.
 * Contains every required traits defined in all categories.
 */
trait AssertTrait
{
    use Categories\AssertArrayTrait;
    use Categories\AssertBooleanTrait;
    use Categories\AssertComparisonTrait;
    use Categories\AssertCountableTrait;
    use Categories\AssertEnumTrait;
    use Categories\AssertFileTrait;
    use Categories\AssertJsonTrait;
    use Categories\AssertObjectTrait;
    use Categories\AssertTypeTrait;

    /**
     * Makes the assertion by testing what is expected. Throws the given Throwable object if assertion fails.
     *
     * @param bool $expected What is expected to be true.
     * @param callable(): Throwable $throwable The Throwable object instance to throw.
     */
    protected static function makeAssertion(bool $expected, callable $throwable): void
    {
        if (false === $expected) {
            /** @psalm-suppress MissingThrowsDocblock Must NOT catch this here. */
            throw $throwable();
        }
    }
}
