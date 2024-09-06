<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitComparison;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

use const PHP_FLOAT_EPSILON;

/**
 * Final class NegativeTest
 */
final class NegativeTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass 
        {
            /**
             * Run the assertion is ok for test.
             * @return int|float
             */
            public function runOk(): int|float
            {
                return self::assertNegative(-1, $this->error);
            }

            /**
             * Run the assertion is ok closest value.
             * @return int|float
             */
            public function runOkAsClosest(): int|float
            {
                return self::assertNegative(-PHP_FLOAT_EPSILON, $this->error);
            }

            /**
             * Run the assertion is ok same as limit.
             * @return int|float
             */
            public function runOkSame(): int|float
            {
                return self::assertNegative(0, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return int|float
             */
            public function runKo(): int|float
            {
                return self::assertNegative(1, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame(-1, $this->testClass->runOk());
        self::assertSame(-PHP_FLOAT_EPSILON, $this->testClass->runOkAsClosest());
        self::assertSame(0, $this->testClass->runOkSame());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
