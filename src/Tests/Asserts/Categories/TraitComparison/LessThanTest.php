<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitComparison;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class LessThanTest
 */
final class LessThanTest extends TestCase
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
             * @return int
             */
            public function runOk(): int
            {
                return self::assertLessThan(1, 100, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return true
             */
            public function runKo(): true
            {
                return self::assertLessThan(1, 1, $this->error);
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
}
