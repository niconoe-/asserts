<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitComparison;

use Exception;
use Nicodev\Asserts\AssertTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class BetweenOrEqualsTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitComparison
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
final class BetweenOrEqualsTest extends TestCase
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
             * @return bool
             */
            public function runOk(): bool
            {
                return static::assertBetweenOrEquals(1, 0, 2, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is ok same as min for test.
             * @return bool
             */
            public function runOkAsLower(): bool
            {
                return static::assertBetweenOrEquals(0, 0, 2, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is ok same as max for test.
             * @return bool
             */
            public function runOkAsHigher(): bool
            {
                return static::assertBetweenOrEquals(2, 0, 2, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return bool
             */
            public function runKo(): bool
            {
                return static::assertBetweenOrEquals(3, 0, 2, new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        static::assertTrue($this->testClass->runOk());
        static::assertTrue($this->testClass->runOkAsLower());
        static::assertTrue($this->testClass->runOkAsHigher());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
