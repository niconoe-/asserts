<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitComparison;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class NotEqualsTest
 */
final class NotEqualsTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass 
        {
            /**
             * Run the assertion is ok for test.
             * @return mixed
             */
            public function runOk(): mixed
            {
                return self::assertNotEquals('1', 1, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKo(): mixed
            {
                return self::assertNotEquals('1', '1', $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame('1', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
