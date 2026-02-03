<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitArray;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class IsNotListTest
 */
final class IsNotListTest extends TestCase
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
             * @return array<mixed>
             */
            public function runOk(): array
            {
                return self::assertIsNotList(['foo' => 'bar', 'bar' => 'baz'], $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return null
             */
            public function runKo(): null
            {
                return self::assertIsNotList([0, 2, 4, 6, 8], $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame(['foo' => 'bar', 'bar' => 'baz'], $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
