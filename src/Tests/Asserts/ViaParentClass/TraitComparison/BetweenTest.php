<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitComparison;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class BetweenTest
 */
final class BetweenTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass
        {
            /**
             * Run the assertion is ok for test.
             * @return mixed
             */
            public function runOk(): mixed
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
        self::assertSame(1, $this->testClass->runOk());
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
