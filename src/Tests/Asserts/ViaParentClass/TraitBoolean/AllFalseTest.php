<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitBoolean;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class AllFalseTest
 */
final class AllFalseTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass 
        {
            /**
             * Run the assertion is ok for test.
             * @return false
             */
            public function runOk(): false
            {
                return self::assertAllFalse([false, false, false, false], $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return false
             */
            public function runKo(): false
            {
                return self::assertAllFalse([false, false, true, false], $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertFalse($this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
