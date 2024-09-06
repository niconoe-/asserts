<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\Categories\TraitComparison;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

use const PHP_FLOAT_EPSILON;

/**
 * Final class StrictlyPositiveTest
 */
final class StrictlyPositiveTest extends TestCase
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
             * @return int|float
             */
            public function runOk(): int|float
            {
                return self::assertStrictlyPositive(1, $this->error);
            }

            /**
             * Run the assertion is ok closest value.
             * @return int|float
             */
            public function runOkAsClosest(): int|float
            {
                return self::assertStrictlyPositive(PHP_FLOAT_EPSILON, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return int|float
             */
            public function runKoSame(): int|float
            {
                return self::assertStrictlyPositive(0, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return int|float
             */
            public function runKo(): int|float
            {
                return self::assertStrictlyPositive(-1, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame(1, $this->testClass->runOk());
        self::assertSame(PHP_FLOAT_EPSILON, $this->testClass->runOkAsClosest());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }

    public function testMakeAssertionKOSame(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKoSame();
    }
}
