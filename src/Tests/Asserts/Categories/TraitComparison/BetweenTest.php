<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitComparison;

use Exception;
use Nicodev\Asserts\AssertTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class BetweenTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitComparison
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
final class BetweenTest extends TestCase
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
                return static::assertBetween(1, 0, 2, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is ko because same as min for test.
             * @return bool
             */
            public function runKoAsLower(): bool
            {
                return static::assertBetween(0, 0, 2, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is ko because same as max for test.
             * @return bool
             */
            public function runKoAsHigher(): bool
            {
                return static::assertBetween(2, 0, 2, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return bool
             */
            public function runKo(): bool
            {
                return static::assertBetween(3, 0, 2, new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        static::assertTrue($this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }

    public function testMakeAssertionKOLower(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKoAsLower();
    }

    public function testMakeAssertionKOHigher(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKoAsHigher();
    }
}
