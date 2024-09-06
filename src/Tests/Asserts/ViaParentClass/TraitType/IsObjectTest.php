<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitType;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Final class IsObjectTest
 */
final class IsObjectTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass 
        {
            /**
             * Run the assertion is ok for test.
             * @return true
             */
            public function runOk(): true
            {
                return self::assertIsObject(new stdClass(), $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return true
             */
            public function runKo(): true
            {
                return self::assertIsObject(false, $this->error);
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
