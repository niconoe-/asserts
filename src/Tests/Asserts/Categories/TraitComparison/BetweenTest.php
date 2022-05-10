<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\Categories\TraitComparison;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class BetweenTest
 */
final class BetweenTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class()
        {
            use AssertTrait;
            use ErrorBuilderTrait;

            /**
             * Run the assertion is ok for test.
             * @return bool
             */
            public function runOk(): bool
            {
                return self::assertBetween(1, 0, 2, $this->error);
            }

            /**
             * Run the assertion is ko because same as min for test.
             * @return bool
             */
            public function runKoAsLower(): bool
            {
                return self::assertBetween(0, 0, 2, $this->error);
            }

            /**
             * Run the assertion is ko because same as max for test.
             * @return bool
             */
            public function runKoAsHigher(): bool
            {
                return self::assertBetween(2, 0, 2, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return bool
             */
            public function runKo(): bool
            {
                return self::assertBetween(3, 0, 2, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertTrue($this->testClass->runOk());
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
