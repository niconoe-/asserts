<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitComparison;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class EmptyStringTest
 */
final class EmptyStringTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass
        {
            /**
             * Run the assertion is ok for test.
             * @return "''"
             */
            public function runOk(): string
            {
                return self::assertEmptyString('', $this->error);
            }

            /**
             * Run the assertion is ok for test with spaces.
             * @return "''"
             */
            public function runOkSpaces(): string
            {
                return self::assertEmptyString('    ', $this->error);
            }

            /**
             * Run the assertion is ok for test with NULL.
             * @return "''"
             */
            public function runOkNull(): string
            {
                return self::assertEmptyString(null, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return "''"
             */
            public function runKo(): string
            {
                return self::assertEmptyString(' Not empty ', $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame('', $this->testClass->runOk());
        self::assertSame('', $this->testClass->runOkSpaces());
        self::assertSame('', $this->testClass->runOkNull());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
