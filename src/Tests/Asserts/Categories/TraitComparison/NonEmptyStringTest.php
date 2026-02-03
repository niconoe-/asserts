<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\Categories\TraitComparison;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class NonEmptyStringTest
 */
final class NonEmptyStringTest extends TestCase
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
             * @return non-empty-string
             */
            public function runOk(): string
            {
                return self::assertNonEmptyString(' not empty ', $this->error);
            }

            /**
             * Run the assertion is ko for test.
             * @return non-empty-string
             */
            public function runKo(): string
            {
                return self::assertNonEmptyString('', $this->error);
            }

            /**
             * Run the assertion is ko for test with spaces.
             * @return non-empty-string
             */
            public function runKoSpaces(): string
            {
                return self::assertNonEmptyString('    ', $this->error);
            }

            /**
             * Run the assertion is ko for test with NULL.
             * @return non-empty-string
             */
            public function runKoNull(): string
            {
                return self::assertNonEmptyString(null, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame('not empty', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }

    public function testMakeAssertionKOSpaces(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKoSpaces();
    }

    public function testMakeAssertionKONull(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKoNull();
    }
}
