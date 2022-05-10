<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\Categories\TraitComparison;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class BetweenOrEqualsTest
 */
final class BetweenOrEqualsTest extends TestCase
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
                return self::assertBetweenOrEquals(1, 0, 2, $this->error);
            }

            /**
             * Run the assertion is ok same as min for test.
             * @return bool
             */
            public function runOkAsLower(): bool
            {
                return self::assertBetweenOrEquals(0, 0, 2, $this->error);
            }

            /**
             * Run the assertion is ok same as max for test.
             * @return bool
             */
            public function runOkAsHigher(): bool
            {
                return self::assertBetweenOrEquals(2, 0, 2, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return bool
             */
            public function runKo(): bool
            {
                return self::assertBetweenOrEquals(3, 0, 2, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertTrue($this->testClass->runOk());
        self::assertTrue($this->testClass->runOkAsLower());
        self::assertTrue($this->testClass->runOkAsHigher());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
