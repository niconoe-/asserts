<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts;

use Exception;
use InvalidArgumentException;
use Nicodev\Asserts\AssertTrait;
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * Final class AssertTraitTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
final class AssertTraitTest extends TestCase
{
    /**
     * @var object anonymous class
     * @method runOk
     * @method runKo
     */
    private $testClass;

    public function setUp()
    {
        $this->testClass = new class()
        {
            use AssertTrait;

            /**
             * Run the assertion is ok for test.
             */
            public function runOk(): void
            {
                static::makeAssertion(true, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             */
            public function runKo(): void
            {
                static::makeAssertion(false, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test, with a callable that returns a Throwable object.
             */
            public function runKoWithExpectedCallable(): void
            {
                $callable = static function (): Throwable {
                    return new Exception('This assertion fails.');
                };
                static::makeAssertion(false, $callable);
            }

            /**
             * Run the assertion is KO for test, with a callable that returns an invalid value.
             */
            public function runKoWithUnexpectedCallable(): void
            {
                $callable = static function (): int {
                    return 42;
                };
                static::makeAssertion(false, $callable);
            }

            /**
             * Run the assertion is KO for test, with an invalid value.
             */
            public function runKoWithInvalidArgument(): void
            {
                static::makeAssertion(false, 42);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        $this->testClass->runOk();
        static::assertTrue(true);
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }

    public function testMakeAssertionKOWithExpectedCallable(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKoWithExpectedCallable();
    }

    public function testMakeAssertionKOWithUnexpectedCallable(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $msg = 'Assertion failed: expected Throwable or a callable returning a Throwable object. "integer" given.';
        $this->expectExceptionMessage($msg);
        $this->testClass->runKoWithUnexpectedCallable();
    }

    public function testMakeAssertionKOWithInvalidArgument(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $msg = 'Assertion failed: expected Throwable or a callable returning a Throwable object. "integer" given.';
        $this->expectExceptionMessage($msg);
        $this->testClass->runKoWithInvalidArgument();
    }
}
