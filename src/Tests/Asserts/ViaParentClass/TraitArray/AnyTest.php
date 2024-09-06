<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitArray;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class AnyTest
 */
final class AnyTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass 
        {
            /**
             * Run the assertion is ok for test.
             * @return int
             */
            public function runOk(): int
            {
                $isEven = static fn(int $value): bool => 0 === $value % 2;
                return self::assertAny([1, 2, 3, 4, 5], $isEven, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return null
             */
            public function runKo(): null
            {
                $isEven = static fn(int $value): bool => 0 === $value % 2;
                return self::assertAny([1, 3, 5, 7, 9], $isEven, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame(2, $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
