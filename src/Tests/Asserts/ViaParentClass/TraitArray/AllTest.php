<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitArray;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class AllTest
 */
final class AllTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass 
        {
            /**
             * Run the assertion is ok for test.
             * @return list<int>
             */
            public function runOk(): array
            {
                $isEven = static fn(int $value): bool => 0 === $value % 2;
                return self::assertAll([0, 2, 4, 6, 8], $isEven, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return null
             */
            public function runKo(): null
            {
                $isEven = static fn(int $value): bool => 0 === $value % 2;
                return self::assertAll([1, 3, 5, 7, 9], $isEven, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame([0, 2, 4, 6, 8], $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
