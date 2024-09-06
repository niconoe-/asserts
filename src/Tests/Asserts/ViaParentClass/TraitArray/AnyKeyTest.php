<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitArray;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class AnyKeyTest
 */
final class AnyKeyTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass 
        {
            /**
             * Run the assertion is ok for test.
             * @return string
             */
            public function runOk(): string
            {
                $isEven = static fn(int $value): bool => 0 === $value % 2;
                return self::assertAnyKey(['A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5], $isEven, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return null
             */
            public function runKo(): null
            {
                $isEven = static fn(int $value): bool => 0 === $value % 2;
                return self::assertAnyKey(['A' => 1, 'B' => 3, 'C' => 5, 'D' => 7, 'E' => 9], $isEven, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame('B', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
