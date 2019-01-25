<?php
declare(strict_types = 1);

namespace Nicodev\Asserts;

use Nicodev\Asserts\Categories;
use Throwable;

/**
 * Trait AssertTrait
 *
 * The only trait to insert in your application.
 * Contains every required traits defined in all categories.
 *
 * @package Nicodev\Asserts
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
trait AssertTrait
{
    use Categories\AssertArrayTrait;
    use Categories\AssertBooleanTrait;
    use Categories\AssertComparisonTrait;
    use Categories\AssertCountableTrait;
    use Categories\AssertFileTrait;
    use Categories\AssertJsonTrait;
    use Categories\AssertObjectTrait;
    use Categories\AssertTypeTrait;

    /**
     * Makes the assertion by testing what is expected. Throws the given Throwable object if assertion fails.
     *
     * @param mixed $expected What is expected to be true.
     * @param Throwable $throwable The Throwable object instance to throw.
     * @throws
     */
    protected static function makeAssertion($expected, Throwable $throwable): void
    {
        if (!$expected) {
            throw $throwable;
        }
    }
}
