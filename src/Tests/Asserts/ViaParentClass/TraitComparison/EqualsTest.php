<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitComparison;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class EqualsTest
 */
final class EqualsTest extends TestCase
{
    private /*readonly*/ object $testClass;

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
                return self::assertEquals(true, true, fn(): Exception => new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKo(): mixed
            {
                return self::assertEquals(true, 1, fn(): Exception => new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertTrue($this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
